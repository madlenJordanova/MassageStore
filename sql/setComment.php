<?php
	include 'connect.php';

	$userID = mysqli_real_escape_string($connection,$_POST['userID']);
	$teamID =  mysqli_real_escape_string($connection,$_POST['teamID']);
	$comment =  mysqli_real_escape_string($connection,$_POST['comment']);

	$sql= "INSERT INTO comments (id_user, id_team, comment, date_comment) VALUES ('".$userID."', '".$teamID."', '".$comment."', NOW() )";

	mysqli_query($connection,$sql) or die (mysqli_error($connection));
	$_SESSION['LAST_ACTIVITY'] = time(); 
?>
