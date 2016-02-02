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
				<a href="admin-users.php">Потребители</a>
				<a href="admin-teams.php">Служители</a>
				<a href="admin-comments.php">Коментари</a>
				<a href="admin-procedures.php">Процедури</a>
				<a href="admin-promotions.php" class="active">Промоции</a>
			</nav>
		</aside>
		<section class="info">
			<span class="popupOpen add" data-open="addPromo">Добави промоция</span>
			<section class="promotions">	
				<div class="itemTitle">
					<span class="id">№</span>
					<span class="date-start">от</span>
					<span class="theme">тема</span>
					<span class="description">съдържание</span>
					<span class="date-end">до</span>				
					<a href="#" class="delete">изтрий</a>
				</div>	

				<?php  
					$sql = 'SELECT id, date_start, theme, description, date_end FROM promotions';
					
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);

					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$date_start = $row['date_start'];
						$theme = $row['theme'];
						$description = $row['description'];						
						$date_end = $row['date_end'];			

						?>
						<div class="item">
							<span class="id"><?php echo $id; ?></span>
							<span class="date-start"><?php echo $date_start; ?></span>
							<span class="theme"><?php echo $theme; ?></span>
							<span class="description"><?php echo $description; ?></span>
							<span class="date-end"><?php echo $date_end; ?></span>
							<a class="delete" data-promotion-id="<?php echo $id; ?>"></a>
						</div>

				<?php } ?>		
			</section>
		</section>
	</main>
</body>	
</html>