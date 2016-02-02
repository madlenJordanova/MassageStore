<?php
$host = 'localhost';
$db = 'spa_procedures';
$user = 'root';
$pass = '';

$connection = new mysqli($host, $user, $pass, $db);
$connection->set_charset("utf8");

if ( mysqli_connect_errno() ) {
	printf("Connecting failed: %d\n", mysqli_connect_errno());
	exit();
}

?>
