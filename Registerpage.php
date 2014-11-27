<?php
include('register.php'); // Includes Login 
?>
<!DOCTYPE html>
<html>
<head>
<title>My Book Website</title>

 <link rel="stylesheet" href="styles.css">
 <style >
 </style>
 </head>


<body>
	<div id="header">
		<a href="IndexPage.php"><img src="Images/websiteName.png"></a>
	</div>
	
	<div id="nav">
		<a href="loginPage.php"><img src="Images/login.png"></a><br>
		<a href="Registerpage.php"><img src="Images/register1.png"></a><br>
	</div>
	
	<div id="mainBody">	
		<h5>Input your Details</h5>
		<p><span class="error">* required field.</span></p>
		<form method="post" action="">
		Username: 		<input type="text" name="USERNAME">
		<span class="error">* <?php echo $nameErr; ?></span><br>
		
		Password: 		<input type="password" name="PASSWORD">
		<span class="error">* <?php echo $passErr;?></span><br>
		Retype Password:<input type="password" name="PASSWORD1">
		<span class="error">*<?php echo $pass1Err; ?></span><br>
		
		FirstName: 		<input type="text" name="FirstName">
		<span class="error">* <?php echo $firstnameErr;?></span><br>
		
		LastName:		<input type="text" name="LastName">
		<span class="error">* <?php echo $surameErr;?></span><br>
		
		AddressLine1:	<input type="text" name="AddressLine1">
		<span class="error">* <?php echo $addressErr1;?></span><br>
		
		AddressLine2:	<input type="text" name="AddressLine2">
		<span class="error">* <?php echo $address2Err;?></span><br>
		
		City:			<input type="text" name="City">
		<span class="error">* <?php echo $cityErr;?></span><br>
		
		Phone No:		<input type="text" name="Telephone">
		<span class="error">* <?php echo $telephoneErr;?></span><br>
		
		Mobile: 		<input type="text" name="Mobile"><br>
		<input type="submit" name="Register" value="Register"><br>
		<span><?php echo $error; ?></span>
		</form>
	</div>
	
	<div id="footer">
		<?php include 'footer.php';?>
	</div>
	

</body>
</html>