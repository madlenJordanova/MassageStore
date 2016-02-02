<?php
	include 'connect.php';

	$email =  mysqli_real_escape_string($connection,$_POST['email']);
	$pass = hash('sha512',  mysqli_real_escape_string($connection,$_POST['pass']));
	$fname=  mysqli_real_escape_string($connection,$_POST['fname']);
	$lname=  mysqli_real_escape_string($connection,$_POST['lname']);
	$birthday =  mysqli_real_escape_string($connection,$_POST['birthday']);
	
	$sql= "INSERT INTO users (email, password, first_name, last_name, birthday, userLevel) VALUES ('".$email."', '".$pass."', '".$fname."', '".$lname."', '".$birthday."', '0') ";

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
?>
