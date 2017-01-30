	<div class="sidebar">
	<h1 class="H2Class"><?php echo $Sidebar1Baslik; ?></h1>
	<p> <?php echo $Sidebar1Icerik; ?> </p>
	</div>
	<div class="temizle"></div>
	
	<div class="sidebar">
	<h3 class="H2Class"><?php echo $Sidebar2Baslik; ?></h3>
	<form class="form-wrapper" action="<?php echo $site_adres;?>/torrent-ara/" method="post">
	<span> Filtreler (İsteğe Bağlı) </span>
		<select name="category" onchange="GetSubCategory();">
			<option value="0">Seçiniz</option>
			<option value="film">FİLM</option>
			<option value="dizi">DİZİ</option>
			<option value="oyun">OYUN</option>
			<option value="program">PROGRAM</option>
		</select>
		<select name="subCategory">
			<option value="0">Üst Kat. Seçiniz</option>
		</select>
		<div id="imdbSeLi"><input type="checkbox" name="imdbList" value="1" /> İMDB Puanına göre sıralansın mı?</div>
		<input id="search" type="text" name="torrentAra" size="35" maxlength="50" placeholder="Arama kelimenizi girin.." required />
		<input type="submit" name="SearchBtn" value="Ara" id="submit" />
	</form>
	</div>
	<div class="temizle"></div>
	<?php if($reklamSidebarDurum == 1)
	echo '
	<div class="sidebar">
	'.$reklamSidebar.'
	</div>
	<div class="temizle"></div>
';
?>
	
	<div class="sidebar">
	<h3 class="H2Class"><?php echo $Sidebar3Baslik; ?></h3>
	<?php
		BaglantiAc();
		$enSql = mysql_query("select adi,seo,copySeo,sayac_goruntuleme from filmler where durum='1' group by adi order by sayac_goruntuleme desc limit $Sidebar3Sayi");
		while($enCek = mysql_fetch_array($enSql)){
			?>
			<?php if($enCek["copySeo"] == "0"){ ?>
				<a href="<?php echo $site_adres; ?>/torrent-film/<?php echo $enCek["seo"]; ?>.html" title="<?php echo $enCek["adi"]; ?> | Görüntülenme Sayısı: <?php echo $enCek["sayac_goruntuleme"]; ?>">
				<img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $enCek["seo"]; ?>-kapak.jpg&w=95&h=95" width="95" height="95" alt="<?php echo $enCek["adi"]; ?> Torrent İndir" />
				</a>
				<?php } else { ?>
				<a href="<?php echo $site_adres; ?>/torrent-film/<?php echo $enCek["seo"]; ?>.html" title="<?php echo $enCek["adi"]; ?> | Görüntülenme Sayısı: <?php echo $enCek["sayac_goruntuleme"]; ?>">
				<img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $enCek["copySeo"]; ?>-kapak.jpg&w=95&h=95" width="95" height="95" alt="<?php echo $enCek["adi"]; ?> Torrent İndir" />
				</a>
				<?php } ?>
			<?php
		}
		BaglantiKapat();
	?>
	</div>
	<div class="temizle"></div>
	
	<div class="sidebar">
	<?php
		BaglantiAc();
		$enSql = mysql_query("select adi,seo from diziler where durum='1' and id='$Sidebar4Dizi'");
		$cekDiz= mysql_fetch_array($enSql);
		$dizi_adi = $cekDiz["adi"];
		$dizi_seo = $cekDiz["seo"];
		BaglantiKapat();
	?>
	<h3 class="H2Class"><?php echo $Sidebar4Baslik; ?> <?php echo $dizi_adi; ?> </h3>
	<a href="<?php echo $site_adres; ?>/dizi/<?php echo $dizi_seo; ?>/" title="<?php echo $dizi_adi; ?> Dizisi bilgisi için tıklayın"><img src="<?php echo $site_adres;?>/img.php?src=<?php echo $site_adres;?>/files/images/series/covers/<?php echo $dizi_seo; ?>-kapak.jpg&w=300&h=350" alt="<?php echo $dizi_adi; ?> kapak resmi" width="300" height="350" />
	<div class="imageDesc"><?php echo $dizi_adi; ?></div>
	</a>
	</div>
	<div class="temizle"></div>
	
	<div class="sidebar">
	<h3 class="H2Class"><?php echo $Sidebar5Baslik; ?></h3>
	<?php
		BaglantiAc();
		$enSql = mysql_query("select adi,seo,sayac_goruntuleme from programlar where durum='1' order by sayac_goruntuleme desc limit $Sidebar5Sayi");
		while($enCek = mysql_fetch_array($enSql)){
			echo '
			<a href="'.$site_adres.'/torrent-program/'.$enCek["seo"].'.html" title="'.$enCek["adi"].' | Görüntülenme Sayısı: '.$enCek["sayac_goruntuleme"].'">
				<img src="'.$site_adres.'/img.php?src='.$site_adres.'/files/images/program/covers/'.$enCek["seo"].'-kapak.jpg&w=95&h=95" width="95" height="95" alt="'.$enCek["adi"].' Torrent İndir" />
			</a>
			';
		}
		BaglantiKapat();
	?>
	</div>
	<div class="temizle"></div>
	
	<div class="sidebar">
	<h3 class="H2Class"><?php echo $Sidebar6Baslik; ?></h3>
	<?php
		BaglantiAc();
		$enSql = mysql_query("select adi,seo,copySeo,imdb from filmler where durum='1' and copySeo='0' order by imdb desc limit $Sidebar6Sayi");
		while($enCek = mysql_fetch_array($enSql)){
			?>
			<?php if($enCek["copySeo"] == "0"){ ?>
				<a href="<?php echo $site_adres; ?>/torrent-film/<?php echo $enCek["seo"]; ?>.html" title="<?php echo $enCek["adi"]; ?> - İMDB Puanı : <?php echo $enCek["imdb"]; ?>">
				<img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $enCek["seo"]; ?>-kapak.jpg&w=95&h=95" width="95" height="95" alt="<?php echo $enCek["adi"]; ?> Torrent İndir" />
				</a>
				<?php } else { ?>
				<a href="<?php echo $site_adres; ?>/torrent-film/<?php echo $enCek["seo"]; ?>.html" title="<?php echo $enCek["adi"]; ?> - İMDB Puanı : <?php echo $enCek["imdb"]; ?>">
				<img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $enCek["copySeo"]; ?>-kapak.jpg&w=95&h=95" width="95" height="95" alt="<?php echo $enCek["adi"]; ?> Torrent İndir" />
				</a>
				<?php } ?>
			<?php
		}
		BaglantiKapat();
	?>
	</div>
	<div class="temizle"></div>