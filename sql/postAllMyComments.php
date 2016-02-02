<?php
	include 'connect.php';
	
	$jsonResponse = array();
	$userID =  mysqli_real_escape_string($connection,$_POST['userID']);
	
	$sql = 'SELECT comments.comment, comments.date_comment, team.name_t FROM comments, team WHERE comments.id_user = "'.$userID.'" AND comments.id_team = team.id';

	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	echo json_encode($jsonResponse);
?>