<?php
	include '../../sql/connect.php';
	$nameTeam =  mysqli_real_escape_string($connection,$_POST['nameTeam']);	
	$position =  mysqli_real_escape_string($connection,$_POST['position']);
	$email    =  mysqli_real_escape_string($connection,$_POST['email']);
	$facebook =  mysqli_real_escape_string($connection,$_POST['facebook']);
	$phone    =  mysqli_real_escape_string($connection,$_POST['phone']);
	$photo    =  mysqli_real_escape_string($connection,$_POST['picture']);
	$sex      =  mysqli_real_escape_string($connection,$_POST['sex']);
	$teamID      =  mysqli_real_escape_string($connection,$_POST['teamID']);


		$sql = 'UPDATE team SET name_t = "'.$nameTeam.'", id_position = "'.$position.'", e_mail = "'.$email.'", facebook = "'.$facebook.'", phone = "'.$phone.'", photo = "'.$photo.'", sex = "'.$sex.'" WHERE  id = "'.$teamID.'"';
	
	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$_SESSION['LAST_ACTIVITY'] = time();
	$connection->close();
?>