<?php
	include '../../sql/connect.php';

	$nameTeam=  mysqli_real_escape_string($connection,$_POST['nameTeam']);
	$position=  mysqli_real_escape_string($connection,$_POST['position']);
	$email =  mysqli_real_escape_string($connection,$_POST['email']);
	$facebook = mysqli_real_escape_string($connection,$_POST['facebook']);
	$picture =  mysqli_real_escape_string($connection,$_POST['picture']);
	$phone =  mysqli_real_escape_string($connection,$_POST['phone']);
	$sex =  mysqli_real_escape_string($connection,$_POST['sex']);
	
	$sql= "INSERT INTO team (name_t, id_position, phone, e_mail, facebook, photo, sex) VALUES ('".$nameTeam."', '".$position."', '".$phone."' ,'".$email."', '".$facebook."', '".$picture."', '".$sex."') ";

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
?>
