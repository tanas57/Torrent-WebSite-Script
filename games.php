<?php
include "files/includes/functions.php";
ob_start();
?>
<html>
	<head>
	<title> Torrent Oyun İndir | <?php echo $site_baslik; ?> </title>
	<meta name="description" content="Torrent oyunları buradan indirebilirsiniz.Full oyunlar, PC oyunları, PS3,PS4 oyunları full torrent indirin. Full ve crack içeren torrentleri burda bulabilirsiniz. " charset="utf-8" />
	<meta name="keywords" content="torrent,torrent oyun,torrent oyun indir,torrent oyun full,full torrent,full torrent oyun,full torrent oyun indir,torrent pc oyunları,torrent xbox oyunları,torrent ps4 oyunları,torrent ps3 oyunları" charset="utf-8" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	<div id="LeftSide">
	<div class="BigBox">
		<h2 class="H2Class"> En çok İndirilen Oyunlar </h2>
		<?php
		BaglantiAc();
		$sql3 = mysql_query("select adi,seo,turu from oyunlar where durum='1' order by sayac_indirilme desc limit 4");
		while($oyuns_cek = mysql_fetch_array($sql3)){ ?>
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
			
			<?php
			} BaglantiKapat(); ?>
	</div>
		<div class="BigBox">
		<h2 class="H2Class"> Son Eklenen Torrent Oyunlar </h2>
	<?php
	BaglantiAc();
	$kacar = $OyunSayi;
	$sayfa = 1;
	
	$say = mysql_num_rows(mysql_query("select adi,seo,turu from oyunlar where durum='1' order by id desc"));
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
	$sql = mysql_query("select adi,seo,turu from oyunlar where durum='1'order by id desc limit $gosterilen,$kacar");
	$i = 1;
	while($oyuns_cek = mysql_fetch_array($sql)){ ?>
			
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
</body>
</html>
<?php
ob_end_flush();
?>