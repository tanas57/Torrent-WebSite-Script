<?php
include "files/includes/functions.php";
ob_start();
if($_GET == TRUE){
	$catID = 0;
	$cat 	= @$_GET["cat"];
	$sayfa 	= @$_GET["sayfa"];

	BaglantiAc();
	$say1 = mysql_num_rows(mysql_query("select id from film_turleri where seo='$cat'"));
	if($say1 < 1){
		Yonlendir($site_adres.'/hata/',0);
		exit;
	}
	else{
		$sql = mysql_query("select * from film_turleri where seo='$cat'");
		$cek = mysql_fetch_array($sql);
		$catID = $cek["id"];
		$catBas= $cek["adi"];
		$catack= $cek["aciklama"];
		$catKey= $cek["anahtar"];
	}
	BaglantiKapat();
}
?>
<html>
	<head>
	<title> <?php echo $catBas; ?> Filmi Torrent İndir | <?php echo $site_baslik; ?> </title>
	<meta name="description" content="<?php echo $catack; ?>" charset="utf-8" />
	<meta name="keywords" content="<?php echo $catKey; ?>" charset="utf-8" />
	<?php include "files/includes/head.php"; ?>
	
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	<div id="LeftSide">
		<div class="BigBox">
		<?php
		if($catID != 0){
			?>
			
					<h2 class="H2Class"> <?php echo $catBas;?> Filmleri </h2>
	<?php
	BaglantiAc();
	$kacar = $FilmSayi;
	$sayfa = 1;
	
	$ek = "\'$catID\'";
	$say = mysql_num_rows(mysql_query("select adi,seo,imdb,kalite from filmler where turu like '%$ek%' and durum='1' order by eklenme desc"));
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
	$sql = mysql_query("select adi,seo,copySeo,imdb,kalite from filmler where turu like '%\'$catID\'%' and durum='1' order by eklenme desc limit $gosterilen,$kacar");
	
	$i = 1;
	while($film_cek = mysql_fetch_array($sql)){ ?>
			
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
			} BaglantiKapat();
	}
	else{
		echo '
		<p style="font-size:16px; font-weight:bold; font-family: \'Open Sans\', sans-serif; margin-top:15px;"> Bu film kategorisinde henüz film bulunmamaktadır.. Sitemiz yüklenmektedir en kısa sürede filmler eklenecektir. </p>
		';
	}
			?>
		<div class="temizle"></div>
		<div id="sayfalama">
			<?php 
			$yon = '/torrent-film/'.$cat.'/';
			Sayfala($yon,$say,$sayfa,$sayfa_sayisi); ?>
		</div>
			
		<?php }
		else{
			Yonlendir($site_adres.'/hata/',0);
			exit;
		}
		?>
		</div>
		
	</div>
	<div id="RightSide">
		<?php include "files/includes/sidebar.php"; ?>
	</div>
	<div class="temizle"></div>
	<?php include "files/includes/footer.php"; ?>
</div>
</div>
</body>
</html>
<?php
ob_end_flush();
?>