<?php
include "files/includes/functions.php";
ob_start();
?>

<html>
	<head>
	<title> TORRENT İNDİR </title>
	<meta name="robots" content="index,follow" />
	<meta name="description" content="" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	
	<div class="BigBox">
		<h2 class="H2Class"> XXX FİLMİNİ İNDİRİYORSUNUZ </h2>
		
		</div>
		<div class="BigBox">
		<iframe src="" width="100%" height="100%">
		<?php echo SiteCek("http://adf.ly"); ?>
		</iframe>
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