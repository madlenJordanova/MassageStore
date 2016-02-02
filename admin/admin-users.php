<?php include ('../session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Madlen SPA</title>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script type="text/javascript" src="../js/livereload.js"></script>	
	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../js/timepicker.js"></script>	
	<script type="text/javascript" src="../js/datepicker.js"></script>		
	<script type="text/javascript" src="js/script.js"></script>		
	<link href="../css/timepicker.css" rel="stylesheet">
	<link href="../css/datepicker.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="../js/SelectDecorator.js"></script>
</head>
<body>
	<?php include('../sql/connect.php') ?>
	<?php include('admin-popups.php') ?>
	<?php include('admin-header.php') ?>
	<main class="content">
		<aside class="options">
			<nav>
				<a href="index.php">Табло</a>
				<a href="admin-reservations.php">Резервации</a>
				<a href="admin-users.php" class="active">Потребители</a>
				<a href="admin-teams.php">Служители</a>
				<a href="admin-comments.php">Коментари</a>
				<a href="admin-procedures.php">Процедури</a>
				<a href="admin-promotions.php">Промоции</a>
			</nav>
		</aside>
		<section class="info">
			<section class="users">	
				<div class="itemTitle">
					<span class="id">№</span>
					<span class="fname">име</span>
					<span class="lname">фамилия</span>
					<span class="email">имейл</span>
					<a href="#" class="delete">изтрий</a>
				</div>	
				<?php  

					$sql = 'SELECT id, first_name, last_name, email FROM users ORDER BY id ASC';
					
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);

					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$fname = $row['first_name'];
						$lname = $row['last_name'];
						$email = $row['email'];						

						?>
						<div class="item">
							<span class="id"><?php echo $id; ?></span>
							<span class="fname"><?php echo $fname; ?></span>
							<span class="lname"><?php echo $lname; ?></span>
							<span class="email"><?php echo $email; ?></span>
							<a href="#" class="delete" data-user-id="<?php echo $id; ?>"></a>
						</div>

				<?php } ?>	
			</section>
		</section>
	</main>
</body>	
</html>