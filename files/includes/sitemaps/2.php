<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<?php include ("../functions.php"); ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="'.$site_adres.'include/sitemap.xsl"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<lastmod><?php echo date("Y-m-d");?></lastmod>
		<changefreq>Daily</changefreq>
		<priority>1.0</priority>
		<loc><?php echo $site_adres; ?>/</loc>
	</url>
	<url>
		<lastmod>2016-02-08</lastmod>
		<changefreq>Monthly</changefreq>
		<priority>0.5</priority>
		<loc><?php echo $site_adres; ?>/hakkinda/</loc>
	</url>
	<url>
		<lastmod>2016-02-08</lastmod>
		<changefreq>Monthly</changefreq>
		<priority>0.5</priority>
		<loc><?php echo $site_adres; ?>/reklam/</loc>
	</url>
	<url>
		<lastmod>2016-02-08</lastmod>
		<changefreq>Monthly</changefreq>
		<priority>0.5</priority>
		<loc><?php echo $site_adres; ?>/iletisim/</loc>
	</url>
	<url>
		<lastmod><?php echo date("Y-m-d"); ?></lastmod>
		<changefreq>Daily</changefreq>
		<priority>0.9</priority>
		<loc><?php echo $site_adres; ?>/torrent/film-indir.html</loc>
	</url>
	<url>
		<lastmod><?php echo date("Y-m-d"); ?></lastmod>
		<changefreq>Daily</changefreq>
		<priority>0.9</priority>
		<loc><?php echo $site_adres; ?>/torrent/dizi-indir.html</loc>
	</url>
	<url>
		<lastmod><?php echo date("Y-m-d");?></lastmod>
		<changefreq>Daily</changefreq>
		<priority>0.9</priority>
		<loc><?php echo $site_adres; ?>/torrent/oyun-indir.html</loc>
	</url>
	<url>
		<lastmod><?php echo date("Y-m-d");?></lastmod>
		<changefreq>Daily</changefreq>
		<priority>0.9</priority>
		<loc><?php echo $site_adres; ?>/torrent/program-indir.html</loc>
	</url>
</urlset>