<?php
include "files/includes/functions.php";
ob_start();
?>
<html>
	<head>
	<title> Torrent Program İndir | <?php echo $site_baslik; ?> </title>
	<meta name="description" content="Torrent programları bu sayfada bulabilirsiniz. Programları full torrent ile indirebilmeniz için sizlere linklere sayfalardan ulaşabilirsiniz." charset="utf-8" />
	<meta name="keywords" content="torrent,torrent program,torrent program indir,torrent program torrent indir,torrent program full indir,torrent program full torrent,full torrent program indir" charset="utf-8" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	<div id="LeftSide">
	<div class="BigBox">
		<h2 class="H2Class"> En çok İndirilen Programlar </h2>
		<?php
		BaglantiAc();
		$sql3 = mysql_query("select adi,seo,turu from programlar where durum='1' order by sayac_indirilme desc limit 4");
		while($programs_cek = mysql_fetch_array($sql3)){ ?>
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
			
			<?php
			} BaglantiKapat(); ?>
	</div>
		<div class="BigBox">
		<h2 class="H2Class"> Son Eklenen Torrent Programlar </h2>
	<?php
	BaglantiAc();
	$kacar = $ProgramSayi;
	$sayfa = 1;
	
	$say = mysql_num_rows(mysql_query("select id from programlar where durum='1' order by id desc"));
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
	$sql = mysql_query("select adi,seo,turu from programlar where durum='1' order by id desc limit $gosterilen,$kacar");
	$i = 1;
	while($programs_cek = mysql_fetch_array($sql)){ ?>
			
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
			
			<?php
			} BaglantiKapat(); } ?>
		<div class="temizle"></div>
			<div id="sayfalama">
				<?php Sayfala('/torrent/program-indir/',$say,$sayfa,$sayfa_sayisi); ?>
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