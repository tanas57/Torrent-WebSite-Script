<?php
include "files/includes/functions.php";
ob_start();
?>
<html>
	<head>
	<title> Torrent Dizi İndir | <?php echo $site_baslik; ?> </title>
	<meta name="description" content="Torrent Dizileri bu sayfadan sezon ve bölümlere göre indirebilirsiniz. Torrent ile yerli ve yabancı dizileri tamamını indirebilirsiniz." charset="utf-8" />
	<meta name="keywords" content="torrent,torrent dizi,torrent dizi indir,torrent dizi full dizi,indir torrent dizi,torrent dizi bölümleri,torrent dizi sezon indir,torrent dizi tam indir,torrent dizi tüm sezon indir" charset="utf-8" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	<div id="LeftSide">
		<div class="BigBox">
		<h2 class="H2Class"> Torrent Diziler </h2>
	<?php
	BaglantiAc();
	$kacar = $DiziSayi;
	$sayfa = 1;
	
	$say = mysql_num_rows(mysql_query("select id from diziler where durum='1' order by id desc"));
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
	
	function DiziTurYaz2($id){
	$idler = explode(',',$id);
	$i=0;
	global $site_adres;
	foreach($idler as $nID){
		preg_match("@'(.*?)'@si",$nID,$de1);
		$nID = $de1[1];
		$sql = mysql_query("select adi,seo from dizi_turleri where id='$nID'");
		$cek = mysql_fetch_array($sql);
		if($i != 0) echo ' | ';
		echo '<a href="'.$site_adres.'/torrent-dizi/'.$cek["seo"].'/" title="'.$cek["adi"].' Dizileri Torrent İndir">'.$cek["adi"].' </a>';
		$i++;
	}
}
	
	$gosterilen = ($sayfa*$kacar)-$kacar;
	$sql = mysql_query("select adi,seo,imdb,turu,icerik from diziler where durum='1' order by id desc limit $gosterilen,$kacar");
	
	while($dizi_cek = mysql_fetch_array($sql)){ ?>
<div class="series">
	<a href="<?php echo $site_adres;?>/dizi/<?php echo $dizi_cek["seo"];?>/" title="<?php echo $dizi_cek["adi"];?> Sezon & Bölümlerini Görüntüle">
	<div class="serieIMG"><img src="<?php echo $site_adres;?>/img.php?src=<?php echo $site_adres;?>/files/images/series/covers/<?php echo $dizi_cek["seo"]; ?>-kapak.jpg&w=150&h=230" width="150" height="230" alt="<?php echo $dizi_cek["adi"];?>" /></div>
	<div class="filmImdb"><?php echo IMDBRenk2($dizi_cek["imdb"]); ?></div></a>
	<div class="serieTitle"><a href="<?php echo $site_adres; ?>/dizi/<?php echo $dizi_cek["seo"]; ?>/"><?php echo $dizi_cek["adi"]; ?></a></div>
	<div class="serieCategory"><?php echo DiziTurYaz2($dizi_cek["turu"]); ?></div>
	<div class="serieMean"><?php echo kisalt($dizi_cek["icerik"], 210, $son="[..]");?></div>
	<div class="serieDown"><a href="<?php echo $site_adres;?>/dizi/<?php echo $dizi_cek["seo"];?>/" title="<?php echo $dizi_cek["adi"];?> Sezon & Bölümlerini Görüntüle"><img src="<?php echo $site_adres; ?>/files/images/style/goruntule.png" width="88" height="45" alt="Dizi Görüntüle" /></a></div>
</div>
	<?php } BaglantiKapat(); } ?>
		<div class="temizle"></div>
			<div id="sayfalama">
				<?php Sayfala('/torrent/dizi-indir/',$say,$sayfa,$sayfa_sayisi); ?>
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