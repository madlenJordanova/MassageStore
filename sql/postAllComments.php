<?php
	include 'connect.php';
	
	$jsonResponse = array();
	$teamID =  mysqli_real_escape_string($connection,$_POST['teamID']);
	
	$sql = 'SELECT comments.comment, comments.date_comment, users.first_name, users.last_name FROM comments, users WHERE comments.id_team = "'.$teamID.'" AND comments.id_user = users.id';

	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	echo json_encode($jsonResponse);
?>