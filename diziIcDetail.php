<?php
include "files/includes/functions.php";
ob_start();
if($_GET == TRUE){
	$dizi = $_GET["bolum"];
	BaglantiAc();
	$say = mysql_num_rows(mysql_query("select id from dizi_bolumler where seo='$dizi' and durum='1'"));
	if($say < 1){
		// 404 error_get_last
		Yonlendir($site_adres.'/hata/',0);
		exit;
	}
	else{
		$sql = mysql_query("select * from dizi_bolumler where seo='$dizi'");
		$bilg= mysql_fetch_array($sql);
		$baslik 	= $bilg["adi"];
		$seo	 	= $bilg["seo"];
		$yorumTID	= $bilg["id"];
		$yorumTur	= "diziBolum";
		$yorumLink  = $site_adres.'/torrent-dizi/'.$seo.'.html';
		$diziId 	= $bilg["dizi_id"];
		$diziSql	= mysql_query("select adi,seo,turu from diziler where id='$diziId'");
		$cek		= mysql_fetch_array($diziSql);
		$diziadi	= $cek["adi"];
		$diziSeo	= $cek["seo"];
		$diziTur	= $cek["turu"];
		$aciklama   = $bilg["aciklama"];
		$icerik	    = $bilg["icerik"];
		$sezon	    = $bilg["sezon"];
		$bolum	    = $bilg["bolum"];
		$surum	    = $bilg["surum"];
		$boyut	    = $bilg["boyut"];
		$kalite	    = $bilg["kalite"];
		$eklenme    = $bilg["eklenme"];
		$link1    	= $bilg["link1"];
		$link2    	= $bilg["link2"];
		$fragman   	= $bilg["fragman"];
		$altyazi1   = $bilg["altyazi1"];
		$altyazi2 	= $bilg["altyazi2"];
	}
BaglantiKapat();
}
else{
	// izinsiz giriş !
	Yonlendir($site_adres.'/hata/',0);
	exit;
}
?><html>
	<head>
	<title> <?php echo $baslik.' '.FilmKalite($kalite); ?> Torrent İndir | <?php echo $site_baslik; ?> </title>
	<meta name="description" content="<?php echo $aciklama; ?>" />
	<meta name="keywords" content="<?php AnahtarOlustur($baslik,''); ?>" />
	<meta itemprop="image" content="<?php echo $site_adres; ?>/files/images/series/covers/<?php echo $seo; ?>-kapak.jpg" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
<div class="kapsayiciSiyah"></div><div class="uyari"></div>
	<div id="LeftSide">
		<div class="BigBox">
		<h1 class="H1Class"> <?php echo $baslik; ?> Torrent İndir </h1>
		<div id="SideDetail">
			<div id="FilmImgBig"<?php if($reklamPosterDurum == 1) echo ' style="margin-top:-3px;"';?>><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/series/covers/<?php echo $seo; ?>-kapak.jpg&w=250&h=325" width="250" height="325" alt="<?php echo $diziadi; ?> Kapak Resmi" /><?php if($reklamPosterDurum == 1) echo '<!-- poster altı reklamı --><div id="PosterAds">'.$reklamPoster.'</div>';?></div>
			<div id="SideInformation"<?php if($reklamPosterDurum == 1) echo ' style="margin-top:10px;"';?>>
				<ul>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>dizi-adi.png" width="150" height="40" alt="Dizi Adı" /><strong><a href="<?php echo $site_adres; ?>/dizi/<?php echo $diziSeo; ?>/" target="_blank" title="Tüm Bölümleri Gör"><?php echo $diziadi; ?> Dizisi Sayfası</a></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>program-turu.png" width="150" height="40" alt="Dizi Torrent Sürümü" /><strong><?php echo DiziTurYaz($diziTur); ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>surum.png" width="150" height="40" alt="Dizi Torrent Sürümü" /><strong><?php echo $surum; ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>video-kalitesi.png" width="150" height="40" alt="Dizi Kalitesi" /><strong><?php echo FilmKalite($kalite); ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>boyut.png" width="150" height="40" alt="Dizi Boyutu" /><strong><?php echo $boyut; ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>eklenme.png" width="150" height="40" alt="Eklenme Zamanı" /><strong><?php echo timeTR($eklenme); ?></strong></li>
					<li style="text-align:center; padding-top:4px;">
					<a onclick="DownloadClick('<?php echo $seo; ?>','4');" rel="nofollow,noindex" href="http://bc.vc/10454/<?php echo $link1; ?>" target="_blank" title="Torrenti Google Drive İle İndir"><img src="<?php echo $site_icon_adres; ?>indir.png" width="143" height="41" style="margin-left:10px;" alt="Torrent İndir" /></a>
					
					<a onclick="DownloadClick('<?php echo $seo; ?>','4');" rel="nofollow,noindex" href="http://bc.vc/10454/<?php echo $link2; ?>" target="_blank" title="Torrenti Yandex Disk İle İndir"><img src="<?php echo $site_icon_adres; ?>alternatif-indir.png" width="143" height="41" style="margin-left:10px;" alt="Torrent İndir" /></a>
					<img onclick="KirikLink('<?php echo $seo; ?>','dizi');" style="cursor:hand; margin-left:15px;"title="Kırık Link Bildir"src="<?php echo $site_icon_adres; ?>kirik.png" width="40" height="40" style="margin-left:10px;" alt="Kırık Link Bildir" /></li>
				</ul>
			</div>
			<div class="temizle"></div>	
			<div id="inSideDetail">
				<div id="inSideDescription">
					<h2 style="margin-top:10px;" class="left H2Class"> Bölüm Açıklaması </h2>
					<div class="temizle"></div>
					<?php echo LinkDuzenle($icerik); ?>
				</div>
				<div id="inSidePictures">
				
				<?php if($reklamIcDurum == 1){
					echo '
					<div class="temizle"></div>
					<div style="max-width:305px; text-align:center;">
					'.$reklamIc.'
					</div>
					<div class="temizle"></div>
					';
				}?>
				
				<h2 style="margin-top:10px;" class="left H2Class"> Bölüm Fragmanı </h2>
					<div class="temizle"></div>
			<iframe width="100%" height="215" src="https://www.youtube.com/embed/<?php echo $fragman; ?>" frameborder="0" allowfullscreen></iframe>
			<div class="temizle"></div>
			
				
				</div>
				<div class="temizle"></div>
				<h2 style="margin-top:10px;" class="left H2Class"> Bölüm Görüntüleri </h2>
					<div class="temizle"></div>
					
				<?php
				for($j=1; $j<=10; $j++){
					$resim = $seo.'-'.$j.'.jpg';
					$filename = "files/images/series/images/$resim";
					if (file_exists($filename)) { ?>
					   
					<a class="lightbox" href="<?php echo $site_adres; ?>/files/images/series/images/<?php echo $seo.'-'.$j; ?>.jpg" title="Resmi büyük boyda görmek için tıklayın"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/series/images/<?php echo $seo.'-'.$j; ?>.jpg&w=238&h=150" width="238" height="150" alt="<?php echo $baslik; ?>" /></a>	
					
					<?php } ?>
												
				<?php } ?>
				<div class="temizle"></div>
			</div>
			
			<?php if($reklamAltDurum == 1){
					echo '
					<div class="temizle"></div>
					<div style="max-width:728px; text-align:center; margin-top:5px;">
					'.$reklamAlt.'
					</div>
					<div class="temizle"></div>
					';
				}?>
			
		</div>
		
		
			
		</div>
<div class="BigBox">	
<?php include "files/includes/comments.php"; ?>
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
BaglantiAc();
mysql_query("update dizi_bolumler set sayac_goruntuleme=sayac_goruntuleme+1 where seo='$seo'");
BaglantiKapat();
ob_end_flush();
?>