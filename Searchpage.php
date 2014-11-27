<?php 
//include('search.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>My Book Website</title>

 <link rel="stylesheet" href="styles.css">
 
 <script>
	 function checkvalue() {
		 var mystring = document.getElementById('BookName').value; 
		 if(!mystring.match(/\S/)) {
			 alert ('Empty value is not allowed');
			 return false;
		} else {
        	alert("correct input");
			return true;
		}
	} 
</script>
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
		<a href="Searchpage.php"><img src="Images/search1.png"></a><br>
		<a href="reservePage.php"><img src="Images/reserve.png"></a><br>
		<a href="Viewpage.php"><img src="Images/view.png"></a><br>
		
	</div>
	
	<div id="searchBody">
	
		<!--<form onsubmit="return checkvalue(this)">-->
		<form action="" method="post">
		
			<h5>Search by Book Title</h5>
				<input type="text" name="BookTitle">

			
			<h5>Search by Author</h5><br>
				<input type="text" name="Author">
		

			<br><h5>Search by Category</h5>
				<input type="radio" name="category" value="Health"  >Health<br>
				<input type="radio" name="category" value="Business">Business<br>
				<input type="radio" name="category" value="Biographyt">Biography<br>
				<input type="radio" name="category" value="Travel" >Travel<br>
				<input type="radio" name="category" value="Self-Help">Self-Help<br>
				<input type="radio" name="category" value="Cookery" >Cookery<br>
				<input type="radio" name="category" value="Fiction" >Fiction<br>
				
		<input type="submit" value="Search"><br>
		<span><?php echo $error; ?></span>
		</form>
	</div>
	
	<div id="display">
		<!--php code -->
		<?php 
			$textbox1 = $_POST['BookTitle'];
			$textbox2 = $_POST['Author'];
			$textbox3 = $_POST['category'];
			
			if(empty($textbox1) && empty($textbox2) && empty($textbox3)){
				echo '<span id "error"> Please Select before Search</span>';
			} else {
				include('search1.php'); 
			}
		?>
		<span><?php echo $error; ?></span>
	</div>
	
	<div id="footer">
		<?php include 'footer.php';?>
	</div>
	

</body>
</html>