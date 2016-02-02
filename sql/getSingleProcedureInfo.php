<?php
	include 'connect.php';
	$procID = mysqli_real_escape_string($connection,$_POST['procedureID']);

	$jsonResponse = array();
	$sql = 'SELECT id, name_procedure, description, photo, price, time_procedure, video FROM procedures WHERE id = "'.$procID.'" ';
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	echo json_encode($jsonResponse);
	
?>