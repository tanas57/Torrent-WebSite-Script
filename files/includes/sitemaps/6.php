<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<?php include ("../functions.php"); ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="'.$site_adres.'include/sitemap.xsl"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<?php
	BaglantiAc();
	$sql1 = mysql_query("select seo,eklenme from programlar where durum='1' order by eklenme desc");
	while($cek1 = mysql_fetch_array($sql1)){ ?>
	<url>
		<lastmod><?php echo date("Y-m-d",strtotime($cek1["eklenme"]));?></lastmod>
		<changefreq>Weekly</changefreq>
		<priority>0.7</priority>
		<loc><?php echo $site_adres; ?>/torrent-program/<?php echo $cek1["seo"]; ?>.html</loc>
		</url>
		
	<?php } BaglantiKapat();?>

</urlset>