<?php ob_start(); ?>
<?php
BaglantiAc();
	$gelen_id = $_GET["id"];
	$icerik_sql	=	mysql_query("select * from surumler where id='$gelen_id'");
	$icerik_cek	=	mysql_fetch_array($icerik_sql);
				
				$adi		=	$icerik_cek["adi"];
				$turu		=	$icerik_cek["turu"];
BaglantiKapat();
?>
<div class="yanyana">
<h3 class="anabaslik"><?php echo $adi." - Türünü Düzenle"; ?> </h3>
<?php
	if ($_POST == true)
	{
		BaglantiAc();
				$adi		=	$_POST["adi"];
				$seo		=	$_POST["turu"];
				$guncelle = mysql_query("update dizi_turleri set adi='$adi',seo='$seo',aciklama='$aciklama',anahtar='$anahtar' where id='$gelen_id'");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi!</span></div>";
		BaglantiKapat();
	}
?>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat" style="height:auto;">

	<div class="urun-baslik">
	Adı
	<input name="adi" type="text" value="<?php echo $adi; ?>" size="65" />
	</div><br/>
	<div class="urun-baslik">
	Türü
	<select name="turu">
		<option value="oyun">OYUN</option>
		<option value="film">FİLM & DİZİ</option>
	</select>
	</div><br/>
	
	
	<input type="submit" value="Güncelle" />	
</center>
	</div>
</form>
</div>
<div style="clear:both;"></div>
<?php ob_end_flush(); ?>