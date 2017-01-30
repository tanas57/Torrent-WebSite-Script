<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<?php include ("../functions.php"); ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="'.$site_adres.'include/sitemap.xsl"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<?php
	BaglantiAc();
	$sql1 = mysql_query("select seo from film_turleri order by adi asc");
	while($cek1 = mysql_fetch_array($sql1)){ ?>
	<url>
		<lastmod><?php echo date("Y-m-d");?></lastmod>
		<changefreq>Weekly</changefreq>
		<priority>0.8</priority>
		<loc><?php echo $site_adres; ?>/torrent-film/<?php echo $cek1["seo"]; ?>/</loc>
		</url>
		
	<?php } BaglantiKapat();?>
	<?php
	BaglantiAc();
	$sql2 = mysql_query("select seo from dizi_turleri order by adi asc");
	while($cek2 = mysql_fetch_array($sql2)){ ?>
	<url>
		<lastmod><?php echo date("Y-m-d");?></lastmod>
		<changefreq>Weekly</changefreq>
		<priority>0.8</priority>
		<loc><?php echo $site_adres; ?>/torrent-dizi/<?php echo $cek2["seo"]; ?>/</loc>
		</url>
		
	<?php } BaglantiKapat();?>

</urlset>