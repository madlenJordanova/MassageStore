<?php include ('session.php'); ?>
<?php 
	if(!isset($logged))
		header('Location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Madlen SPA</title>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script type="text/javascript" src="js/livereload.js"></script>	
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>	
	<script type="text/javascript" src="js/owl.carousel.js"></script>	
	<script type="text/javascript" src="js/SelectDecorator.js"></script>
	<script type="text/javascript" src="js/datepicker.js"></script>
	<script type="text/javascript" src="js/timepicker.js"></script>	
	<script type="text/javascript" src="js/fancybox.js"></script>
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/fancybox.css" rel="stylesheet">	
	<link href="css/timepicker.css" rel="stylesheet">
	<link href="css/datepicker.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">
	<script type="text/javascript" src="js/script.js"></script>		
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<?php include ('popups.php'); ?>
	<header class="head">
		<div class="contentBorder">		
			<a href="index.php">
				<img class="logo" src="img/mylogo.png" alt="SPA MAGIC" />		
			</a>
			<div class="welcome <?php if(isset($logged)) echo $logged; ?>">
				<h2>Здравей, <span></span></h2>				
			</div>
			<ul class="options">
				<li class="workTime"><span data-open="time"><img src="img/icons/workTime.png" ></span></li>
				<li class="reservation"><span class="btnViolet" data-open="reservation">Online резервация</span></li>
				<li class="location"><span data-open="map"><img src="img/icons/location.png"></span></li>
				<li class="profile <?php if(isset($logged)) echo $logged; ?>"><img src="img/icons/imagesP.jpg"/>
					<ul class="profileOptions arrow-up">
						<li><a href="myprofile.php">Профил</a></li>
						<li><a href="myreservations.php">Резервации</a></li>	
						<li><a href="adminNotif.php">Известия</a></li>						
						<li id="logout"><a>Изход</a></li>
					</ul>
				</li>			
			</ul>
		</div>
	</header>
	<nav>	
		<ul class="menu">
			<li><a href="index.php" class="active">начало</a></li>			
			<li><a href="procedures.php">процедури</a></li>			
			<li><a href="gallery.php">галерия</a></li>			
			<li><a href="team.php">екип</a></li>			
			<li><span data-open="logInUp" class= "login <?php if(isset($logged)) echo $logged; ?>">Вход</span></li>	
		</ul>
	</nav>
	<section class="contentBorder">

		<div class="userProfile">		
			<article class="profileUser">
				<div class= "pictureUser">
					<figure class="user-picture"  >
						<img src="" />
					</figure>
					<form name="profileImageUpload">
						<input type="file" name="image" id="image">
						<input type="submit" name="uploadPic" value="Качи">
					</form>
				</div>
				<div class="myInfo">
					<h3 class="user-name">Мадлен Йорданова</h3>
					<p class="user-phone">Не е въведен</p>					
					<p class="user-gmail">madlen.jordanova@gmail.com</p>
					<p class="user-face">Не е въведен</p>
					<p class="user-birthday">29.12.1992</p>	
					<input type="button" id="editSettings" data-open="editUser" value="Редактирай">				
				</div>	
			</article>
			<div class="myComments">
				<h1 class="titleStyle">Моите коментари</h1>
				<div class= "allMyComments">				
				</div>		
			</div>	
		</div>
	</section>
	<?php include ('footer.php'); ?>
</body>	
</html>