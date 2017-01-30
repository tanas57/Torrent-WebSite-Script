<?php
include "files/includes/functions.php";
ob_start();
?>
<html>
	<head>
	<title> Torrent Film İndir | <?php echo $site_baslik; ?> </title>
	<meta name="description" content="Torrent Filmleri bu sayfadan indirebilirsiniz. 1080p, 720p,480p filmleri full indirin. Film tanıtım,altyazı ve fragmranları film içlerinde mevcuttur." charset="utf-8" />
	<meta name="keywords" content="torrent film,film indir,full film,full film indir,torrent filmler,torrent full film,1080p film,720p film,hd film indir,hd torrent film,torrent full film,torrent 1080p film,torrent 720p film" charset="utf-8" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	<div id="LeftSide">
	<div class="BigBox">
		<h2 class="H2Class"> En çok İndirilen Filmler </h2>
		<?php
		BaglantiAc();
		$sql3 = mysql_query("select adi,seo,copySeo,imdb,kalite from filmler where durum='1' group by adi order by sayac_indirilme desc limit 4");
		while($film_cek = mysql_fetch_array($sql3)){ ?>
			
			<div class="film">
			<a href="<?php echo $site_adres; ?>/torrent-film/<?php echo $film_cek["seo"]; ?>.html" title="">
				<?php if($film_cek["copySeo"] == "0"){ ?>
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
			
			<?php
			} BaglantiKapat(); ?>
	</div>
		<div class="BigBox">
		<h2 class="H2Class"> Son Eklenen Torrent Filmler </h2>
	<?php
	BaglantiAc();
	$kacar = $FilmSayi;
	$sayfa = 1;
	
	$say = mysql_num_rows(mysql_query("select adi,seo,imdb,kalite from filmler where durum='1' order by eklenme desc"));
	$sayfa_sayisi = ceil($say/$kacar);
	
	if($say > 0){ 
	if(@$_GET["sayfa"] != "") {
			$sayfa = $_GET["sayfa"];
			if($sayfa>0 && $sayfa <900000){
				//sıkıntı yok.
				if($sayfa > $sayfa_sayisi){
					Yonlendir($site_adres.'/hata/',0);
					exit;
				}
			}
			else{
				Yonlendir($site_adres.'/hata/',0);
				exit;
			}
		}
	
	$gosterilen = ($sayfa*$kacar)-$kacar;
	$sql = mysql_query("select adi,seo,copySeo,imdb,kalite from filmler where durum='1'order by eklenme desc limit $gosterilen,$kacar");
	$i = 1;
	while($film_cek = mysql_fetch_array($sql)){ ?>
			
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
			
			<?php
			} BaglantiKapat(); } ?>
		<div class="temizle"></div>
			<div id="sayfalama">
				<?php Sayfala('/torrent/film-indir/',$say,$sayfa,$sayfa_sayisi); ?>
			</div>
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