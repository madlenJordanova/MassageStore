<!DOCTYPE html>
<html>
<head>
	<title>Madlen SPA</title>	
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
</head>
<body>
	<header>
		<div class="logo">*** Madlen SPA ***
			<img src=""/>

		</div>
		<ul class="options">
			<li class="workTime"><a href="workTime.html"><img src="img/workTime.png"></a></li>
			<li class="reservation"><a href="reservation.php">Online reservation</a></li>
			<li class="location"><a href="location.html"><img src="img/location.png"></a></li>			
		</ul>
	</header>
	<nav>
		<ul class="wrapper menu">
			<li class="home"><a href="home" class="active">home</a></li>			
			<li class="procedure"><a href="procedure">procedure</a></li>			
			<li class="gallery"><a href="gallery">gallery</a></li>			
			<li class="team"><a href="team">team</a></li>			
			<li class="login"><a href="login">login</a></li>			
		</ul>
	</nav>
	<section></section>
	<div class="content">

<div class="wrapper articleAboutUs">
	<selection class="procedure">
			<option class="fBody"><a href="home" class="active">home</a></option>			
			<option class="procedure"><a href="procedure">procedure</a></option>			
			<option class="gallery"><a href="gallery">gallery</a></option>			
			<option class="team"><a href="team">team</a></option>			
			<option class="login"><a href="login">login</a></option>			
		</selection>
	</div>
<footer>
	<ul class="socialNet">
		<li class="facebook"><a href="facebook"><img src="img/facebook.png"></a></li>
		<li class="tw"><a href="tw"><img src="img/tw.png"></a></li>
		<li class="gmail"><a href="gmail"><img src="img/gmail.png"></a></li>
	</ul>
<?php
	$t = date("H");

if ($t < "10") {
    echo "Have a good morning!";
} elseif ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}
?>
</footer>
</div>
</body>	
</html>