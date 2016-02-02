<?php
	include 'connect.php';
	mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER SET utf8");
	header( ' Content-type:text/html; encoding: UTF-8 ' );
	$jsonResponse = array();
	
	$sql = 'SELECT comments.comment, comments.date_comment, users.first_name, users.last_name, team.name_t FROM comments, users, team WHERE comments.id_user = users.id AND comments.id_team = team.id ORDER BY date_comment DESC LIMIT 3 ';

	$result = $connection->query($sql) or die ( $connection->error.__LINE__);

	while ($row = $result->fetch_assoc() ) {
		$jsonResponse[] = $row;
	}

	echo json_encode($jsonResponse);
?>