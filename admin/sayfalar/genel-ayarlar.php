<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
BaglantiAc();
$site_bilgi_sql	=	mysql_query("select * from ayarlar");
$site_bilgi_cek =	mysql_fetch_array($site_bilgi_sql);

	$site_baslik	=	$site_bilgi_cek["site_title"];
	$site_aciklama	=	$site_bilgi_cek["site_description"];
	$site_anahtar	=	$site_bilgi_cek["site_keywords"];
	$site_adres		=	$site_bilgi_cek["site_adres"];
	$site_metalar	=	$site_bilgi_cek["site_metalar"];
BaglantiKapat();
?>
<div class="yanyana">
<?php	
	if ($_POST == true)
	{
		BaglantiAc();
		$hangisi		=	$_POST["hangisi"];
		if ($hangisi == "ayarlar")
		{
		$site_baslik	=	$_POST["baslik"];
		$site_aciklama	=	$_POST["aciklama"];
		$site_anahtar	=	$_POST["anahtar"];
		$site_adres		=	$_POST["adres"];
		$guncelle = mysql_query("update ayarlar set site_title='$site_baslik', site_description='$site_aciklama', site_keywords='$site_anahtar', site_adres='$site_adres'");
		if($guncelle)echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
		else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi! . '".mysql_error()."</span></div>";
		}
		if ($hangisi == "metalar")
		{
		$site_metalar	=	$_POST["metalar"];
		$guncelle = mysql_query("update ayarlar set site_metalar='$site_metalar'");
		if($guncelle)echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
		else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi! . '".mysql_error()."</span></div>";
		}
		BaglantiKapat();
	}
?>

<h3 class="anabaslik">Genel Ayarlar </h3>
<form action="" method="post">
	<div class="uzat2" style="height:auto; padding:10px;">
	<strong> Site başlığı </strong><br/><br/>
	<div class="orta">
	  <label for="baslik"></label>
	  <input name="baslik" type="text" id="baslik" size="45" maxlength="200" value="<?php echo $site_baslik; ?>" /><br/><br/>
	</div>	
	<strong> Site Açıklaması </strong><br/><br/>
	<div class="orta">
	  <label for="aciklama"></label>
	  <textarea name="aciklama" id="aciklama" cols="45" rows="5" maxlength="300"><?php echo $site_aciklama; ?></textarea><br/><br/>
	</div>
	<strong> Site Adresi </strong><h6 style="margin:0px; font-weight:normal;">Lütfen adres sonunda '/' koymayın. </h6><br/>
	<div class="orta">
	  <label for="baslik"></label>
	  <input name="adres" type="text" id="adres" size="45" maxlength="200" value="<?php echo $site_adres; ?>" /><br/><br/>
	</div>	
	<strong> Site Anahtar Kelimeleri </strong><h6 style="margin:0px; font-weight:normal;">Lütfen kelimeleri virgül ile ayırın</h6><br/>
	<div class="orta">
    <label for="anahtar"></label>
	  <input name="anahtar" type="text" id="anahtar" size="45" maxlength="300" value="<?php echo $site_anahtar; ?>" /><br/><br/>
    </div>
	<input name="hangisi" type="hidden" value="ayarlar" />
	<div class="orta"><input name="guncelle" type="submit" value="Değerleri Güncelle" /></div>
	</div>
</form>
<form action="" method="post">
<h3 class="anabaslik"> Meta Etiketi Ekleyin </h3>
<div class="uzat" style="height:auto; padding:10px">

<strong> Meta etiketleri </strong><h6 style="margin:0px; font-weight:normal;">Unutma bu kodlar her sayfada [head] blogundan çalışacak.. Kodları doğru girdiğinden emin ol, aksi taktirde site görünümü bozulabilir.</h6><br/>
<div class="orta">
	  <label for="metalar"></label>
	  <textarea name="metalar" id="metalar" cols="45" rows="8"><?php echo $site_metalar; ?></textarea><br/><br/>
	</div>
	<input name="hangisi" type="hidden" value="metalar" />
	<div class="orta"><input name="guncelle" type="submit" value="Değerleri Güncelle" /></div>
</div>
</form>
</div>
<div style="clear:both;"></div>