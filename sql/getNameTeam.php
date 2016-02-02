<?php
	include 'connect.php';

	$sex =  mysqli_real_escape_string($connection,$_POST['sex']);
	$procID =  mysqli_real_escape_string($connection,$_POST['procID']);
	
	$jsonResponse = array();

	if ( $sex != '') {
		
		$sql = 'SELECT DISTINCT possibility.id_team, team.name_t FROM team, possibility WHERE possibility.id_procedures = "'.$procID.'" AND team.id = possibility.id_team AND team.sex = "'.$sex.'" ';
	}
	else {
		$sql = 'SELECT DISTINCT possibility.id_team, team.name_t FROM team, possibility WHERE possibility.id_procedures = "'.$procID.'" AND team.id = possibility.id_team';
	}

	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	echo json_encode($jsonResponse);
	
?>