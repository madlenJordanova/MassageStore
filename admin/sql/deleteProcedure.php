<?php
	include '../../sql/connect.php';
	$procedureID  =  $_POST['procedureID'];	
	$sql = 'DELETE FROM procedures WHERE  id = "'.$procedureID.'" ';

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$connection->close();
?>