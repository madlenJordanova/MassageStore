<?php
	include 'connect.php';
	
	$jsonResponse = array();
	$sql = 'SELECT id, name_procedure, id_category FROM procedures ';
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	echo json_encode($jsonResponse);
	
?>