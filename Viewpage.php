
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
		<a href="loginPage.php"><img src="Images/logout.png"></a><br>
		<a href="unregisterPage.php"><img src="Images/unregister.png"></a><br>
		<a href="Searchpage.php"><img src="Images/search.png"></a><br>
		<a href="reservePage.php"><img src="Images/reserve.png"></a><br>
		<a href="Viewpage.php"><img src="Images/view1.png"></a><br>
		
	</div>
	
	<div id="mainBody">
			<?php include 'view.php';?>
		</form>
	</div>
	
	<div id="footer">
		<?php include 'footer.php';?>
	
	</div>
	

</body>
</html>