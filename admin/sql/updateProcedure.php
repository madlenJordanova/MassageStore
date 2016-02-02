<?php
	include '../../sql/connect.php';
	$idCategory      =  mysqli_real_escape_string($connection,$_POST['idCategory']);	
	$procedure       =  mysqli_real_escape_string($connection,$_POST['procedure']);
	$descriptionProc =  mysqli_real_escape_string($connection,$_POST['descriptionProc']);
	$procTime        =  mysqli_real_escape_string($connection,$_POST['procTime']);
	$price           =  mysqli_real_escape_string($connection,$_POST['price']);
	$photo           =  mysqli_real_escape_string($connection,$_POST['picture']);
	$video           =  mysqli_real_escape_string($connection,$_POST['video']);
	$procID          = mysqli_real_escape_string($connection,$_POST['procID']);


	$sql = 'UPDATE procedures SET id_category = "'.$idCategory.'", name_procedure = "'.$procedure.'", description = "'.$descriptionProc.'", time_procedure = "'.$procTime.'", price = "'.$price.'", photo = "'.$photo.'", video = "'.$video.'" WHERE  id = "'.$procID.'"';

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$_SESSION['LAST_ACTIVITY'] = time();
	$connection->close();
?>