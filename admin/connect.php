<?php
$host = 'localhost';
$db = 'spa_procedures';
$user = 'root';
$pass = '';

$connection = new mysqli($host, $user, $pass, $db);

if ( mysqli_connect_errno() ) {
	printf("Connecting failed: %d\n", mysqli_connect_errno());
	exit();
}
?>
