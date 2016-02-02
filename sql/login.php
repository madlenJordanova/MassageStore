<?php
	include ('connect.php');
	session_start(); // Starting Session
	$jsonResponse = array();

	$error=''; // Variable To Store Error Message
	if (empty($_POST['userEmail']) || empty($_POST['userPass'])) {
		$error = "UserMail or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$email = mysqli_real_escape_string($connection, $_POST['userEmail']);
		$password = mysqli_real_escape_string($connection, $_POST['userPass']);
		$password = hash('sha512',  $password);

		// SQL query to fetch information of registerd users and finds user match.
		$query = "select id, first_name, userLevel from users where password='$password' AND email='$email'";

		$result = $connection->query($query) or die ( $connection->error.__LINE__);

		if ($row = $result->fetch_assoc() ) {
			$_SESSION['logged'] = 'logged'; // Initializing Session
			$_SESSION['logName'] = $row['first_name'];
			$_SESSION['LAST_ACTIVITY'] = time(); 
			// echo $row['id'];
			// echo $row['userLevel'];
			$jsonResponse[] = $row;
			
		}
		else {
			$jsonResponse[] = 'error';
		}

		echo json_encode($jsonResponse);
		mysqli_close($connection); // Closing Connection
	}
?>