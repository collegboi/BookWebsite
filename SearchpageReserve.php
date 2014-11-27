<!DOCTYPE html>
<html>
<head>
<title>My Book Website</title>

 <link rel="stylesheet" href="styles.css">
</head>


<body>
	<div id="header">
		<a href="main.php"><img src="Images/websiteName.png"></a>
		<div id = "user">
			<?php
				session_start(); // Starting Session
				 $username = $_SESSION['login_user']; 
				 echo("Welcome ".$username) ?>
		</div>
	</div>
	
	<div id="nav">
		<a href="Loginpage.php"><img src="Images/logout.png"></a><br>
		<a href="unregisterPage.php"><img src="Images/unregister.png"></a><br>
		<a href="Searchpage.php"><img src="Images/Search1.png"></a><br>
		<a href="Reservepage.php"><img src="Images/Reserve.png"></a><br>
		<a href="Viewpage.php"><img src="Images/View.png"></a><br>
		
	</div>
	
	<div id="mainBody">
		<?php include 'searchReserve.php';
			$search = $_COOKIE["flag"];
			if($search != 'false') {
		?>
		<h5>Do you want to Reserve this Book</h5>
		<form method="post" action="">
			<br><input type="submit" name="Reserve" value="Yes"><br>
		</form>
		<?php } ?>
	</div>
	
	<div id="footer">
		<?php include 'footer.php';?>
	</div>
	

</body>
</html>