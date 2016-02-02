<?php
	include '../../sql/connect.php';
	
	$jsonResponse = array();
	$procID =  mysqli_real_escape_string($connection,$_POST['procID']);

	$sql = 'SELECT * FROM procedures WHERE id = "'.$procID.'" ';
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	echo json_encode($jsonResponse);
	
?>