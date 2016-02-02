<?php
	include 'connect.php';
	session_start();

	if ( isset($_SESSION['logName']) )
		$logName = $_SESSION['logName'];
	else 
		$logName = '';


	echo $logName;
	
?>