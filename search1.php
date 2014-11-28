<?php
include("searchReserve.php");
?>

<?php

$error ="";

session_start();
$username = $_SESSION['login_user'];

$date = date('Y-m-d');

$rec_limit = 5;

$dbhost = 'localHost';
$dbusername = 'root';
$dbpassword = 'root1988';

$connect = mysql_connect($dbhost, $dbusername, $dbpassword);

if(! $connect) {
	echo ('Error in Connection'.mysql_error());
}

$searchBookTitle = $_POST['BookTitle'];
$searchCat = $_POST['category'];
$searchAuthor = $_POST['Author'];	

//if(empty($searchBookTitle) || empty($searchCat) || empty($searchAuthor)) {
	
//	$error ="Please Click to Search by Book";

//} else {

	//searches category tables for id of category user is searching by
	if(!empty($searchCat)){
	
		$sql1 = "select * from Catagories  where CategoryDesc = '$searchCat'";
		mysql_select_db('bookWeb');
		$retval1 = mysql_query($sql1);
		$catID = mysql_fetch_row($retval1);
		$searchCatID = $catID[0]; 
	}
	
	
	//--------Find Number of Results -------------//
	$sql = "SELECT * FROM Books Where BookTitle LIKE '%$searchBookTitle%' AND Author LIKE '%$searchAuthor%' AND CategoryID LIKE '%$searchCatID%'";
	
	mysql_select_db('bookWeb');
	
	$retval1 = mysql_query($sql);
	
	$num_rows = mysql_num_rows($retval1);
	
	$rec_count = $num_rows;
	
	if( isset($_GET{'page'} ) )
	{
	   $page = $_GET{'page'} + 1;
	   $offset = $rec_limit * $page;
	}
	else
	{
		//resets values
	   $page = 0;
	   $offset = 0;
	}
	
	$left_rec = $rec_count - $offset;
		
	$sql = "SELECT * FROM Books Where BookTitle LIKE '%$searchBookTitle%' AND Author LIKE '%$searchAuthor%' AND CategoryID LIKE '%$searchCatID%' 
	LIMIT $offset, 	$rec_limit";
	
	mysql_select_db('bookWeb');
	
	$retval = mysql_query($sql);
	
	if(!$retval) {
			$error = "No Book Found";
			
	} else {
			
			echo  '<table border = "0" width = "600px">'."\n";
			echo '<tr bgcolor="#b2fbff">';  
			echo "<th>ISBN</th>";
			echo "<th>BookTitle</th>";
			echo "<th>Author</th>";
			echo "<th>Edition</th>";
			echo  "<th>Year</th>";
			echo "<th>Category</th>";
			echo "<th>Reserve</th>";
			
			
			while($row = mysql_fetch_row($retval) ) {
				echo "<tr><td>";
			    echo ($row[0]);
			    $ISBN = $row[0];
			    echo "</td><td>";
			    echo ($row[1]);
				echo "</td><td>";
				echo ($row[2]);
				echo "</td><td>";
				echo ($row[3]);
				echo "</td><td>";
				echo ($row[4]);
				echo "</td><td>";
				echo ($row[5]);
				echo "</td><td>";
				if($row[6] == 'Y') {
					echo("Unavailable");
				} else {
					//echo ($row[6]);
					?> 
						<form action="searchReserve.php" method="post">
						<input type="hidden" value="<?php echo $ISBN; ?>" name="ISBN">
						<input type="submit" name="Reserve" value="Reserve">
						</form> 
					<?php
				}
				echo("</td></tr>\n"); 
			}//end while
				echo("</table>\n");
				
				if( $page == 0 && $rec_count > 5)
				{
				   echo "<a href=\"$_PHP_SELF?page=$page\">Next 5 Records</a>";
				}
				else if( $page < $rec_count / $rec_limit  - 1)
				{
				   $last = $page - 2;
				   echo "<a href=\"$_PHP_SELF?page=$last\">Last 5 Records</a> |";
				   echo "<a href=\"$_PHP_SELF?page=$page\">Next 5 Records</a>";
				}
				else if( $left_rec < $rec_limit && $rec_count > 5)
				{
				   $last = $page - 2;
				   echo "<a href=\"$_PHP_SELF?page=$last\">Last 5 Records</a>";
				}

		}//end if error 
			
			
//}//end if empty
mysql_close($connect);
?>