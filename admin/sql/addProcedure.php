<?php
	include '../../sql/connect.php';
	$idCategory = mysqli_real_escape_string($connection,$_POST['idCategory']);
	$procedure=  mysqli_real_escape_string($connection,$_POST['procedure']);
	$descriptionProc=  mysqli_real_escape_string($connection,$_POST['descriptionProc']);
	$price = mysqli_real_escape_string($connection,$_POST['price']);
	$procTime =  mysqli_real_escape_string($connection,$_POST['procTime']);
	$picture =  mysqli_real_escape_string($connection,$_POST['picture']);
	$video = mysqli_real_escape_string($connection,$_POST['video']);
	
	
	$sql= "INSERT INTO procedures (id_category, name_procedure, description, price, time_procedure, photo, video) VALUES ('".$idCategory."', '".$procedure."', '".$descriptionProc."' ,'".$price."', '".$procTime."', '".$picture."', '".$video."') ";

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
?>
