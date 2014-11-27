<?php
echo  '<table border = "0" width = "1000px">'."\n";
echo '<tr bgcolor="#b2fbff">';  
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root1988';
$rec_limit = 5;

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('bookWeb');

$sql = "SELECT * FROM Books";

$retval = mysql_query($sql);

$num_row = mysql_num_rows($retval);

$rec_count = $num_row;

if( isset($_GET{'page'} ) )
{
   $page = $_GET{'page'} + 1;
   $offset = $rec_limit * $page;
}
else
{//resets values
   $page = 0;
   $offset = 0;
}

$left_rec = $rec_count - $offset;

$sql = "SELECT * from Books LIMIT $offset, $rec_limit";

$retval = mysql_query($sql);

if(! $retval ) {
  die('Could not get data: ' . mysql_error());
}

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
		//echo("Unavailable");
		echo '<span class = "error">Unavailable</span>';
	} else {
		echo("Available");
	}
	//echo ($row[6]);
	echo "</tr>\n";
} 
echo "</table>\n";

if( $page == 0 )
{
   echo "<a href=\"$_PHP_SELF?page=$page\">Next 5 Records</a>";
}
else if( $page < $rec_count / $rec_limit  - 1)
{
   $last = $page - 2;
   echo "<a href=\"$_PHP_SELF?page=$last\">Last 5 Records</a> |";
   echo "<a href=\"$_PHP_SELF?page=$page\">Next 5 Records</a>";
}
else if( $left_rec < $rec_limit )
{
   $last = $page - 2;
   echo "<a href=\"$_PHP_SELF?page=$last\">Last 5 Records</a>";
}
//echo "Fetched data successfully\n";

mysql_free_result($retval);
mysql_close($conn);
?>