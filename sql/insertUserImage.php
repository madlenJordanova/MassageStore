<?php
	include 'connect.php';

	$userID = mysqli_real_escape_string($connection,$_POST['userID']);
	$imageName = mysqli_real_escape_string($connection,$_POST['imageName']);
	$sql = 'UPDATE users SET photo = "'.$imageName.'"  WHERE  id = "'.$userID.'"';

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$_SESSION['LAST_ACTIVITY'] = time(); 
?>
