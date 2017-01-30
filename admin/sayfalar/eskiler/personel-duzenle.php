<?php ob_start(); ?>
<?php
	$gelen_id = $_GET["id"];
	$personel_sql	=	mysql_query("select * from personel where id='$gelen_id'");
	$personel_cek	=	mysql_fetch_array($personel_sql);
				
				$pozisyon		=	$personel_cek["pozisyon"];
				$adsoyad		=	$personel_cek["adsoyad"];
				$ozgecmis		=	$personel_cek["ozgecmis"];
				$mail			=	$personel_cek["mail"];
				$resim			=	$personel_cek["resim"];
				$telefon		=	$personel_cek["telefon"];
				$resim2 		=	$resim;
?>
<div class="yanyana">
<h3 class="anabaslik"> Personel Düzenle </h3>
<?php				
	if ($_POST == true)
	{
		$pozisyon	=	$_POST["pozisyon"];
		$adsoyad	=	$_POST["adsoyad"];
		$mail		=	$_POST["mail"];
		$ozgecmis	=	$_POST["ozgecmis"];
		$resim		=	$_FILES["resim"]["name"];
		$telefon	=	$_POST["telefon"];
		if ($pozisyon != "" && $adsoyad != "" && $ozgecmis != "")
		{
			if ($resim == true)
			{
				$yol = "../yuklenenler/";
				$kaynak 	= 	$_FILES["resim"]["tmp_name"];
				$uzanti		=	substr($_FILES["resim"]["name"],-4,4);
				if ($uzanti == "jpeg" || $uzanti == "JPEG")
					{
						$uzanti = ".jpeg";
					}
				$dosya_adi	=	md5($resim).rand(0,999999).$uzanti;
				$gonder		= 	move_uploaded_file($kaynak,$yol.$dosya_adi);
				if ($gonder == true)
				{
					$resim			=	"http://".$_SERVER['HTTP_HOST']."/yuklenenler/$dosya_adi";
					$personel_guncelle	=	mysql_query("update personel set pozisyon='$pozisyon', adsoyad='$adsoyad', ozgecmis='$ozgecmis', mail='$mail', resim='$resim', telefon='$telefon' where id='$gelen_id'");
					if ($personel_guncelle == true)
					{
						echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Personel Başarı İle Güncellendi!</span></div>";
					}
					else
					{
						echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata personel güncellenemedi!</span></div>";
					}
				}
				else
				{
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata personel güncellenemedi!</span></div>";
				}
			}
			else
			{
					$personel_guncelle	=	mysql_query("update personel set pozisyon='$pozisyon', adsoyad='$adsoyad', ozgecmis='$ozgecmis', mail='$mail', resim='$resim2',telefon='$telefon' where id='$gelen_id'");
					if ($personel_guncelle == true)
					{
						echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Personel Başarı İle Güncellendi!</span></div>";
						$resim	=	$resim2;
					}
					else
					{
						echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata personel güncellenemedi!</span></div>";
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
	<?php echo '<img src="'.$resim.'" width="100" height="100" />'; ?>
	<div class="resmi-degistir">
	<input name="resim" id="resim" type="file" size="1" maxlength="0"/>
	Dosya Seç' e tıklayarak resmi güncelleyebilirsiniz.
	</div>
	</div>
    <div class="urun-ozellikler">
    
	<div class="urun-baslik">
	Personel Ad ve Soyad:
	<input name="adsoyad" type="text" size="25" value="<?php echo $adsoyad; ?>" />
	</div>
	
	<div class="urun-baslik">
	Personel Pozisyonu:&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="pozisyon" type="text" size="25" value="<?php echo $pozisyon; ?>" />
	</div>
	
	<div class="urun-baslik">
	Personel Telefon:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="telefon" type="text" value="<?php echo $telefon; ?>" size="25" />
	</div>
	
	<div class="urun-baslik">
	Personel Mail (varsa):&nbsp;&nbsp;
	<input name="mail" type="text" size="25" value="<?php echo $mail; ?>" />
	</div>
	<div class="urun-aciklama">
	Personel özgeçmiş:
	  <label for="ozgecmis"></label>
	  <textarea name="ozgecmis" id="ozgecmis" cols="52" rows="4"><?php echo $ozgecmis; ?></textarea>
	</div>
	
	<input type="submit" value="Kaydet" />	
    
	</div>
	</div>
</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>