<?php include ('session.php'); ?>
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
	<link rel="stylesheet" type="text/css" href="css/Rating.css">
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
			<li><a href="index.php">начало</a></li>			
			<li><a href="procedures.php">процедури</a></li>			
			<li><a href="gallery.php">галерия</a></li>			
			<li><a href="team.php" class="active">екип</a></li>			
			<li><span data-open="logInUp" class= "login <?php if(isset($logged)) echo $logged; ?>">Вход</span></li>		
		</ul>
	</nav>
	<div class="teamProfile">
		<span class="close close--down">X</span>
		<article class="profileTeam">
			<div class= "pictureProfile">
				<figure >
					<img class="employeer-picture" src="img/profiles/team1.png" />
				</figure>
			</div>
			<div class="teamInfo">
				<h3 class="nameEmpl"></h3>
				<h4 class="positionEmpl"></h4>	

				<div class="titleImgStar">
					<div class="acidjs-rating-stars"> 
						<form> 
							<input type="radio" name="group-2" id="group-2-0" value="5" /><label for="group-2-0"></label>
							<input type="radio" name="group-2" id="group-2-1" value="4" /><label for="group-2-1"></label>
							<input type="radio" checked="checked" name="group-2" id="group-2-2" value="3" /><label for="group-2-2"></label>
							<input type="radio" name="group-2" id="group-2-3" value="2" /><label for="group-2-3"></label>
							<input type="radio" name="group-2" id="group-2-4"  value="1" /><label for="group-2-4"></label>
						</form>
					</div>			
				</div>
				<p class="empl-phone"></p>
				<p class="empl-mail"></p>
				<p class="empl-face"></p>
			</div>	
			<div class="insertCommentFromUser <?php if(isset($logged)) echo $logged; ?>">
				<form name="sendPersonComment">		
					<textarea rows="4" cols="50" name="comment" form="frmCommentFromUser" placeholder="Въведете вашият коментар тук..."></textarea>
					<input type="submit" id="sendComment" class="popupBtn submit" value="Коментирай">
				</form>
			</div>
		</article>
		<div class="clientComments">
			<h1 class="titleStyle">Ето какво казват клиентите за мен</h1>
			<div class= "comments">				
			</div>
			<span class = "iconMore"><a href= "team.php"></a></span>			
		</div>	
	</div>
<?php include ('footer.php'); ?>
</body>	
</html>


