<?php
	include 'connect.php';
	session_start(); // Starting Session
	$userID   =  mysqli_real_escape_string($connection,$_POST['userID']);	
	$pass     = hash('sha512',  mysqli_real_escape_string($connection,$_POST['pass']));
	$fname    =  mysqli_real_escape_string($connection,$_POST['fname']);
	$lname    =  mysqli_real_escape_string($connection,$_POST['lname']);
	$phone    =  mysqli_real_escape_string($connection,$_POST['phone']);
	$facebook =  mysqli_real_escape_string($connection,$_POST['facebook']);
	$birthday =  mysqli_real_escape_string($connection,$_POST['birthday']);

	if ( empty($pass)) {
		$sql = 'UPDATE users SET first_name = "'.$fname.'", last_name = "'.$lname.'", birthday = "'.$birthday.'", phone = "'.$phone.'", facebook = "'.$facebook.'" WHERE  id = "'.$userID.'"';
	}
	else {
		$sql = 'UPDATE users SET password = "'.$pass.'" , first_name = "'.$fname.'", last_name = "'.$lname.'", birthday = "'.$birthday.'", phone = "'.$phone.'", facebook = "'.$facebook.'" WHERE  id = "'.$userID.'"';
	}

	mysqli_query($connection,$sql) or die (mysqli_error($connection));


	$_SESSION['logName'] = $fname;
	$_SESSION['LAST_ACTIVITY'] = time();
	
	$connection->close();
?>