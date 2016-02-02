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
				<a href="admin-teams.php" class="active">Служители</a>
				<a href="admin-comments.php">Коментари</a>
				<a href="admin-procedures.php">Процедури</a>
				<a href="admin-promotions.php">Промоции</a>
			</nav>
		</aside>
		<section class="info">
			<span class="popupOpen add" data-open="addTeam">Добави служител</span>

			<section class="teams">	
				<div class="itemTitle">
					<span class="id">№</span>
					<span class="name">име</span>
					<span class="position">длъжност</span>
					<span class="phone">телефон</span>
					<span class="email">имейл</span>				
					<span class="facebook">фейсбук</span>				
					<span class="photo">снимка</span>	
					<span class="sex">пол</span>	
					<a href="#" class="delete">изтрий</a>
					<a href="#" class="edit">промени</a>
				</div>	

				<?php  

					$sql = 'SELECT team.id, team.name_t, position.name_position, team.phone, team.e_mail, team.facebook, team.photo, team.sex FROM team, position WHERE team.id_position = position.id ORDER BY team.id ASC';
					
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);

					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$name = $row['name_t'];
						$position = $row['name_position'];
						$phone = $row['phone'];						
						$email = $row['e_mail'];						
						$facebook = $row['facebook'];						
						$photo = $row['photo'];						
						$sex = $row['sex'];						

						?>
						<div class="item">
							<span class="id"><?php echo $id; ?></span>
							<span class="name"><?php echo $name; ?></span>
							<span class="position"><?php echo $position; ?></span>
							<span class="phone"><?php echo $phone; ?></span>
							<span class="email"><?php echo $email; ?></span>
							<span class="facebook"><?php echo $facebook; ?></span>
							<span class="photo"><?php echo $photo; ?></span>
							<span class="sex"><?php echo $sex; ?></span>
							<a href="#" class="delete" data-team-id="<?php echo $id; ?>"></a>
							<a href="#" class="edit" data-open="editTeam" data-team-id="<?php echo $id; ?>"></a>
						</div>
				<?php } ?>		
			</section>
		</section>
	</main>
</body>	
</html>