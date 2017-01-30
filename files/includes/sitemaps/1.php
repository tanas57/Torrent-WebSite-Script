<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<?php include ("../functions.php"); ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="'.$site_adres.'/files/includes/sitemaps/sitemap.xsl"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<sitemap>
		<loc><?php echo $site_adres;?>/sitemap-index.xml</loc>
	</sitemap>
	<sitemap>
		<loc><?php echo $site_adres;?>/sitemap-kategoriler.xml</loc>
	</sitemap>
	<sitemap>
		<loc><?php echo $site_adres;?>/sitemap-filmler.xml</loc>
	</sitemap>
	<sitemap>
		<loc><?php echo $site_adres;?>/sitemap-oyunlar.xml</loc>
	</sitemap>
	<sitemap>
		<loc><?php echo $site_adres;?>/sitemap-programlar.xml</loc>
	</sitemap>
	<sitemap>
		<loc><?php echo $site_adres;?>/sitemap-diziler.xml</loc>
	</sitemap>
	<sitemap>
		<loc><?php echo $site_adres;?>/sitemap-dizi-bolumler.xml</loc>
	</sitemap>
</sitemapindex>