<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"> Yeni Personel Ekle </h3>
<?php
	if ($_POST == true)
	{
		$adsoyad 		=	$_POST["adsoyad"];
		$pozisyon		=	$_POST["pozisyon"];
		$mail			=	$_POST["mail"];
		$resim			=	$_FILES["resim"]["name"];
		$ozgecmis		=	$_POST["ozgecmis"];
		$telefon		=	$_POST["telefon"];
		if ($adsoyad != "" && $pozisyon != "" && $ozgecmis != "" && $telefon != "")
		{
			if ($resim == true)
			{
				$yol = "../yuklenenler/";
				$kaynak 	= 	$_FILES["resim"]["tmp_name"];
				$uzanti		=	substr($_FILES["resim"]["name"],-4,4);
				$dosya_adi	=	md5($resim).rand(0,999999).$uzanti;
				$gonder	= move_uploaded_file($kaynak,$yol.$dosya_adi);
					if ($gonder == true)
					{
						$resim	= "http://".$_SERVER['HTTP_HOST']."/yuklenenler/$dosya_adi";
						$personel_ekle = mysql_query("insert into personel values ('','$pozisyon','$adsoyad','$ozgecmis','$mail','$resim','1','$telefon')");
							if ($personel_ekle == true )
							{
								echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Personel Başarı İle Eklendi!</span></div>";
							}
							else
							{
								echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata personel eklenemedi!</span></div>";
							}
					}
					else
					{
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Resim yüklenemedi!</span></div>";
					}
			}
			else
			{
				$resim	= "http://".$_SERVER['HTTP_HOST']."/images/resim_yok.png";
				$personel_ekle = mysql_query("insert into personel values ('','$pozisyon','$adsoyad','$ozgecmis','$mail','$resim','1','$telefon','$alt')");
							if ($personel_ekle == true )
							{
								echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Personel Başarı İle Eklendi!</span></div>";
							}
							else
							{
								echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata personel eklenemedi!</span></div>";
							}
			}
		}
		else
		{
		echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata boş alanlar var!</span></div>";
		}
	}
?>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat-auto">
	<div class="urun-resim">
	<img src="images/resim_yok.png" width="100" height="100" />
	<div class="resmi-degistir">
	<input name="resim" id="resim" type="file" size="1" maxlength="0"/>
	Dosya Seç' e tıklayarak yeni bir resim ekleyebilirsiniz
	</div>
	</div>
    <div class="urun-ozellikler">
    
	<div class="urun-baslik">
	Personel Ad ve Soyad:
	<input name="adsoyad" type="text" value="" size="25" />
	</div>
	
	<div class="urun-baslik">
	Personel Pozisyonu:&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="pozisyon" type="text" value="" size="25" />
	</div>
	
	<div class="urun-baslik">
	Personel Telefon:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="telefon" type="text" value="" size="25" />
	</div>
	
	<div class="urun-baslik">
	Personel Mail (varsa):&nbsp;&nbsp;
	<input name="mail" type="text" value="" size="25" />
	</div>
	<div class="urun-aciklama">
	Personel özgeçmiş:
	  <label for="ozgecmis"></label>
	  <textarea name="ozgecmis" id="ozgecmis" cols="52" rows="4"></textarea>
	</div>
	
	<input type="submit" value="Personel Ekle" />	
    
	</div>
	</div>
</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>