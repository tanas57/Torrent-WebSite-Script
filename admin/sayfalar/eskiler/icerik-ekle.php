<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"> Yeni İçerik Ekle </h3>
<?php
	if ($_POST == true)
	{
		$icerik_baslik 		=	$_POST["icerik_baslik"];
		$icerik_aciklama	=	$_POST["icerik_aciklama"];
		$icerik_resim		=	$_FILES["icerik_resim"]["name"];
		$icerik_resim2		=	"http://".$_SERVER['HTTP_HOST']."/images/resim_yok.png";
			if ($icerik_resim == true)
			{
				$yol = "../yuklenenler/";
				$kaynak 	= 	$_FILES["icerik_resim"]["tmp_name"];
				$uzanti		=	substr($_FILES["icerik_resim"]["name"],-4,4);
				$dosya_adi	=	md5($icerik_resim).rand(0,999999).$uzanti;
				$gonder	= move_uploaded_file($kaynak,$yol.$dosya_adi);
					if ($gonder == true)
					{
						$icerik_resim	= "http://".$_SERVER['HTTP_HOST']."/yuklenenler/$dosya_adi";
						$urun_ekle = mysql_query("insert into icerikler values ('','$icerik_baslik','$icerik_aciklama','$icerik_resim','1')");
							if ($urun_ekle == true )
							{
								echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>İçerik Başarı İle Eklendi!</span></div>";
							}
							else
							{
								echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata içerik eklenemedi!</span></div>";
							}
					}
					else
					{
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Resim yüklenemedi!</span></div>";
					}
			}
			else
			{
						$urun_ekle = mysql_query("insert into icerikler values ('','$icerik_baslik','$icerik_aciklama','$icerik_resim2','1')");
							if ($urun_ekle == true )
							{
								echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>İçerik Başarı İle Eklendi!</span></div>";
							}
							else
							{
								echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata içerik eklenemedi!</span></div>";
							}
			}
	}
?>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat" style="height:auto;">
	<center>
	İçerik resim:<br/>
	<div style="border:1px solid #ccc; width:100px; height:100px;">
	<img src="images/resim_yok.png" width="100" height="100" />
	</div>
	<div class="resmi-degistir">
	Resmi Ekle:<input name="icerik_resim" id="icerik_resim" type="file" size="1" maxlength="0" />
	</div>
	<hr />
	<br />
	<div class="urun-baslik">
	İçerik başlığı:
	<input name="icerik_baslik" type="text" value="" size="65" />
	<hr />
	</div>
	<div class="urun-aciklama">
	İçerik açıklaması: <br/>
	  <label for="urun_aciklama"></label>
	  <textarea name="icerik_aciklama" id="icerik_aciklama" class="ckeditor" cols="70" rows="20"></textarea>
	</div>
	
	<input type="submit" value="Güncelle" />	
</center>
	</div>
</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>