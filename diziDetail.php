<?php
include "files/includes/functions.php";
ob_start();
if($_GET == TRUE){
	$dizi = $_GET["dizi"];
	BaglantiAc();
	$say = mysql_num_rows(mysql_query("select id from diziler where seo='$dizi' and durum='1'"));
	if($say < 1){
		// 404 error_get_last
		Yonlendir($site_adres.'/hata/',0);
		exit;
	}
	else{
		$sql 		= mysql_query("select * from diziler where seo='$dizi' and durum='1'");
		$bilg		= mysql_fetch_array($sql);
		$Diziidl	= $bilg["id"];
		$baslik 	= $bilg["adi"];
		$seo	 	= $bilg["seo"];
		$yorumTID	= $bilg["id"];
		$yorumTur	= "dizi";
		$yorumLink  = $site_adres.'/dizi/'.$seo.'/';
		$aciklama   = $bilg["aciklama"];
		$icerik	    = $bilg["icerik"];
		$turu	    = $bilg["turu"];
		$imdb	    = $bilg["imdb"];
		$fragman	= $bilg["fragman"];
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
	<title> <?php echo $baslik; ?> Dizisi Torrent İndir | <?php echo $site_baslik; ?> </title>
	<meta name="description" content="<?php echo $aciklama; ?>" />
	<meta name="keywords" content="<?php AnahtarOlustur($baslik,'dizi'); ?>" />
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
		<h1 class="H1Class"> <?php echo $baslik; ?> Dizisi Bölümleri Torrent İndir </h1>
		<div id="SideDetail">
			<div id="FilmImgBig">
			<img style="margin-top:7px;" src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/series/covers/<?php echo $seo; ?>-kapak.jpg&w=255&h=385" width="255" height="385" alt="<?php echo $baslik; ?> Kapak Resmi" />
			</div>
			<div id="SideInformation">
				<ul>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>dizi-adi.png" width="150" height="40" alt="Dizi Başlığı" /><strong><?php echo $baslik; ?> </strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>dizi-turu.png" width="150" height="40" alt="Dizi Türü" /><strong><?php echo DiziTurYaz($turu); ?></strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>film-imdb.png" width="150" height="40" alt="Dizi İMDB Puanı" /><strong><?php echo $imdb; ?> / 10</strong></li>
					<li><img class="imgSide" src="<?php echo $site_icon_adres; ?>fragman.png" width="150" height="40" alt="Dizi Başlığı" /><strong><?Php echo $baslik; ?> Dizisi Fragmanı</strong><iframe width="100%" height="215" src="https://www.youtube.com/embed/<?php echo $fragman; ?>" frameborder="0" allowfullscreen></iframe></li>
				</ul>
			</div>
			<div class="temizle"></div>	
			<div id="inSideDetail">
			<div class="seriesArea">
				<ul class="chooses">
				<?php
				BaglantiAc();
				$sql  = mysql_query("select max(sezon) as SezonSayi from dizi_bolumler where dizi_id='$Diziidl' and durum='1'");
				$sql2 = mysql_query("select id from dizi_bolumler where dizi_id='$Diziidl' and durum='1' and sezon='0'");
				$boxS = mysql_fetch_array($sql2);
				$sCek= mysql_fetch_array($sql);
				$sayi= $sCek["SezonSayi"];
				BaglantiKapat();
				if($boxS > 0){ ?>
					<a href="javascript:void(0);" class="s<?php echo $i;?>" title="BoxSet - Tüm Bölümler"><li class="s0">BoxSet</li></a>
				<?php
				}
				if($sayi != ""){
				for($i=1; $i<=$sayi; $i++){ ?>
	<a href="javascript:void(<?php echo $i; ?>);" class="s<?php echo $i;?>" title="<?php echo $i;?>.Sezon Bölümleri"><li class="s<?php echo $i;?>"><?php echo $i;?>.Sezon</li></a>
				<?php } ?>
				</ul>
					<?php
					if($boxS > 0){
					BaglantiAc();
					$cSql = mysql_query("select adi,seo,kalite,eklenme,sezon,bolum from dizi_bolumler where dizi_id='$Diziidl' and durum='1' and sezon='0' order by bolum asc");
					$cek = mysql_fetch_array($cSql);
					$ss = 0;	
					?>
				<div class="s0 episodes">
					<div class="episode">
								<a title="Dizinin tüm sezon ve bölümlerini torrent indir" href="<?php echo $site_adres; ?>/torrent-dizi/<?php echo $cek["seo"]; ?>.html" target="_blank">
									<div class="Nepisode"> BoxSet İndir </div>
									<div class="EpiQuality" title="<?php echo FilmKalite($cek["kalite"]); ?> Kalitede torrent indir"><?php echo FilmKalite($cek["kalite"]); ?></div>
									<div class="EpiDate" title="<?php echo timeTR2($cek["eklenme"]); ?> tarihinde yayınlandı"><?php echo timeTR2($cek["eklenme"]); ?></div>
								</a>
					</div>
				</div>
					<?php
					BaglantiKapat();
					}
					for($j=1; $j<=$sayi; $j++){ ?>
<div class="s<?php echo $j;?> episodes">
							<?php
								BaglantiAc();
								$cSql = mysql_query("select adi,seo,kalite,eklenme,sezon,bolum from dizi_bolumler where dizi_id='$Diziidl' and durum='1' and sezon='$j' order by bolum asc");
								$ss = 0;
								while($cek = mysql_fetch_array($cSql)){ ?>
<div class="episode">
								<a href="<?php echo $site_adres; ?>/torrent-dizi/<?php echo $cek["seo"]; ?>.html" target="_blank">
									<div class="Nepisode"><?php echo $cek["sezon"]; ?>. Sezon <?php if($cek["bolum"]=="0") echo "HEPSİ"; else echo $cek["bolum"].'. Bölüm'; ?></div>
									<div class="EpiQuality" title="<?php echo FilmKalite($cek["kalite"]); ?> Kalitede torrent indir"><?php echo FilmKalite($cek["kalite"]); ?></div>
									<div class="EpiDate" title="<?php echo timeTR2($cek["eklenme"]); ?> tarihinde yayınlandı"><?php echo timeTR2($cek["eklenme"]); ?></div>
								</a>
</div>	
								<?php $ss++;} if($ss < 1) echo '<h2> Henüz '.$j.'. sezonda bölüm bulunmuyor. </h2>'; BaglantiKapat(); ?>
</div>
				<?php } } ?>
			</div>
				
			
<div class="temizle"></div>
<h2 style="margin-top:10px;" class="left H2Class"> Dizi Açıklaması </h2>
<div class="temizle"></div>
<div class="icerikAc">
<?php echo LinkDuzenle($icerik); ?>
</div>
<div class="temizle"></div>		
	<h2 style="margin-top:10px;" class="left H2Class"> Dizi Görüntüleri </h2>
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
mysql_query("update diziler set sayac_goruntuleme=sayac_goruntuleme+1 where seo='$seo'");
BaglantiKapat();
ob_end_flush();
?>