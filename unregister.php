<?php
	
if(isset($_POST['Submit'])) {
	
	$error = '';
	$dbserver = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root1988';
	
	$connect = mysql_connect($dbserver, $dbuser, $dbpass);
	
	if(! $connect) {
		die("Could not connect".mysql_error());
	} 
		
	session_start();
	$username = $_SESSION['login_user'];
					
	$sql = "SELECT * FROM Reservations WHERE Username = '$username'";
	
	mysql_select_db('bookWeb');

	$retval = mysql_query($sql, $connect);
	
	$row = mysql_num_rows($retval);
	
	if($row > 0) {
		$error = "Please Unreserve all Books Before Deleting Account";
	} else {
						
		$sql3 = "DELETE FROM Users WHERE Username = '$username'";
	
		mysql_select_db('bookWeb');
		
		$retval3 = mysql_query($sql3, $connect);
			
		if($retval3) {
				header("location: IndexPage.php");
		} else {
			$error = "Could not Deactivate your Account";
		}
	}
					
	mysql_free_result($retval);
	mysql_free_result($retval3);					
	mysql_close($connection); // Closing Connection
}	//if isset unregister account
	
	
?>