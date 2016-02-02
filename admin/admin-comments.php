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
				<a href="admin-comments.php" class="active">Коментари</a>
				<a href="admin-procedures.php">Процедури</a>
				<a href="admin-promotions.php">Промоции</a>
			</nav>
		</aside>
		<section class="info">
			<section class="comments">	
				<div class="itemTitle">
					<span class="id">№</span>
					<span class="userName">от</span>
					<span class="description">съдържание</span>
					<span class="teamName">към</span>
					<span class="date">дата</span>					
					<a href="#" class="delete">Изтрий</a>
				</div>	

				<?php  

					$sql = 'SELECT  comments.id, comments.comment, users.first_name, users.last_name, team.name_t, comments.date_comment FROM  comments, users, team WHERE comments.id_user=users.id AND comments.id_team=team.id ORDER BY comments.date_comment DESC';
					
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);

					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$fname = $row['first_name'];
						$lname = $row['last_name'];
						$description = substr($row['comment'], 0, 100);						
						$teamName = $row['name_t'];			
						$date = $row['date_comment'];		
						
						?>


						<div class="item">
							<span class="id"><?php echo $id; ?></span>
							<span class="userName"><?php echo $fname.' '.$lname; ?></span>
							<span class="description"><?php echo $description; ?></span>
							<span class="teamName"><?php echo $teamName; ?></span>					
							<span class="date"><?php echo $date; ?></span>				
							<a href="#" class="delete" data-comment-id="<?php echo $id; ?>"></a>							
						</div>	
				<?php } ?>		
			</section>
		</section>
	</main>
</body>	
</html>