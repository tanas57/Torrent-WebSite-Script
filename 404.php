<?php
include "files/includes/functions.php";
ob_start();
?>

<html>
	<head>
	<title> 404 Hata | <?php echo $site_baslik; ?> </title>
	<meta name="robots" content="index,follow" />
	<meta name="description" content="" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	<div id="LeftSide">
		<div class="BigBox">
		<h2 class="H2Class"> 404 Hata | <?php echo $site_baslik; ?> </h2>
		<p style="font-size:16px; font-weight:bold; font-family: 'Open Sans', sans-serif; margin-top:15px;"> Web sitemizde bulunmayan bir sayfa veya ulaşılmayan bir bağlantıya tıkladığınız için bu sayfadasınız. Aradığınıza ulaşmak için aşağıdaki detaylı aramayı kullanınız. </p>
		</p>
		<br />
		</div>
	
	
		
		
	</div>
	<div id="RightSide">
		<?php include "files/includes/sidebar.php"; ?>
	</div>
	<div class="temizle"></div>
	<?php include "files/includes/footer.php"; ?>
</div>

	
</div>
</div>
</body>
</html>


<?php
ob_end_flush();
?>