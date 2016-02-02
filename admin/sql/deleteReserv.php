<?php
	include '../../sql/connect.php';
	$reservID  =  $_POST['reservID'];	
	$sql = 'DELETE FROM rezervation WHERE  id = "'.$reservID.'" ';
	
	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$connection->close();
?>