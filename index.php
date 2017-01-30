<?php
include "files/includes/functions.php";
session_start();
ob_start();
?>
<html>
	<head>
	<title> Torrent Filmler & Diziler & Programlar & Oyunlar Full İndir </title>
	<meta name="description" content="<?php echo $site_aciklama; ?>" charset="utf-8" />
	<meta name="keywords" content="<?php echo $site_anahtar; ?>" charset="utf-8" />
	<meta itemprop="image" content="<?php echo $site_adres; ?>/files/images/style/logo2.png" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	<div id="LeftSide">
		<div class="BigBox">
		<h2 class="H2Class"> En Çok İndirilenler </h2>		
		
		<?php
			BaglantiAc();
			$dizi=""; $sayac=0;
			$s1 = mysql_query("select seo,inTur,sayac_indirilme,adi,imdb,kalite,copySeo from filmler group by adi order by sayac_indirilme desc limit 4");
			while($c1 = mysql_fetch_array($s1)){ $dizi[$sayac] = $c1["sayac_indirilme"].','.$c1["inTur"].','.$c1["seo"].','.$c1["adi"].','.$c1["imdb"].','.$c1["kalite"].','.$c1["copySeo"]; $sayac++; }
			$s1 = mysql_query("select seo,inTur,sayac_indirilme,adi,turu from oyunlar order by sayac_indirilme desc limit 4");
			while($c1 = mysql_fetch_array($s1)){ $dizi[$sayac] = $c1["sayac_indirilme"].','.$c1["inTur"].','.$c1["seo"].','.$c1["adi"].','.$c1["turu"]; $sayac++; }
			$s1 = mysql_query("select seo,inTur,sayac_indirilme,adi,turu from programlar order by sayac_indirilme desc limit 4");
			while($c1 = mysql_fetch_array($s1)){ $dizi[$sayac] = $c1["sayac_indirilme"].','.$c1["inTur"].','.$c1["seo"].','.$c1["adi"].','.$c1["turu"]; $sayac++; }
			$s1 = mysql_query("select seo,inTur,sayac_indirilme,adi,kalite from dizi_bolumler order by sayac_indirilme desc limit 4");
			while($c1 = mysql_fetch_array($s1)){ $dizi[$sayac] = $c1["sayac_indirilme"].','.$c1["inTur"].','.$c1["seo"].','.$c1["adi"].','.$c1["kalite"]; $sayac++; }
			
			arsort($dizi);
			$sa = 0;
			foreach($dizi as $yaz1){
				if($sa < $indexEnCokInd){
					$eniyi4 = explode(',',$yaz1);
					$inTur	= $eniyi4[1];
					$inSeo	= $eniyi4[2];
					$inAd	= $eniyi4[3];
					
					if($inTur == 1){
						$inİmdb		= $eniyi4[4];
						$inKalite	= $eniyi4[5];
						$copySeo	= $eniyi4[6];
						$inTur = "film";
						?>
						<div class="film">
							<a href="<?php echo $site_adres; ?>/torrent-<?php echo $inTur; ?>/<?php echo $inSeo; ?>.html" title="">
								<?php if($copySeo == "0"){ ?>
								<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $inSeo; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $inAd; ?> Full Torrent İndir" /></div>
								<?php } else { ?>
								<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $copySeo; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $inAd; ?> Full Torrent İndir" /></div>
								<?php } ?>
								<div class="filmImdb">
									<?php echo IMDBRenk($inİmdb); ?>
								</div>
								<div class="filmQuality" title="<?php echo ucwords($inAd.' '.FilmKalite($inKalite)); ?>  Torrent İndir"><?php FilmKaliteResim($inAd,$inKalite,$site_icon_adres); ?></div>
								<div class="filmName"><?php echo ucwords($inAd.' '.FilmKalite($inKalite)); ?>  Torrent İndir</div>
							</a>
						</div>
						<?php
					}
					elseif($inTur ==2){
						$inTurr		= $eniyi4[4];
						$inTur = "oyun";
						?>
						<div class="film">
							<a href="<?php echo $site_adres; ?>/torrent-oyun/<?php echo $inSeo; ?>.html">
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/game/covers/<?php echo $inSeo;; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $inAd; ?> Full Torrent İndir" /></div>
							<?php
							$turu = $inTurr;
							$cek = mysql_fetch_array(mysql_query("select adi,seo,icon,site_ad from oyun_turleri where id='$turu'"));
							$catAdi = $cek["adi"]; $catSAdi = $cek["site_ad"]; $catSeo = $cek["seo"]; $catImg = $cek["icon"];
							?>
							<a target="_blank" href="<?php echo $site_adres; ?>/torrent-oyun/<?php echo $catSeo; ?>/" title="<?php echo $catAdi; ?> Oyunları Torrent İndir">
							<div class="oyunTur"><img src="<?php echo $site_adres; ?>/files/images/style/<?php echo $catImg; ?>" width="24" height="24" alt="<?php echo $catAdi; ?> Oyunları Torrent İndir" /><span><?php echo $catSAdi; ?>
							</div>
							</a>
							<div class="filmName"><?php echo $inAd; ?> Full Torrent İndir</div>
							</a>
						</div>
						<?php
					}
					elseif($inTur ==3){
						$inTur = "dizi";
						$inKalite	= $eniyi4[4];
						// daha yok..
						?>
						<div class="film">
							<a href="<?php echo $site_adres; ?>/torrent-dizi/<?php echo $inSeo; ?>.html" title="">
								<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/series/covers/<?php echo $inSeo; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $inAd; ?> Full Torrent İndir" /></div>
								<div class="filmQuality" title="<?php echo ucwords($inAd.' '.FilmKalite($inKalite)); ?>  Torrent İndir"><?php FilmKaliteResim($inAd,$inKalite,$site_icon_adres); ?></div>
								<div class="filmName"><?php echo ucwords($inAd.' '.FilmKalite($inKalite)); ?>  Torrent İndir</div>
							</a>
						</div>
						<?php
					}
					elseif($inTur ==4){
						$inTurr		= $eniyi4[4];
						$inTur = "program";
						?>
						<div class="film">
							<a href="<?php echo $site_adres; ?>/torrent-program/<?php echo $inSeo; ?>.html">
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/program/covers/<?php echo $inSeo;; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $inAd; ?> Torrent İndir" /></div>
							<?php
							$turu = $inTurr;
							$cek = mysql_fetch_array(mysql_query("select adi,seo,site_ad from program_turleri where id='$turu'"));
							$catAdi = $cek["adi"]; $catSAdi = $cek["site_ad"]; $catSeo = $cek["seo"];
							?>
							<a target="_blank" href="<?php echo $site_adres; ?>/torrent-program/<?php echo $catSeo; ?>/" title="<?php echo $catAdi; ?> Torrent İndir">
							<div class="oyunTur"><span><?php echo $catSAdi; ?></span>
							</div>
							</a>
							<div class="filmName"><?php echo $inAd; ?> Full Torrent İndir</div>
							</a>
						</div>
						<?php
					}

					?>
				
				<?php }	$sa++; } ?>
		</div>
	
	
		<div class="BigBox">
		<h2 class="H2Class"> Son Eklenen Film Torrentleri </h2>
			<?php
			BaglantiAc();
			$filmsorgu = mysql_query("select adi,seo,copySeo,imdb,kalite from filmler where durum='1' order by eklenme desc limit $indexFilmSayi");
			while($film_cek = mysql_fetch_array($filmsorgu)){ ?>
			
			<div class="film">
			<a href="<?php echo $site_adres; ?>/torrent-film/<?php echo $film_cek["seo"]; ?>.html" title="">
				<?php if($film_cek["copySeo"]=="0"){ ?>
					<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $film_cek["seo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $film_cek["adi"]; ?> Full Torrent İndir" /></div>
				<?php } else { ?>
				<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $film_cek["copySeo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $film_cek["adi"]; ?> Full Torrent İndir" /></div>
				<?php } ?>
				<div class="filmImdb">
					<?php echo IMDBRenk($film_cek["imdb"]); ?>
				</div>
				<div class="filmQuality" title="<?php echo ucwords($film_cek["adi"].' '.FilmKalite($film_cek["kalite"])); ?>  Torrent İndir"><?php FilmKaliteResim($film_cek["adi"],$film_cek["kalite"],$site_icon_adres); ?></div>
				<div class="filmName"><?php echo ucwords($film_cek["adi"].' '.FilmKalite($film_cek["kalite"])); ?>  Torrent İndir</div>
			</a>
			</div>
			<?php } BaglantiKapat(); ?>
		</div>
		
		<div class="BigBox">
		<h2 class="H2Class"> Son Eklenen Oyun Torrentleri </h2>
			<?php
			BaglantiAc();
			$Oyunsorgu = mysql_query("select adi,seo,turu from oyunlar where durum='1' order by eklenme desc limit $indexOyunSayi");
			while($oyuns_cek = mysql_fetch_array($Oyunsorgu)){ ?>
			
			<div class="film">
				<a href="<?php echo $site_adres; ?>/torrent-oyun/<?php echo $oyuns_cek["seo"]; ?>.html">
				<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/game/covers/<?php echo $oyuns_cek["seo"];; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $oyuns_cek["adi"]; ?> Full Torrent İndir" /></div>
				<?php
				$turu = $oyuns_cek["turu"];
				$cek = mysql_fetch_array(mysql_query("select adi,seo,icon,site_ad from oyun_turleri where id='$turu'"));
				$catAdi = $cek["adi"]; $catSAdi = $cek["site_ad"]; $catSeo = $cek["seo"]; $catImg = $cek["icon"];
				?>
				<a target="_blank" href="<?php echo $site_adres; ?>/torrent-oyun/<?php echo $catSeo; ?>/" title="<?php echo $catAdi; ?> Oyunları Torrent İndir">
				<div class="oyunTur"><img src="<?php echo $site_adres; ?>/files/images/style/<?php echo $catImg; ?>" width="24" height="24" alt="<?php echo $catAdi; ?> Oyunları Torrent İndir" /><span><?php echo $catSAdi; ?>
				</div>
				</a>
				<div class="filmName"><?php echo $oyuns_cek["adi"]; ?> Full Torrent İndir</div>
				</a>
			</div>
			<?php } BaglantiKapat(); ?>
		</div>
		
		<div class="BigBox">
		<h2 class="H2Class"> Son Eklenen Dizi Bölüm Torrentleri </h2>
			<?php
			BaglantiAc();
			$dizisorgu = mysql_query("select adi,seo,kalite from dizi_bolumler where durum='1' order by eklenme desc limit $indexDiziBlmSy");
			while($dizi_cek = mysql_fetch_array($dizisorgu)){ ?>
			
			<div class="film">
			<a href="<?php echo $site_adres; ?>/torrent-dizi/<?php echo $dizi_cek["seo"]; ?>.html" title="">
				<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/series/covers/<?php echo $dizi_cek["seo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $dizi_cek["adi"]; ?> Full Torrent İndir" /></div>
				<div class="filmQuality" title="<?php echo ucwords($dizi_cek["adi"].' '.FilmKalite($dizi_cek["kalite"])); ?>  Torrent İndir"><?php FilmKaliteResim($dizi_cek["adi"],$dizi_cek["kalite"],$site_icon_adres); ?></div>
				<div class="filmName"><?php echo ucwords($dizi_cek["adi"].' '.FilmKalite($dizi_cek["kalite"])); ?>  Torrent İndir</div>
			</a>
			</div>
			<?php } BaglantiKapat(); ?>
		</div>
		
		<div class="BigBox">
		<h2 class="H2Class"> Son Eklenen Program Torrentleri </h2>
			<?php
			BaglantiAc();
			$prorgu = mysql_query("select adi,seo,turu from programlar where durum='1' order by eklenme desc limit $indexProgramSy");
			while($programs_cek = mysql_fetch_array($prorgu)){ ?>
			
			<div class="film">
				<a href="<?php echo $site_adres; ?>/torrent-program/<?php echo $programs_cek["seo"]; ?>.html">
				<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/program/covers/<?php echo $programs_cek["seo"];; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $programs_cek["adi"]; ?> Torrent İndir" /></div>
				<?php
				$turu = $programs_cek["turu"];
				$cek = mysql_fetch_array(mysql_query("select adi,seo,site_ad from program_turleri where id='$turu'"));
				$catAdi = $cek["adi"]; $catSAdi = $cek["site_ad"]; $catSeo = $cek["seo"];
				?>
				<a target="_blank" href="<?php echo $site_adres; ?>/torrent-program/<?php echo $catSeo; ?>/" title="<?php echo $catAdi; ?> Torrent İndir">
				<div class="oyunTur"><span><?php echo $catSAdi; ?></span>
				</div>
				</a>
				<div class="filmName"><?php echo $programs_cek["adi"]; ?> Full Torrent İndir</div>
				</a>
			</div>
			<?php } BaglantiKapat(); ?>
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