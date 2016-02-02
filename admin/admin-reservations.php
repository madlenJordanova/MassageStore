<?php include ('../session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Madlen SPA</title>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script type="text/javascript" src="../js/livereload.js"></script>	
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
				<a href="admin-reservations.php" class="active">Резервации</a>
				<a href="admin-users.php">Потребители</a>
				<a href="admin-teams.php">Служители</a>
				<a href="admin-comments.php">Коментари</a>
				<a href="admin-procedures.php">Процедури</a>
				<a href="admin-promotions.php">Промоции</a>
			</nav>
		</aside>
		<section class="info">			
			<section class="reservations">
				<div class="itemTitle">
					<span class="id">№</span>
					<h2>процедура</h2>
					<span class="date">дата</span>
					<span class="time">час</span>
					<span class="from">от</span>
					<span class="to">за</span>
					<a href="#" class="delete">Изтрий</a>
				</div>
				
				<?php  

					$sql = 'SELECT rezervation.id,procedures.name_procedure, rezervation.date, rezervation.time, users.first_name, users.last_name, team.name_t  FROM rezervation, procedures, users, team WHERE  rezervation.id_procedure = procedures.id AND rezervation.id_user = users.id AND rezervation.id_team = team.id ORDER BY rezervation.date DESC ';
					
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);

					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$title = $row['name_procedure'];
						$date = $row['date'];
						$time = $row['time'];
						$fname = $row['first_name'];
						$lname = $row['last_name'];
						$to = $row['name_t'];

						?>
						<div class="item">
							<span class="id"><?php echo $id; ?></span>
							<h2><?php echo $title; ?></h2>
							<span class="date"><?php echo $date; ?></span>
							<span class="time"><?php echo $time; ?></span>
							<span class="from"><?php echo $fname.' '.$lname; ?></span>
							<span class="to"><?php echo $to; ?></span>
							<a class="delete" data-reserv-id="<?php echo $id; ?>"></a>
						</div>

				<?php } ?>
			</section>
		</section>
	</main>
</body>	
</html>