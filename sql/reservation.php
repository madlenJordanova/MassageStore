<?php
	include 'connect.php';

	$choiseProcedure = $_POST['choiseProcedure'];
	$specialist = $_POST['specialist'];
	$date= $_POST['date'];
	$time= $_POST['time'];
	$userid = $_POST['userID'];
	
	$sql= "INSERT INTO rezervation (id_procedure, id_team, id_user, date, time) VALUES ('".$choiseProcedure."', '".$specialist."', '".$userid."', '".$date."', '".$time."') ";

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$_SESSION['LAST_ACTIVITY'] = time(); 
?>
