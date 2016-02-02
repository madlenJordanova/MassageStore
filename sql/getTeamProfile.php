<?php
	include 'connect.php';
	
	$jsonResponse = array();
	$teamID =  mysqli_real_escape_string($connection,$_POST['teamID']);

	$sql = 'SELECT team.photo, team.name_t, team.phone, team.e_mail, team.facebook, position.name_position FROM team, position WHERE team.id_position = position.id AND team.id = "'.$teamID.'" ';
		
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	echo json_encode($jsonResponse);
	
?>