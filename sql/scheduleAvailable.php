<?php
	include ('connect.php');
	session_start(); // Starting Session

	$error=''; // Variable To Store Error Message
	
	$teamID = mysqli_real_escape_string($connection, $_POST['teamID']);
	$date = mysqli_real_escape_string($connection, $_POST['date']);
	$time = mysqli_real_escape_string($connection, $_POST['time']);

	// SQL query to fetch information of registerd users and finds user match.
	$query = "select id from rezervation where id_team='$teamID' AND date='$date' AND time='$time' ";

	$result = $connection->query($query) or die ( $connection->error.__LINE__);

	if ($row = $result->fetch_assoc() ) {
		echo 'taken';
	}
	else {
		echo 'empty';
	}

	mysqli_close($connection); // Closing Connection
?>