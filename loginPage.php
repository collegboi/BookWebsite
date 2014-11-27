<?php
include('login.php'); // Includes Login 
?>
<!DOCTYPE html>
<html>
<head>
<title>My Book Website</title>

 <link rel="stylesheet" href="styles.css">
</head>


<body>
	<div id="header">
		<a href="IndexPage.php"><img src="Images/websiteName.png"></a>
	</div>
	
	<div id="nav">
		<a href="loginPage.php"><img src="Images/login1.png"></a><br>
		<a href="Registerpage.php"><img src="Images/register.png"></a><br>
	</div>
	
	<div id="mainBody">	
		<h5>Input Username and Password</h5>
		<form method="post" action="">
		<input type="text" name="USERNAME"><span class="error">*</span><br>
		<input type="password" name="PASSWORD"><span class="error">*</span><br>
		<input type="submit" name="Submit" value="Login"><br>
		<span class="error"><?php echo $error; ?></span>
		</form>
	</div>
	
	<div id="footer">
		<?php include 'footer.php';?>
	</div>
	

</body>
</html>