<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"> Oyun Kategori Ekle </h3>
<?php
	if ($_POST == true)
	{
		BaglantiAc();
				$adi		=	$_POST["adi"];
				$seo		=	$_POST["seo"];
				$aciklama	=	$_POST["aciklama"];
				$anahtar	=	$_POST["anahtar"];
				$icon		=	$_POST["icon"];
				$guncelle = mysql_query("insert into film_turleri (adi,seo,aciklama,anahtar,icon) values ('$adi','$seo','$aciklama','$anahtar','$icon')");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Eklendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Eklenemedi!</span></div>";
		BaglantiKapat();
	}
?>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat" style="height:auto;">

	<div class="urun-baslik">
	Adı
	<input name="adi" placeholder="Örnek: Aksiyon" type="text" value="" size="65" />
	</div><br/>
	<div class="urun-baslik">
	Seo
	<input name="seo" placeholder="örnek: aksiyon-oyunları-torrent-indir" type="text" value="" size="65" />
	</div><br/>
	<div class="urun-baslik">
	Açıklama
	<input name="aciklama" type="text" value="" size="65" />
	</div><br/>
	<div class="urun-baslik">
	Anahtar
	<input name="anahtar" type="text" value="" size="65" />
	</div><br/>
	<div class="urun-baslik">
	İcon
	<input name="icon" placeholder="örnek: icon-aksiyon.png" type="text" size="65" />
	<br />* İconları FTP'den "files/images/style" klasörüne 24x24 boyutunda atın. Buraya sadece icon ismini ve uzantısını yazın.
	</div><br/>
	<input type="submit" value="Güncelle" />	
</center>
	</div>
</form>
</div>
<div style="clear:both;"></div>
<?php ob_end_flush(); ?>