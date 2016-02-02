<?php
	include '../../sql/connect.php';
	$teamID  =  $_POST['teamID'];	
	$sql = 'DELETE FROM team WHERE  id = "'.$teamID.'" ';

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$connection->close();
?>