<?php
	include 'connect.php';
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$defaultPass = '1234Ms';
	$regPass = hash('sha512',  $defaultPass);
	echo $email;

	$sql = "UPDATE users SET password = '$regPass' WHERE  email= '$email' ";
	mysqli_query($connection,$sql) or die (mysqli_error($connection));


	$to = $email;

	//What will be written and email subject
	$subject = 'Password reset !' ;
	$mailContent = "Reply-to : ".$to."\r\n".
	"New Password ".$regPass.' .Please change it as soon as possible !.';
	
	$headers =  "From: no-replay@madlenspa.bg>\r\n";
	mail($to, $subject, $mailContent, $headers);

	$connection->close();
?>