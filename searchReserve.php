<?php
session_start();
$username = $_SESSION['login_user'];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root1988';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('bookWeb');

$date = date('Y-m-d');


if(isset($_POST['Reserve'])) {
	$error ="";

		$ISBN = $_POST['ISBN'];
		
		$sql = "INSERT INTO Reservations(ISBN, Username, RervationDate) VALUES ('$ISBN', '$username', '$date')";	

		$retreval = mysql_query($sql);
				
		if(! $retreval) {
			$error = "Could not Enter Data";
				
		} else {
				
			$sql1 = "UPDATE Books SET Reservation = 'Y' WHERE ISBN = '$ISBN'";
			$retreval2 = mysql_query($sql1);
				
			if($retreval2) {
				header("location: reservePage.php");
			} else {
				$error = "Could not Enter Data";
			}
		}  
} 
mysql_free_result($retval);
mysql_free_result($retval2);	

mysql_close($conn);

		
?>

