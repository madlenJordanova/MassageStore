<?php
	include 'connect.php';
	
	$jsonResponse = array();
	$userID =  mysqli_real_escape_string($connection,$_POST['userID']);

	$sql = 'SELECT * FROM users WHERE users.id = "'.$userID.'" ';
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	echo json_encode($jsonResponse);
	
?>