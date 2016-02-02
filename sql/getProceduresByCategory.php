<?php
	include 'connect.php';
	$categID = mysqli_real_escape_string($connection,$_POST['categoryID']);

	$jsonResponse = array();
	$sql = 'SELECT id, name_procedure, photo, price, time_procedure FROM procedures WHERE id_category = "'.$categID.'" ';
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	echo json_encode($jsonResponse);
	
?>