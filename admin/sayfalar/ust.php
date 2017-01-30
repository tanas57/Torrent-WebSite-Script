<?php ob_start(); ?>
<?php include "sayfalar/ayarlar.php"; ?>
<?php include "../files/includes/functions.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title." - Yönetim Paneli"; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/js.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="sayfalar/jquery-2.1.1.min.js"></script>
<script src="sayfalar/admin.js"></script>
<script>tinymce.init({ selector:'.Editor' });</script>
</head>


<div class="enust">
<img src="images/avatar.jpg" width="50" height="50">
Merhaba <b><?php echo ucwords($_SESSION["kullanici"]); ?></b></br> 
<a class="button" href="/" target="_blank">Siteye Git</a>
<a class="button" href="yonetim.php?s=hesap">Hesap</a>
<a class="button icon remove danger" href="?s=cikis">Çıkış</a>

</div>

<div class="logo" style="color:#ccc;">
<h1> <?php echo $site_baslik; ?> - Admin Panel </h1>
</div>

<div class="menu">

<div id='cssmenu'>
<ul>
   <li class='active has-sub'><a href='yonetim.php?s=filmler&a=1'><span>Film</span></a>
      <ul>
		 <li><a href='yonetim.php?s=filmBekleyen&a=1'><span>Film Bekleyen</span></a></li>
         <li><a href='yonetim.php?s=filmEkle&a=1'><span>Film Ekle</span></a></li>
         <li><a href='yonetim.php?s=filmKategoriler'><span>Film Kategorileri</span></a></li>
		  <li><a href='yonetim.php?s=filmKategoriEkle'><span>Film Kategori Ekle</span></a></li>
      </ul>
    </li>     
         <li class='has-sub'><a href='yonetim.php?s=diziler&a=1'><span>Diziler</span></a>
            <ul>
               <li><a href='yonetim.php?s=diziEkle&a=1'><span>Dizi Ekle</span></a></li>
               <li class='last'><a href='yonetim.php?s=diziBolumEkle&a=1'><span>Dizi Bölüm Ekle</span></a></li>
			   <li class='last'><a href='yonetim.php?s=diziBolumler'><span>Bölümler</span></a></li>
			   <li class='last'><a href='yonetim.php?s=diziKategoriler'><span>Dizi Kategorileri</span></a></li>
			    <li><a href='yonetim.php?s=diziKategoriEkle'><span>Dizi Kategori Ekle</span></a></li>
            </ul>
         </li>
	<li class='active has-sub'><a href='yonetim.php?s=oyunlar&a=1'><span>Oyun</span></a>
      <ul>
         <li><a href='yonetim.php?s=oyunEkle&a=1'><span>Oyun Ekle</span></a></li>
         <li><a href='yonetim.php?s=oyunKategoriler'><span>Oyun Kategorileri</span></a></li>
		  <li><a href='yonetim.php?s=oyunKategoriEkle'><span>Oyun Kategori Ekle</span></a></li>
      </ul>
    </li> 	 
	<li class='active has-sub'><a href='yonetim.php?s=programlar&a=1'><span>Program</span></a>
      <ul>
         <li><a href='yonetim.php?s=programEkle&a=1'><span>Program Ekle</span></a></li>
         <li><a href='yonetim.php?s=programKategoriler'><span>Program Kategorileri</span></a></li>
		  <li><a href='yonetim.php?s=programKategoriEkle'><span>Program Kategori Ekle</span></a></li>
      </ul>
    </li> 	 
	<li class='active has-sub'><a href='yonetim.php?s=ayarlar'><span>Ayar</span></a>
      <ul>
		<li><a href='yonetim.php?s=AnasayfaAyar'><span>Anasayfa Ayarları</span></a></li>
		<li><a href='yonetim.php?s=SidebarAyar'><span>Sidebar Ayarları</span></a></li>
		<li><a href='yonetim.php?s=SayfalamaAyar'><span>Sayfalama Ayarları</span></a></li>
		<li><a href='yonetim.php?s=ReklamAyar'><span>Reklam Ayarları</span></a></li>
         <li><a href='yonetim.php?s=surumler'><span>Sürümler</span></a></li>
         <li><a href='yonetim.php?s=surumEkle'><span>Sürüm Ekle</span></a></li>
		  
      </ul>
    </li> 
   <li class='active has-sub'><a href='yonetim.php?s=ayarlar'><span>Rapor</span></a>
   <ul>
		<li><a href='yonetim.php?s=Bildirimler'><span>Geri Bildirimler<?php BaglantiAc(); $say=mysql_num_rows(mysql_query("select id from reports where durum='0'")); if($say>0) echo "<i style='color:#ff0000;'> ($say)</i>"; ?></span></a></li>
		<li><a href='yonetim.php?s=Loglar'><span>LOGLAR</span></a></li>
	</ul>
   </li>
   <li><a href='yonetim.php?s=yorumlar'><span>Yorum <?php BaglantiAc(); $say=mysql_num_rows(mysql_query("select id from yorumlar where durum='0'")); if($say>0) echo "<i style='color:#fff;'>($say)</i>"; ?></span></a></li>
</ul>
</div>


</div>
<br/>
<div class="yanyana">
<div class="sirala">
<a href="?s=filmEkle&a=1&seo="><div class="nav"><img src="images/icon/kategori.png" width="48" height="48">
<li class="">Film Ekle</li></div></a>
</div>

<div class="sirala">
<a href="?s=oyunEkle&a=1&seo="><div class="nav"><img src="images/icon/kategori.png" width="48" height="48">
<li class="">Oyun Ekle</li></div></a>
</div>

<div class="sirala">
<a href="?s=diziBolumEkle&a=1&seo="><div class="nav"><img src="images/icon/kategori.png" width="48" height="48">
<li class="">Dizi Bölüm Ekle</li></div></a>
</div>

<div class="sirala">
<a href="?s=programEkle&a=1&seo="><div class="nav"><img src="images/icon/kategori.png" width="48" height="48">
<li class="">Program Ekle</li></div></a>
</div>

<div class="sirala">
<a href="yonetim.php?s=diziEkle&a=1"><div class="nav"><img src="images/icon/kategori.png" width="48" height="48">
<li class="">Dizi Ekle</li></div></a>
</div>
	</div>
</div>
<div class="temizle"></div>