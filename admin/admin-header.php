<script>
	if ( sessionStorage.getItem('userLevel') !== '1')
		location.href="../index.php";
	else 
		console.log('addddmin');
</script>
<header class="head">
	<a href="../index.php" class="logo">
		<img src="../img/mylogo.png" alt="SPA MASSAGE LOGO">
	</a>
	<h1>Добре дошли в Админ панела</h1>
	<span class="logout">logout</span>
</header>