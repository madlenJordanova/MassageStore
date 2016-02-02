<?php
	include '../../sql/connect.php';
	$userID  =  $_POST['userID'];	
	$sql = 'DELETE FROM users WHERE  id = "'.$userID.'" ';

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$connection->close();
?>