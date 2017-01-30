<?php
include "files/includes/functions.php";
ob_start();
if($_GET == TRUE){
	$film = $_GET["film"];
	BaglantiAc();
	$say = mysql_num_rows(mysql_query("select id from filmler where seo='$film' and durum='1'"));
	if($say < 1){
		// 404 error_get_last
		Yonlendir($site_adres.'/hata/',0);
		exit;
	}
	else{
		$sql = mysql_query("select * from filmler where seo='$film'");
		$bilg= mysql_fetch_array($sql);
		$film_id	= $bilg["id"];
		$seo	 	= $bilg["seo"];
		$copySeo 	= $bilg["copySeo"];
		$yorumTID	= $bilg["id"];
		$yorumTur	= "film";
		$yorumLink  = $site_adres.'/torrent-film/'.$seo.'.html';
		$baslik 	= $bilg["adi"];
		$aciklama   = $bilg["aciklama"];
		$icerik	    = $bilg["icerik"];
		$turu	    = $bilg["turu"];
		$surum	    = $bilg["surum"];
		$imdb	    = $bilg["imdb"];
		$boyut	    = $bilg["boyut"];
		$kalite	    = $bilg["kalite"];
		$seriMi	    = $bilg["seriMi"];
		$yili	    = $bilg["yili"];
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
	<meta name="keywords" content="<?php AnahtarOlustur($baslik,FilmKalite($kalite)); ?>" />
	<meta itemprop="image" content="<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $seo; ?>-kapak.jpg" />
	<?php include "files/includes/head.php"; ?>
	
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
<div class="kapsayiciSiyah"></div><div class="uyari"></div>
	<div id="LeftSide">
		<div class="BigBox">
		<h1 class="H1Class"> <?php echo $baslik.' '.FilmKalite($kalite); ?> Torrent İndir </h1>
		<div id="SideDetail">
			<?php if($copySeo=="0"){ ?>
					<div id="FilmImgBig"<?php if($reklamPosterDurum == 1) echo ' style="margin-top:0px;"';?>><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $seo; ?>-kapak.jpg&w=250&h=355" width="250" height="355" alt="<?php echo $baslik; ?> Kapak Resmi" /><?php if($reklamPosterDurum == 1) echo '<!-- poster altı reklamı --><div id="PosterAds">'.$reklamPoster.'</div>';?></div>
				<?php } else { ?>
				<div id="FilmImgBig"<?php if($reklamPosterDurum == 1) echo ' style="margin-top:0px;"';?>><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $copySeo; ?>-kapak.jpg&w=250&h=355" width="250" height="355" alt="<?php echo $baslik; ?> Kapak Resmi" /><?php if($reklamPosterDurum == 1) echo '<!-- poster altı reklamı --><div id="PosterAds">'.$reklamPoster.'</div>';?></div>
				<?php } ?>
			
			<div id="SideInformation">
				<ul>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>baslik.png" width="150" height="40" alt="Film Başlığı" /><strong><?php echo $baslik; ?> (<?php echo $yili; ?>)</strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>turu.png" width="150" height="40" alt="Film Türü" /><strong><?php echo FilmTurYaz($turu); ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>film-imdb.png" width="150" height="40" alt="Film İMDB Puanı" /><strong><?php echo $imdb; ?> / 10</strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>surum.png" width="150" height="40" alt="Film Torrent Sürümü" /><strong><?php echo $surum; ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>kalite.png" width="150" height="40" alt="Film Kalitesi" /><strong><?php echo FilmKalite($kalite); ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>boyut.png" width="150" height="40" alt="Film Boyutu" /><strong><?php echo $boyut; ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>eklenme.png" width="150" height="40" alt="Eklenme Zamanı" /><strong><?php echo timeTR($eklenme); ?></strong></li>
					<li style="text-align:center; padding-top:4px;">
					<a onclick="DownloadClick('<?php echo $seo; ?>','1');" rel="nofollow,noindex" href="<?php if($reklamKisaltmaDurum == 1) echo $reklamKisaltma; ?><?php echo $link1; ?>" target="_blank" title="Torrenti Google Drive İle İndir"><img src="<?php echo $site_icon_adres; ?>indir.png" width="143" height="41" style="margin-left:10px;" alt="Torrent İndir" /></a>
					
					<a onclick="DownloadClick('<?php echo $seo; ?>','1');" rel="nofollow,noindex" href="<?php if($reklamKisaltmaDurum == 1) echo $reklamKisaltma; ?><?php echo $link2; ?>" target="_blank" title="Torrenti Yandex Disk İle İndir"><img src="<?php echo $site_icon_adres; ?>alternatif-indir.png" width="143" height="41" style="margin-left:10px;" alt="Torrent İndir" /></a>
					<img onclick="KirikLink('<?php echo $seo; ?>','film');" style="cursor:hand; margin-left:15px;"title="Kırık Link Bildir"src="<?php echo $site_icon_adres; ?>kirik.png" width="40" height="40" style="margin-left:10px;" alt="Kırık Link Bildir" /></li>
				</ul>
			</div>
			<div class="temizle"></div>	
			<div id="inSideDetail">
				<div id="inSideDescription">
					<h2 style="margin-top:10px;" class="left H2Class"> Film Açıklaması </h2>
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
				
				<h2 style="margin-top:10px;" class="left H2Class"> Film Fragmanı </h2>
				<div class="temizle"></div>
			<iframe width="100%" height="215" src="https://www.youtube.com/embed/<?php echo $fragman; ?>" frameborder="0" allowfullscreen></iframe>
			<div class="temizle"></div>
			
				</div>
				
				<?php
				$sayacs = 0;
				for($j=1; $j<=10; $j++){
					if($copySeo != "0"){
						$resim = $copySeo.'-'.$j.'.jpg';
					}
					else{ $resim = $seo.'-'.$j.'.jpg'; }
					$filename = "files/images/film/images/$resim";
					
					if (file_exists($filename)) { 
						if($copySeo != "0"){
						$sayacs++;
						}
						else{
						$sayacs++;	
						} 
					} 
				}
				if($sayacs > 0){
				?>
				<div class="temizle"></div>
				<h2 style="margin-top:10px;" class="left H2Class"> Film Görüntüleri </h2>
					<div class="temizle"></div>
				<?php
				}
				for($j=1; $j<=10; $j++){
					if($copySeo != "0"){
						$resim = $copySeo.'-'.$j.'.jpg';
					}
					else{ $resim = $seo.'-'.$j.'.jpg'; }
					$filename = "files/images/film/images/$resim";
					if (file_exists($filename)) { 
					if($copySeo != "0"){
					?>
					<a class="lightbox" href="<?php echo $site_adres; ?>/files/images/film/images/<?php echo $copySeo.'-'.$j; ?>.jpg" title="Resmi büyük boyda görmek için tıklayın"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/images/<?php echo $copySeo.'-'.$j; ?>.jpg&w=238&h=150" width="238" height="150" alt="<?php echo $baslik; ?>" /></a>
					<?php
					}
					else{ ?>
					<a class="lightbox" href="<?php echo $site_adres; ?>/files/images/film/images/<?php echo $seo.'-'.$j; ?>.jpg" title="Resmi büyük boyda görmek için tıklayın"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/images/<?php echo $seo.'-'.$j; ?>.jpg&w=238&h=150" width="238" height="150" alt="<?php echo $baslik; ?>" /></a>
					
					<?php
					}
					?>
					
					<?php } ?>
												
				<?php } ?>
				
				<?php
				if($seriMi != "0"){
					BaglantiAc();
					$dvmSql = mysql_query("select * from film_seri where id='$seriMi'");
					$cek	= mysql_fetch_array($dvmSql);
					$seriAdi= $cek["adi"];
					$say 	= mysql_num_rows(mysql_query("select id from filmler where seriMi='$seriMi'"));
					BaglantiKapat();
				
				?>
				<div class="temizle"></div>
				<?php if($say > 1){ ?>
				<h2 style="margin-top:10px;" class="left H2Class"> <?php echo $seriAdi; ?> Diğer Filmleri </h2>
				<div class="temizle"></div>
				<div class="ContuFilms">
					<div class="FilmsTitle"><strong>Film Adı</strong></div>
					<div class="FilmsIMDB"><strong>İMDB</strong></div>
					<div class="FilmsQuality"><strong>Kalite</strong></div>
				</div>
				<hr/>
				<?php } ?>
				<?php
					BaglantiAc();
					$dvmSql = mysql_query("select adi,seo,imdb,kalite from filmler where seriMi='$seriMi' and seo !='$seo' order by adi asc");
					while($dvmYaz = mysql_fetch_array($dvmSql)){
						echo '
						<a href="'.$site_adres.'/torrent-film/'.$dvmYaz["seo"].'.html" title="'.$dvmYaz["adi"].' Filmini Torrent İndir">
						<div class="ContuFilms">
							<div class="FilmsTitle">'.$dvmYaz["adi"].'</div>
							<div class="FilmsIMDB">'.$dvmYaz["imdb"].'</div>
							<div class="FilmsQuality">'.FilmKalite($dvmYaz["kalite"]).'</div>
						</div>
						</a>
						';
					}
					BaglantiKapat();
				?>
				<?php }?>
				<div class="temizle"></div>
				
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
mysql_query("update filmler set sayac_goruntuleme=sayac_goruntuleme+1 where seo='$seo'");
BaglantiKapat();
ob_end_flush();
?>