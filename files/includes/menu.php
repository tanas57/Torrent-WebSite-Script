<?php
if($reklamPopupDurum == 1) echo '<!-- Popup Reklamı -->
'.$reklamPopup.'
<!-- Popup Reklamı -->
';
if($reklamSplashDurum == 1) echo '<!-- Splash Reklamı -->
'.$reklamSplash.'
<!-- Popup Reklamı -->
';
?>
<div id="fixmenu">
<div id="menulist">
<div id="logo"></div>
	<ul>
<li id="logo"><a style="margin:0px; padding:0px;" href="<?php echo $site_adres; ?>/"><img src="<?php echo $site_adres; ?>/files/images/style/logo2.png" width="250" height="53" alt="<?php echo $site_baslik; ?>" /></a></li>
<li class='has-sub'><a href="<?php echo $site_adres; ?>/torrent/film-indir.html">Fimler</a>
<ul><?php
					BaglantiAc();
					$film_kategori_sql = mysql_query("select id,adi,seo from film_turleri order by adi asc");
					while($film_kategori_cek = mysql_fetch_array($film_kategori_sql)){
						$id = $film_kategori_cek["id"];
						$say = mysql_num_rows(mysql_query("select id from filmler where turu like '%\'$id\'%' and durum='1'"));
						if($say > 0){
						echo '
	<li><a href="'.$site_adres.'/torrent-film/'.$film_kategori_cek["seo"].'/">'.$film_kategori_cek["adi"].' Filmleri</a></li>';	
						}
					}
					BaglantiKapat();
				?>

</ul>
		</li>
<li class='has-sub'><a href="<?php echo $site_adres; ?>/torrent/dizi-indir.html">Diziler</a>
<ul>
					<?php
					BaglantiAc();
					$film_kategori_sql = mysql_query("select id,adi,seo from dizi_turleri order by adi asc");
					while($film_kategori_cek = mysql_fetch_array($film_kategori_sql)){
						$id = $film_kategori_cek["id"];
						$say = mysql_num_rows(mysql_query("select * from diziler where turu like '%\'$id\'%' and durum='1'"));
						if($say > 0){
						echo '
	<li><a href="'.$site_adres.'/torrent-dizi/'.$film_kategori_cek["seo"].'/">'.$film_kategori_cek["adi"].' Dizileri</a></li>';
						}
					}
					BaglantiKapat();
					?>

</ul>
</li>
<li class='has-sub'><a href="<?php echo $site_adres; ?>/torrent/oyun-indir.html">Oyunlar</a>
<ul>
				<?php
					BaglantiAc();
					$oyun_kategori_sql = mysql_query("select id,adi,seo from oyun_turleri order by adi asc");
					while($oyun_kategori_cek = mysql_fetch_array($oyun_kategori_sql)){
						$id = $oyun_kategori_cek["id"];
						$say = mysql_num_rows(mysql_query("select id from oyunlar where turu like '%$id%'"));
						if($say > 0){
						echo '
<li><a href="'.$site_adres.'/torrent-oyun/'.$oyun_kategori_cek["seo"].'/">'.$oyun_kategori_cek["adi"].' Oyunları</a></li>';
						}
					}
					BaglantiKapat();
				?>

</ul>
</li>
<li class='has-sub'><a href="<?php echo $site_adres; ?>/torrent/program-indir.html">Programlar</a>
<ul>
				<?php
					BaglantiAc();
					$film_kategori_sql = mysql_query("select id,adi,seo from program_turleri order by adi asc");
					while($film_kategori_cek = mysql_fetch_array($film_kategori_sql)){
						$id = $film_kategori_cek["id"];
						$say = mysql_num_rows(mysql_query("select id from programlar where turu like '%$id%'"));
						if($say > 0){
						echo '
	<li><a href="'.$site_adres.'/torrent-program/'.$film_kategori_cek["seo"].'/">'.$film_kategori_cek["adi"].' Programları</a></li>';
						}
					}
					BaglantiKapat();
				?>

</ul>
</li>
<li class='has-sub'><a href="#">Hakkında</a>
<ul>
	<li><a href="<?php echo $site_adres;?>/hakkinda/">Hakkında</a></li>
	<li><a href="<?php echo $site_adres;?>/yasal/">Yasal Uyarı</a></li>
	<li><a href="<?php echo $site_adres;?>/reklam/">Reklam</a></li>
	<li><a href="<?php echo $site_adres;?>/iletisim/">İletişim</a></li>
</ul>
</li>
	</ul>
	</div>
</div>
<div class="temizle"></div>
