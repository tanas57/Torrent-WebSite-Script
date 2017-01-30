<?php
include "files/includes/functions.php";
ob_start();
if($_GET == TRUE){
	$film = $_GET["oyun"];
	BaglantiAc();
	$say = mysql_num_rows(mysql_query("select id from oyunlar where seo='$film' and durum='1'"));
	if($say < 1){
		// 404 error_get_last
		Yonlendir($site_adres.'/hata/',0);
		exit;
	}
	else{
		$sql = mysql_query("select * from oyunlar where seo='$film'");
		$bilg= mysql_fetch_array($sql);
		$baslik 	= $bilg["adi"];
		$seo	 	= $bilg["seo"];
		$yorumTID	= $bilg["id"];
		$yorumTur	= "oyun";
		$yorumLink  = $site_adres.'/torrent-oyun/'.$seo.'.html';
		$aciklama   = $bilg["aciklama"];
		$icerik	    = $bilg["icerik"];
		$turu	    = $bilg["turu"];
		$surum	    = $bilg["surum"];
		$platform   = $bilg["platform"];
		$boyut	    = $bilg["boyut"];
		$yili	    = $bilg["yili"];
		$eklenme    = $bilg["eklenme"];
		$link1    	= $bilg["link1"];
		$link2    	= $bilg["link2"];
		$fragman   	= $bilg["tanitim"];
		
		$sql = mysql_query("select adi,seo from oyun_turleri where id='$turu'");
		$cek = mysql_fetch_array($sql);
		$turu= '<a href="'.$site_adres.'/torrent-oyun/'.$cek["seo"].'/" title="'.$cek["adi"].' Oyunları Full Torrent İndir">'.$cek["adi"].' </a>';
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
	<title> <?php echo $baslik; ?> Full Torrent İndir | <?php echo $site_baslik; ?> </title>
	<meta name="description" content="<?php echo $aciklama; ?>" />
	<meta name="keywords" content="<?php AnahtarOlustur($baslik,''); ?>" />
	<meta itemprop="image" content="<?php echo $site_adres; ?>/files/images/game/covers/<?php echo $seo; ?>-kapak.jpg" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
<div class="kapsayiciSiyah"></div><div class="uyari"></div>
	<div id="LeftSide">
		<div class="BigBox">
		<h1 class="H1Class"> <?php echo $baslik; ?> Full Torrent İndir </h1>
		<div id="SideDetail">
			<div id="FilmImgBig"<?php if($reklamPosterDurum == 1) echo ' style="margin-top:-3px;"';?>><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/game/covers/<?php echo $seo; ?>-kapak.jpg&w=250&h=320" width="250" height="320" alt="<?php echo $baslik; ?> Kapak Resmi" /><?php if($reklamPosterDurum == 1) echo '<!-- poster altı reklamı --><div id="PosterAds">'.$reklamPoster.'</div>';?></div>
			<div id="SideInformation"<?php if($reklamPosterDurum == 1) echo ' style="margin-top:10px;"';?>>
				<ul>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>oyun-adi.png" width="150" height="40" alt="Oyun Adı" /><strong><?php echo $baslik; ?> (<?php echo $yili; ?>)</strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>oyun-turu.png" width="150" height="40" alt="Oyun Kategori" /><strong><?php echo $turu; ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>platform.png" width="150" height="40" alt="Oyun Platformu" /><strong><?php echo $platform; ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>oyun-surum.png" width="150" height="40" alt="Oyun Sürüm" /><strong><?php echo $surum; ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>boyut.png" width="150" height="40" alt="Oyun Boyutu" /><strong><?php echo $boyut; ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>eklenme.png" width="150" height="40" alt="Eklenme Zamanı" /><strong><?php echo timeTR($eklenme); ?></strong></li>
					<li style="text-align:center; padding-top:4px;">
					<a onclick="DownloadClick('<?php echo $seo; ?>','2');" rel="nofollow,noindex" href="http://bc.vc/10454/<?php echo $link1; ?>" target="_blank" title="Torrenti Google Drive İle İndir"><img src="<?php echo $site_icon_adres; ?>indir.png" width="143" height="41" style="margin-left:10px;" alt="Torrent İndir" /></a>
					
					<a onclick="DownloadClick('<?php echo $seo; ?>','2');" rel="nofollow,noindex" href="http://bc.vc/10454/<?php echo $link2; ?>" target="_blank" title="Torrenti Yandex Disk İle İndir"><img src="<?php echo $site_icon_adres; ?>alternatif-indir.png" width="143" height="41" style="margin-left:10px;" alt="Torrent İndir" /></a>
					<img onclick="KirikLink('<?php echo $seo; ?>','oyun');" style="cursor:hand; margin-left:15px;"title="Kırık Link Bildir"src="<?php echo $site_icon_adres; ?>kirik.png" width="40" height="40" style="margin-left:10px;" alt="Kırık Link Bildir" /></li>
				</ul>
			</div>
			<div class="temizle"></div>	
			<div id="inSideDetail">
				<div id="inSideDescription">
					<h2 style="margin-top:10px;" class="left H2Class"> Oyun Bilgileri </h2>
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
				
				<h2 style="margin-top:10px;" class="left H2Class"> Oyun Tanıtım Videosu </h2>
					<div class="temizle"></div>
			<iframe width="100%" height="215" src="https://www.youtube.com/embed/<?php echo $fragman; ?>" frameborder="0" allowfullscreen></iframe>
			<div class="temizle"></div>
			
				
				</div>
				<div class="temizle"></div>
				<h2 style="margin-top:10px;" class="left H2Class"> Oyun Görüntüleri </h2>
					<div class="temizle"></div>
					
				<?php
				for($j=1; $j<=10; $j++){
					$resim = $seo.'-'.$j.'.jpg';
					$filename = "files/images/game/images/$resim";
					if (file_exists($filename)) { ?>
					   
					<a class="lightbox" href="<?php echo $site_adres; ?>/files/images/game/images/<?php echo $seo.'-'.$j; ?>.jpg" title="Resmi büyük boyda görmek için tıklayın"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/game/images/<?php echo $seo.'-'.$j; ?>.jpg&w=238&h=150" width="238" height="150" alt="<?php echo $baslik; ?>" /></a>	
					
					<?php } ?>
												
				<?php } ?>
				<div class="temizle"></div>
				
				<?php
				BaglantiAc();
				$baslik2 = explode(' ',mysql_real_escape_string($baslik));
				BaglantiKapat();
				$sqlxD = "";
				$dizi = count($baslik2);
				$i=1;
				foreach($baslik2 as $keys){
					$sqlxD .= "adi like '%$keys%'";
					if($i != $dizi) $sqlxD .= " or ";
					
					$i++;
				}-
				BaglantiAc();
				$sql = mysql_query("select adi,seo,platform,boyut from oyunlar where seo!='$seo' and $sqlxD order by adi asc limit 7");
				$say = mysql_num_rows($sql);
				BaglantiKapat();
				if($say > 0){ ?>
				<h2 style="margin-top:10px;" class="left H2Class"> Bu Oyunlarıda İndirebilirsiniz </h2>
				<div class="temizle"></div>
				<div class="ContuFilms">
					<div class="FilmsTitle"><strong>Oyun Adı</strong></div>
					<div class="FilmsIMDB"><strong>Platform</strong></div>
					<div class="FilmsQuality"><strong>Boyut</strong></div>
				</div>
				<?php
					BaglantiAc();
					while($cek = mysql_fetch_array($sql)){
						echo '
						<a href="'.$site_adres.'/torrent-oyun/'.$cek["seo"].'.html" title="'.$cek["adi"].' Oyunu Full Torrent İndir">
						<div class="ContuFilms">
							<div class="FilmsTitle">'.$cek["adi"].'</div>
							<div class="FilmsIMDB">'.$cek["platform"].'</div>
							<div class="FilmsQuality">'.$cek["boyut"].'</div>
						</div>
						</a>
						';
					}
					BaglantiKapat();
				?>
				
				<?php } ?>
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
mysql_query("update oyunlar set sayac_goruntuleme=sayac_goruntuleme+1 where seo='$seo'");
BaglantiKapat();
ob_end_flush();
?>