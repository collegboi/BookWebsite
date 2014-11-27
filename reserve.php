<?php
include('unreserve.php');
?>

<?php
echo  '<table border = "0" width = "600px">'."\n";
echo '<tr bgcolor="#b2fbff">';  

 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root1988';
$errorMess = '';
$ISBN = '';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
} 

	session_start();
	$username = $_SESSION['login_user'];
	
	$sql = "SELECT * FROM Reservations WHERE Username = '$username'";
	
	// Selecting Database
	mysql_select_db("bookWeb");

	$retval = mysql_query($sql, $conn);
	
	$rows = mysql_num_rows($retval);

	if( $rows == 0) {		
		//die('Could not get data: ' . mysql_error());
		$errorMess = "No Reservations Found";
		
	} else {
	
		echo("<th>ISBN	</th>");
		echo("<th>	Username	</th>");
		echo("<th>	Reserve Date</th>");
		echo("<th>Unreserve</th>");
		
		while($row = mysql_fetch_row($retval)) {
			echo "<tr><td>";
			echo ($row[0]);
			$ISBN = $row[0];
			echo "</td><td>";
			echo ($row[1]);
			echo "</td><td>";
			echo ($row[2]);
			echo "</td><td>";
			?>
				<form action="" method="post">
				<input type="hidden" value="<?php echo $ISBN; ?>" name="ISBN">
				<input type="submit" name="Unreserve" value="Unreserve">
				</form>
			<?php
			echo "</td></tr>";			
		}
		echo "</table>\n";
		?>
		<span class="error"> <?php echo($errorMess); ?> </span>
		<?php
	}
	
mysql_free_result($retval);
mysql_close($conn);

	
?>