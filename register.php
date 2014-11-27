<?php
	
//setting error checking messages
$nameErr = $passErr = $addressErr1 = $address2Err = "";
$firstnameErr = $surameErr = $cityErr = $telephoneErr = $pass1Err ="";	

session_start(); // Starting Session

$error=''; // Variable To Store Error Message

if (isset($_POST['Register'])) {
	
	$password = $_POST['PASSWORD'];
	$password2 = $_POST['PASSWORD1'];
	
		//error checking to make sure no empty spaces is inputted
	if (empty($_POST['USERNAME'])) {
		$nameErr = "Name is required";
	}
	//password
	if(empty($_POST['PASSWORD'])) {	
			$passErr = "Password is required";	
	}
	if (strcmp($password, $password2) != 0) {
		$pass1Err = "Passwords Do Not Match";		
	}
	//firstname
	if(empty($_POST['FirstName'])) {
		$firstnameErr = "FirstName is required";
	}
	
	//lastname
	if(empty($_POST['LastName'])) {
		$surameErr = "Surname is required";
	}
	//addressline1
	if(empty($_POST['AddressLine1'])) {
		$addressErr1 = "Address Line 1 is required";
	}
	//addressline2
	if(empty($_POST['AddressLine2'])) {
		$address2Err = "Address Line 2 is required";
	} 
	//city 
	if(empty($_POST['City'])) {
		$cityErr = "City is required";
	} 
	 //telephone
	if(empty($_POST['Telephone'])) {
		$telephoneErr = "Telephone is required";
	}
	
	 else {
	
		$username  = $_POST['USERNAME'];
		$password = $_POST['PASSWORD'];
		$Fistname = $_POST['FirstName'];
		$Lastname = $_POST['SurName'];
		$address1 = $_POST['AddressLine1'];
		$address1 = $_POST['AddressLine1'];
		$address2 = $_POST['AddressLine2'];
		$city = $_POST['City'];
		$telephone = $_POST['Telephone'];
		$mobile  =$_POST['Mobile']; 
		
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysql_connect("localhost", "root", "root1988");


		//SQL query to fetch information of registerd users and finds user match.
		$sql = "INSERT INTO Users (Username, Password, FirstName, LastName, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES ('$username', '$password', 				'$Fistname','$Lastname', '$address1', '$address2', '$city', '$telephone', '$mobile')";
		
		// Selecting Database
		$db = mysql_select_db("bookWeb", $connection);
		
		$retval = mysql_query($sql, $connection);
		
		if(! $retval) {
			
			die('Could not Add User: '. mysql_error());
		}
		else {

			header("location: main.php");

			mysql_close($connection);
		}
	
	}
}
	
?>