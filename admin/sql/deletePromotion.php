<?php
	include '../../sql/connect.php';
	$promotionID  =  $_POST['promotionID'];	
	$sql = 'DELETE FROM promotions WHERE  id = "'.$promotionID.'" ';

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$connection->close();
?>