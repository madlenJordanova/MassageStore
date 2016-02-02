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
			<li><a href="index.php" class="active">начало</a></li>			
			<li><a href="procedures.php">процедури</a></li>			
			<li><a href="gallery.php">галерия</a></li>			
			<li><a href="team.php">екип</a></li>			
			<li><span data-open="logInUp" class= "login <?php if(isset($logged)) echo $logged; ?>">Вход</span></li>	
		</ul>
	</nav>

	<section class="sliderImage">
		<div id="sliderProcedure">
			<div class="item" data-item="img1"></div>
			<div class="item" data-item="img2"></div>
			<div class="item" data-item="img3"></div>
			<div class="item" data-item="img4"></div>
			<div class="item" data-item="img5"></div>
			<div class="item" data-item="img6"></div>
			<div class="item" data-item="img7"></div>
			<div class="item" data-item="img8"></div>
			<div class="item" data-item="img9"></div>
		</div>
	</section>

	<section class="contentBorder">
		<div class="articleAboutUs">
			<h1 class="titleStyle">за нас</h1>
			<div>
				<article class="aboutUs ">
					<figure >
						<img src="img/icons/ourStyle.png" />
					</figure>
					<h3>За нас</h3>
					<p>						
						Madlen SPA  Ви предлагаме уникално преживяване галещо сетивата Ви, гарантирано от козметични продукти от висок клас, изискан и елегантен интериор, релаксираща музика, висококвалифицирани терапевти и професионално спа оборудване на водещи марки в тази област. Всичко това допринася за моментални, видими резултати, които водят до реалното обновление на живота Ви!
					</p>
				</article>
				<article class="aboutUs">
					<figure >
						<a href="team.php"><img src="img/icons/proffesional.png"/></a>
					</figure>

					<h3>Нашите професионалистти</h3>
					<p>
						Ние сме хора, обичащи работата си и копнеещи да предлагаме релакс и удоволствие на клиентите си. Учили сме във видни учебни заведения и сме с дългогодишен опит в областта на здравето и красотата. Може да изказвате мнението си за нас, да предлагате нови идеи, както и да преглеждате коментари на други клиенти. Елате, насладетесе на момента отпускащ сетивата Ви и се убедете в професионализмат ни.
						* Персоналът говори руски, английски и немски език.
					</p>
				</article>
				<article class="aboutUs">
					<figure >
						<a href="cosmetics.php"><img src="img/icons/cosmetics.png" /></a>
					</figure>

					<h3>Нашите продукти</h3>
					<p>Добре дошли в света на SPA удоволствията!
						В България идват над 20 нови традиционни и екзотични масажни методи от най-известните SPA дестинации в света!
						Ние работим с едни от най-добрите продукти на пазара, а именно La Cremerie, Debiline, SkinSystem, GEHLOW, Solingen и VITALITY'S...						
					</p>
				</article>
			</div>
		</div>

		<div class="clientComments">
			<h1 class="titleStyle">Ето какво казват клиентите за нас</h1>
			<div class= "commentUser">				
			</div>
			<span class = "iconMore"><a href= "team.php"></a></span>			
		</div>	
	</section>

	<?php include ('footer.php'); ?>
</body>	
</html>