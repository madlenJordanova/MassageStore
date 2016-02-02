<?php include ('../session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Madlen SPA</title>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script type="text/javascript" src="../js/livereload.js"></script>	
	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../js/datepicker.js"></script>
	<script type="text/javascript" src="../js/timepicker.js"></script>	
	<script type="text/javascript" src="js/script.js"></script>		
	<link href="../css/timepicker.css" rel="stylesheet">
	<link href="../css/datepicker.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="../js/SelectDecorator.js"></script>
</head>
<body>
	<?php include('../sql/connect.php') ?>	
	<?php include('admin-header.php') ?>
	<?php include('admin-popups.php') ?>
	<main class="content">
		<aside class="options">
			<nav>
				<a href="index.php" class="active">Табло</a>
				<a href="admin-reservations.php">Резервации</a>
				<a href="admin-users.php">Потребители</a>
				<a href="admin-teams.php">Служители</a>
				<a href="admin-comments.php">Коментари</a>
				<a href="admin-procedures.php">Процедури</a>
				<a href="admin-promotions.php">Промоции</a>
			</nav>
		</aside>
		<section class="info">
			<section class="dashboard">
				<div class="statItem">
					<?php 
						$sql = 'SELECT count(*) as reserv from rezervation WHERE date >= CURDATE()';
						$result = $connection->query($sql) or die ( $connection->error.__LINE__);

						while ($row = $result->fetch_assoc() ) {
							$reserv = $row['reserv'];		
						}
					?>
					<a href="admin-reservations.php" class="holder">
						<h2><?php echo $reserv; ?></h2>
						<p>Предстоящи резервации</p>
					</a>
				</div>
				<div class="statItem">
					<?php 
						$sql = 'SELECT count(*) as count from users';
						$result = $connection->query($sql) or die ( $connection->error.__LINE__);

						while ($row = $result->fetch_assoc() ) {
							$users = $row['count'];		
						}
					?>
					<a href="admin-users.php" class="holder">
						<h2><?php echo $users; ?></h2>
						<p>Потребители</p>
					</a>
				</div>
				<div class="statItem">
					<?php 
						$sql = 'SELECT count(*) as teams from team';
						$result = $connection->query($sql) or die ( $connection->error.__LINE__);

						while ($row = $result->fetch_assoc() ) {
							$teams = $row['teams'];		
						}
					?>
					<a href="admin-teams.php"class="holder">
						<h2><?php echo $teams; ?></h2>
						<p>Служители</p>
					</a>
				</div>
				<div class="statItem">
					<?php 
						$sql = 'SELECT count(*) as comment from comments';
						$result = $connection->query($sql) or die ( $connection->error.__LINE__);

						while ($row = $result->fetch_assoc() ) {
							$comment = $row['comment'];		
						}
					?>
					<a href="admin-comments.php" class="holder">
						<h2><?php echo $comment; ?></h2>
						<p>Коментари</p>
					</a>
				</div>
				<div class="statItem">
					<?php 
						$sql = 'SELECT count(*) as proc from procedures';
						$result = $connection->query($sql) or die ( $connection->error.__LINE__);

						while ($row = $result->fetch_assoc() ) {
							$procedures = $row['proc'];		
						}
					?>
					<a href="admin-procedures.php" class="holder">
						<h2><?php echo $procedures; ?></h2>
						<p>Процедури</p>
					</a>
				</div>
				<div class="statItem">
					<?php 
						$sql = 'SELECT count(*) as promot from promotions';
						$result = $connection->query($sql) or die ( $connection->error.__LINE__);

						while ($row = $result->fetch_assoc() ) {
							$promotCount = $row['promot'];		
						}
					?>
					<a href="admin-promotions.php" class="holder">
						<h2><?php echo $promotCount; ?></h2>
						<p>Промоции</p>
					</a>
				</div>
			</section>
		</section>
	</main>
</body>	
</html>