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
			<li><a href="gallery.php" class="active">галерия</a></li>			
			<li><a href="team.php">екип</a></li>			
			<li><span data-open="logInUp" class= "login <?php if(isset($logged)) echo $logged; ?>">Вход</span></li>		
		</ul>
	</nav>
	<section class="contentBorder">
		<section class="galleryPlace">
			<h1 class="titleStyle">процедури</h1>
			<div id="gridSlider">
				<aside class="sliderItem">
					<div class="item bigItem"><a title="Интериор" rel="group" href="img/procedures/img1.jpg"><img src="img/procedures/img1_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a title="Маникюр" rel="group" href="img/procedures/img2.jpg"><img src="img/procedures/img2_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a title="Педикюр" rel="group" href="img/procedures/img3.jpg"><img src="img/procedures/img3_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a title="Подмладяваща терапия" rel="group" href="img/procedures/img4.jpg"><img src="img/procedures/img4_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a title="Хамам" rel="group" href="img/procedures/img5.jpg"><img src="img/procedures/img5_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a title="Кола-маска 1/2 крака" rel="group" href="img/procedures/img12.jpg"><img src="img/procedures/img12_.jpg" alt="Lazy Owl Image"></a></div>
				</aside>
				<aside class="sliderItem">
					<div class="item"><a  title="Частичен масаж - гръб, кръст, ръце, врат и глава" rel="group" href="img/procedures/img7.jpg"><img src="img/procedures/img7_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a  title="Лазерна епилация - цели крака" rel="group" href="img/procedures/img8.jpg"><img src="img/procedures/img8_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a  title="Терапия против бръчки" rel="group" href="img/procedures/img9.jpg"><img src="img/procedures/img9_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a  title="Терапия с кокос" rel="group" href="img/procedures/img10.jpg"><img src="img/procedures/img10_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a  title="Женско подстригване" rel="group" href="img/procedures/img11.jpg"><img src="img/procedures/img11_.jpg" alt="Lazy Owl Image"></a></div>				
					<div class="item bigItem"><a  title="Терапия - Изморени крака" href="img/procedures/img17.jpg"><img src="img/procedures/img17_.jpg" alt="Lazy Owl Image"></a></div>
				</aside>
				<aside class="sliderItem">					
					<div class="item bigItem"><a  title="Юмейху" rel="group" href="img/procedures/img13.jpg"><img src="img/procedures/img13_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a  title="Релаксиращ масаж" rel="group" href="img/procedures/img14.png"><img src="img/procedures/img14_.png" alt="Lazy Owl Image"></a></div>
					<div class="item"><a  title="Ботокс" rel="group" href="img/procedures/img15.jpg"><img src="img/procedures/img15_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a title="Фото епилация" rel="group" href="img/procedures/img16.jpg"><img src="img/procedures/img16_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a title="Хамам" href="img/procedures/img6.jpg"><img src="img/procedures/img6_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a title="Лечебен - елекро масаж" rel="group" href="img/procedures/img54.jpg"><img src="img/procedures/img54_.jpg" alt="Lazy Owl Image"></a></div>
				</aside>
				<aside class="sliderItem">
					<div class="item"><a title="Хамам" href="img/procedures/img18.jpg"><img src="img/procedures/img18_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img19.jpg"><img src="img/procedures/img19_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img20.jpg"><img src="img/procedures/img20_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img21.jpg"><img src="img/procedures/img21_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img22.jpg"><img src="img/procedures/img22_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img23.jpg"><img src="img/procedures/img23_.jpg" alt="Lazy Owl Image"></a></div>
				</aside>				
				<aside class="sliderItem">					
					<div class="item bigItem"><a rel="group" href="img/procedures/img24.jpg"><img src="img/procedures/img24_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a href="img/procedures/img25.jpg"><img src="img/procedures/img25_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img26.jpg"><img src="img/procedures/img26_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img27.png"><img src="img/procedures/img27_.png" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img28.jpg"><img src="img/procedures/img28_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img29.jpg"><img src="img/procedures/img29_.jpg" alt="Lazy Owl Image"></a></div>
				</aside> 
				<aside class="sliderItem">
					<div class="item"><a rel="group" href="img/procedures/img30.jpg"><img src="img/procedures/img30_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img31.jpg"><img src="img/procedures/img31_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img32.jpg"><img src="img/procedures/img32_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img33.jpg"><img src="img/procedures/img33_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img34.jpg"><img src="img/procedures/img34_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img35.jpg"><img src="img/procedures/img35_.jpg" alt="Lazy Owl Image"></a></div>					
				</aside> 
				<aside class="sliderItem">
					<div class="item bigItem"><a rel="group" href="img/procedures/img36.jpg"><img src="img/procedures/img36_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a href="img/procedures/img37.jpg"><img src="img/procedures/img37_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img38.jpg"><img src="img/procedures/img38_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img39.jpg"><img src="img/procedures/img39_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img40.jpg"><img src="img/procedures/img40_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img41.jpg"><img src="img/procedures/img41_.jpg" alt="Lazy Owl Image"></a></div>
				</aside> 
				<aside class="sliderItem">
					<div class="item"><a rel="group" href="img/procedures/img42.jpg"><img src="img/procedures/img42_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img43.jpg"><img src="img/procedures/img43_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img44.jpg"><img src="img/procedures/img44_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img45.jpg"><img src="img/procedures/img45_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img46.jpg"><img src="img/procedures/img46_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img47.jpg"><img src="img/procedures/img47_.jpg" alt="Lazy Owl Image"></a></div>
				</aside> 
				<aside class="sliderItem">					
					<div class="item bigItem"><a rel="group" href="img/procedures/img48.jpg"><img src="img/procedures/img48_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a href="img/procedures/img49.jpg"><img src="img/procedures/img49_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img50.jpg"><img src="img/procedures/img50_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img51.jpg"><img src="img/procedures/img51_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item"><a rel="group" href="img/procedures/img52.jpg"><img src="img/procedures/img52_.jpg" alt="Lazy Owl Image"></a></div>
					<div class="item bigItem"><a rel="group" href="img/procedures/img53.jpg"><img src="img/procedures/img53_.jpg" alt="Lazy Owl Image"></a></div>
				</aside> 				
			</div>
		</div>
	</section>
</section>

<?php include ('footer.php'); ?>
</body>	
</html>