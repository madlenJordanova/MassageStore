<?php
	include '../../sql/connect.php';

	$dateStart=  mysqli_real_escape_string($connection,$_POST['dateStart']);
	$theme=  mysqli_real_escape_string($connection,$_POST['theme']);
	$descriptionPromotion =  mysqli_real_escape_string($connection,$_POST['descriptionPromotion']);
	$dateEnd = mysqli_real_escape_string($connection,$_POST['dateEnd']);
	
	
	$sql= "INSERT INTO promotions (date_start, theme, description, date_end) VALUES ('".$dateStart."', '".$theme."', '".$descriptionPromotion."' ,'".$dateEnd."') ";

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
?>
