<?php
	include 'connect.php';
	
	$jsonResponse = array();
	$userID =  mysqli_real_escape_string($connection,$_POST['userID']);

	$sql = 'SELECT procedures.name_procedure, procedures.photo, rezervation.date, rezervation.time FROM rezervation, procedures WHERE rezervation.id_user = "'.$userID.'" AND rezervation.id_procedure = procedures.id ORDER BY rezervation.date DESC ';
	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	echo json_encode($jsonResponse);
	
?>