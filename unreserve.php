<?php
 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root1988';
$error = '';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
} 

if(isset($_POST['Unreserve']))
{
	$ISBN = $_POST['ISBN'];

	session_start();
	$username = $_SESSION['login_user'];
	
	$sql = "DELETE FROM Reservations WHERE ISBN = '$ISBN'";
	
	// Selecting Database
	mysql_select_db("bookWeb");

	$retval = mysql_query($sql, $conn);

	if( !$retval ) {		
		//die('Could not get data: ' . mysql_error());
		$error = "Could not Unreserved Item";
		
	} else {
		mysql_free_result($retval);
		
		$sql = "UPDATE Books SET Reservation = 'N' WHERE ISBN = '$ISBN'";
		$retreval = mysql_query($sql);
		if($retval) {
			$error = "Unreserved";
		}
	}
	
	mysql_free_result($retval);
	mysql_close($conn);
}
	
?>