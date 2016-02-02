<?php
	include '../../sql/connect.php';
	$commentID  =  $_POST['commentID'];	
	$sql = 'DELETE FROM comments WHERE  id = "'.$commentID.'" ';

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$connection->close();
?>