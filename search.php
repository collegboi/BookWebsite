<?php
	
session_start();
$username = $_SESSION['login_user'];
$date = date('Y-m-d');


$error=''; // Variable To Store Error Message
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root1988';

$rec_limit = 5;


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )  {
	die('Could not connect: ' . mysql_error());
}


if (isset($_POST['Search'])) {
	
	if(isset($_POST['Author'])){

		$search = $_POST['Author'];
		
		$sql = "SELECT * FROM Books WHERE Author LIKE '%$search%'";
		 
		mysql_select_db('bookWeb');
		
		$retval = mysql_query($sql);
		
		if(! $retval) {
			
			$error = "No Author Found";
		} else {
			
			echo '<table border = "0" width = "600px">'."\n";
			echo '<tr bgcolor="#b2fbff">';  
			echo "<th>ISBN</th>";
			echo "<th>BookTitle</th>";
			echo "<th>Author</th>";
			echo "<th>Edition</th>";
			echo  "<th>Year</th>";
			echo "<th>Category</th>";
			echo "<th>Reserved</th>";
			
			while($row = mysql_fetch_row($retval)) {
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
						<form action="reservePage.php" method="post">
						<input type="hidden" value="<?php echo $ISBN; ?>" name="ISBN">
						<input type="submit" name="Reserve" value="Reserve">
						</form>
					<?php
				}
				echo("</td></tr>\n");
			} 
			echo("</table>\n");

		}
		
	}
		
	if(isset($_POST['BookTitle'])) {

		$search = $_POST['BookTitle'];
		
		//GET NUMBER OF BOOKS FROM DATABASE WITH CONDTION
		$sql = "SELECT * FROM Books WHERE BookTitle LIKE '%$search%'";
	
		mysql_select_db('bookWeb');
	
		$retval = mysql_query($sql1);
	
		//checking to see if book is found
		if(!$retval) {
		
			$error = "No Book Found" ;
		}
		else {
			
			echo  '<table border = "0" width = "600px">'."\n";
			echo '<tr bgcolor="#b2fbff">';  
			echo "<th>ISBN</th>";
			echo "<th>BookTitle</th>";
			echo "<th>Author</th>";
			echo "<th>Edition</th>";
			echo  "<th>Year</th>";
			echo "<th>Category</th>";
			echo "<th>Reserved</th>";
			
			while($row = mysql_fetch_row($retval)) {
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
						<form action="" method="post">
						<input type="hidden" value="<?php echo $ISBN; ?>" name="ISBN">
						<input type="submit" name="Reserve" value="Reserve">
						</form>
					<?php
				}
				echo("</td></tr>\n");
			} 
			echo("</table>\n");
			
		}
		//------------
			if($page == 0 && $rec_count > 5 )
			{
				  echo "<a href=\"$_PHP_SELF?page=$page\">Next 5 Records</a>";
			}
			else if( $page < $rec_count / $rec_limit  - 1)
			{
				 $last = $page - 2;
				 echo "<a href=\"$_PHP_SELF?page=$last\">Last 5 Records</a> |";
				 echo "<a href=\"$_PHP_SELF?page=$page\">Next 5 Records</a>";
			}
			else if( $left_rec < $rec_limit && $rec_count > 5 )
			{
				 $last = $page - 2;
				echo "<a href=\"$_PHP_SELF?page=$last\">Last 5 Records</a>";
			}

		
	}
	
	if(isset($_POST['category'])) {
		
		$search = $_POST['category'];

		$sql1 = "select * from Catagories  where CategoryDesc = '$search'";
		
		mysql_select_db('bookWeb');
		
		$retval1 = mysql_query($sql1);
		
		$catID = mysql_fetch_row($retval1);
		
		$sql = "SELECT * FROM Books WHERE CategoryID = '$catID[0]'";
	
		mysql_select_db('bookWeb');
		
		$retval = mysql_query($sql);
	
		//checking to see if book is found
		if(!$retval) {
			$error = "No Book Found" ;
		}
		else {
			
			echo  '<table border = "0" width = "600px">'."\n";
			echo '<tr bgcolor="#b2fbff">';  
			echo "<th>ISBN</th>";
			echo "<th>BookTitle</th>";
			echo "<th>Author</th>";
			echo "<th>Edition</th>";
			echo  "<th>Year</th>";
			echo "<th>Category</th>";
			echo "<th>Reserved</th>";
			
			while($row = mysql_fetch_row($retval)) {
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
						<form action="" method="post">
						<input type="hidden" value="<?php echo $ISBN; ?>" name="ISBN">
						<input type="submit" name="Reserve" value="Reserve">
						</form>
					<?php
				}
				echo("</td></tr>\n");

			} 
			echo("</table>\n");
			
			//pagination checks 

			mysql_select_db('bookWeb');
			
			$sql = "SELECT * FROM Books WHERE CategoryID = '$catID[0]'";
			
			$retval = mysql_query($sql);
			
			$num_row = mysql_num_rows($retval);
			
			$rec_count = $num_row;
			//pagination checks 
			if($page == 0 && $rec_count > 5 )
			{
				  echo "<a href=\"$_PHP_SELF?page=$page\">Next 5 Records</a>";
			}
			else if( $page < $rec_count / $rec_limit  - 1)
			{
				 $last = $page - 2;
				 echo "<a href=\"$_PHP_SELF?page=$last\">Last 5 Records</a> |";
				 echo "<a href=\"$_PHP_SELF?page=$page\">Next 5 Records</a>";
			}
			else if( $left_rec < $rec_limit && $rec_count > 5 )
			{
				 $last = $page - 2;
				echo "<a href=\"$_PHP_SELF?page=$last\">Last 5 Records</a>";
			}

					
		}
	}
			
}

//mysql_free_result($retval);
mysql_close($conn);

?>