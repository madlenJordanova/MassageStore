<?php
	include 'connect.php';
	
	$jsonResponse = array();

	$sql = 'SELECT id, date_start, theme, description, date_end FROM promotions';
					
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	$_SESSION['LAST_ACTIVITY'] = time();
	echo json_encode($jsonResponse);
	
?>