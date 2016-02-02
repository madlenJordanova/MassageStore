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

	<section class="contentBorder">
			<div>
				<article class="product">
					<figure >
						<img src="img/product/debyline.jpg" />
					</figure>
					<p>						
						Водещ производител на хигиенни продукти за еднократна употреба от хартия и TNT. Философия, основана на качеството, която утвърждава Debyline на международния пазар.
					</p>
				</article>
				<article class="product">
					<figure >
						<img src="img/product/gehwol.jpg"/>
					</figure>
					<p>
						През 1868г. в Германия се създава марката GEWHOL- превърнала се в синоним на грижа за крака и стъпала. Козметиката е изключително ефективна и задоволява различните нужди на кожата на краката.
					</p>
				</article>
				<article class="product">
					<figure >
						<img src="img/product/laCremerie.jpg" />
					</figure>
					<p>La Cremerie е марка, създадена преди 20 години, широкопопулярна в международната SPA индустрия. Името й се асоциира с творчески поглед в предлагането на професионални козметични средства от природата. Гамата на La Cremerie обхваща цялата сфера от SPA терапии – екзотични масажни масла, кремове и пилинги за тяло, продукти за хамам, ароматерапия, полисенсориални ритуали, антицелулитни и моделиращи тялото терапии и глезещи сетивата SPA педикюрни и маникюрни изкушения.					
					</p>
				</article>
				<article class="product">
					<figure >
						<img src="img/product/skinS.jpg" />
					</figure>
					<p>Създадена през 1996г., компанията е една от най- влиятелните производители на кола маска в Италия. Продуктите са гранация за качество, перфекционизъм и иновация.</p>
				</article>
				<article class="product">
					<figure >
						<img src="img/product/solingen.jpg" />
					</figure>
					<p>Основана през 1921г в София от Цветко Георгиев, след 1931г. фирмата приема за своя емблема два щъркела, опрели клюнове един в друг и започва да осъществява директен внос и поема представителството за България на най-реномираните ножарски изделия, електрически машинки за подстригване, както и на инструменти за маникюр, педикюр и др. от Солинген- Германия.						
					</p>
				</article>
				<article class="product">
					<figure >
						<img src="img/product/vitalitys.jpg" />
					</figure>

					<p>VITALITY'S е авангардна италианска козметика за коса, съчетаваща трите принципа: перфектно оцветяване, ефектно стилизиране и максимална грижа за косата. Продуктите са перфектен синтез на науката с природата и гарантират здрава, красива и жизнена коса.		
					</p>
				</article>
			</div>
	</section>
	
	<?php include ('footer.php'); ?>
</body>	
</html>