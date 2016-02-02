<?php
	include 'connect.php';
	
	$jsonResponse = array();
	$sql = 'SELECT team.id, team.photo, team.name_t, team.id_position, position.name_position FROM team, position WHERE team.id_position = position.id ';
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	echo json_encode($jsonResponse);
	
?>