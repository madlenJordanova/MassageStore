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
				<a href="admin-procedures.php" class="active">Процедури</a>
				<a href="admin-promotions.php">Промоции</a>
			</nav>
		</aside>
		<section class="info">
			<span class="popupOpen add" data-open="addProc">Добави процедура</span>
			<section class="procedures">	
				<div class="itemTitle">
					<span class="id">№</span>
					<span class="category">категория</span>
					<span class="procedure">процедура</span>
					<span class="description">съдържание</span>
					<span class="time">Време</span>				
					<span class="price">цена</span>				
					<span class="picture">снимка</span>				
					<span class="video">видео</span>				
					<a href="#" class="delete">изтрий</a>
					<a href="#" class="edit">промени</a>
				</div>	

				<?php  

					$sql = 'SELECT procedures.id, category.types, procedures.name_procedure, procedures.description, procedures.price, procedures.time_procedure, procedures.photo, procedures.video FROM procedures, category WHERE procedures.id_category=category.id ORDER BY procedures.id ASC';
					
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);

					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$category = $row['types'];
						$procedure = $row['name_procedure'];
						$description = substr($row['description'], 0, 100);						
						$price = $row['price'];			
						$time = $row['time_procedure'];			
						$photo = $row['photo'];			
						$video = $row['video'];			

						?>
						<div class="item">
							<span class="id"><?php echo $id; ?></span>
							<span class="category"><?php echo $category; ?></span>
							<span class="procedure"><?php echo $procedure; ?></span>
							<span class="description"><?php echo $description; ?></span>
							<span class="time"><?php echo $time; ?></span>				
							<span class="price"><?php echo $price; ?></span>				
							<span class="picture"><?php echo $photo; ?></span>				
							<span class="video"><?php echo $video; ?></span>				
							<a href="#" class="delete" data-procedure-id="<?php echo $id; ?>"></a>
							<a href="#" class="edit" data-open="editProcedures" data-procedure-id="<?php echo $id; ?>"></a>
						</div>	
				<?php } ?>		
			</section>
		</section>
	</main>
</body>	
</html>