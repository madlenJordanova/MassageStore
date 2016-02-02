<?php
include ('connect.php');

	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$query = "SELECT * FROM users WHERE email = '".$email."' ";
	
	$results = mysqli_query($connection, $query);

	if ( mysqli_num_rows($results) > 0) {
		echo 'taken';
	}			
	else {
		echo 'empty';
	}
	mysqli_close($connection); // Closing Connection
?>