<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"> Sürüm Ekle </h3>
<?php
	if ($_POST == true)
	{
		BaglantiAc();
				$adi		=	$_POST["adi"];
				$turu		=	$_POST["turu"];
				$guncelle = mysql_query("insert into surumler(adi,turu) values('$adi','$turu')");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Eklendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Eklenemedi!</span></div>";
		BaglantiKapat();
	}
?>
<form name="urun" action="" method="post">
	<div class="uzat" style="height:auto;">

	<div class="urun-baslik">
	Adı
	<input name="adi" type="text" size="65" />
	</div>
	<br/>
	<div class="urun-baslik">
	Türü
	<select name="turu">
		<option value="oyun">OYUN</option>
		<option value="film">FİLM&DİZİ</option>
	</select>
	</div>
	<br/>
	<input type="submit" value="Ekle" />	
</center>
	</div>
</form>
</div>
<div style="clear:both;"></div>
<?php ob_end_flush(); ?>