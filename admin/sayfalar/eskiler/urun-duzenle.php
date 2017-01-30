<?php ob_start(); ?>
<?php
	$gelen_id = $_GET["id"];
	$urun_sql	=	mysql_query("select * from urunler where urun_id='$gelen_id'");
	$urun_cek	=	mysql_fetch_array($urun_sql);
				
				$urun_baslik	=	$urun_cek["urun_baslik"];
				$urun_fiyat		=	$urun_cek["urun_fiyat"];
				$urun_resim		=	$urun_cek["urun_resim"];
				$urun_aciklama	=	$urun_cek["urun_aciklama"];
				$urun_resim2	=	$urun_resim;
?>
<div class="yanyana">
<h3 class="anabaslik"><?php echo $urun_baslik." - Ürününü Düzenle"; ?> </h3>
<?php
	if ($_POST == true)
	{
		$urun_baslik	=	$_POST["urun_baslik"];
		$urun_aciklama	=	$_POST["urun_aciklama"];
		$urun_resim		=	$_FILES["urun_resim"]["name"];
		$urun_fiyat		=	$_POST["urun_fiyat"];
			if ($urun_resim == true)
			{
				$yol = "../yuklenenler/";
				$kaynak 	= 	$_FILES["urun_resim"]["tmp_name"];
				$uzanti		=	substr($_FILES["urun_resim"]["name"],-4,4);
				if ($uzanti == "jpeg" || $uzanti == "JPEG")
					{
						$uzanti = ".jpeg";
					}
				$dosya_adi	=	md5($urun_resim).rand(0,999999).$uzanti;
				$gonder	= move_uploaded_file($kaynak,$yol.$dosya_adi);
				if ($gonder == true)
				{
					$urun_resim			=	"http://".$_SERVER['HTTP_HOST']."/yuklenenler/$dosya_adi";
					$urun_guncelle		=	mysql_query("update urunler set urun_baslik='$urun_baslik', urun_fiyat='$urun_fiyat', urun_resim='$urun_resim', urun_aciklama='$urun_aciklama' where urun_id='$gelen_id'");
					if ($urun_guncelle == true)
					{
						echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Ürün Başarı İle Güncellendi!</span></div>";
					}
					else
					{
						echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata ürün güncellenemedi!</span></div>";
					}
				}
				else
				{
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata ürün güncellenemedi!</span></div>";
				}
			}
			else
			{
				$urun_guncelle		=	mysql_query("update urunler set urun_baslik='$urun_baslik', urun_fiyat='$urun_fiyat', urun_resim='$urun_resim2', urun_aciklama='$urun_aciklama' where urun_id='$gelen_id'");
				if ($urun_guncelle == true)
					{
						$urun_resim	=	$urun_resim2;
						echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Ürün Başarı İle Güncellendi!</span></div>";
					}
					else
					{
						echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata ürün güncellenemedi!</span></div>";
					}
			}
	}
?>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat">
	<div class="urun-resim">	
	<img src="<?php echo $urun_resim; ?>" width="100" height="100" />
	<div class="resmi-degistir">
	<input name="urun_resim" id="urun_resim" type="file" size="1" maxlength="0" />
	</div>
	</div>
    <div class="urun-ozellikler">
    
	<div class="urun-baslik">
	Ürün başlığı:
	<input name="urun_baslik" type="text" value="<?php echo $urun_baslik; ?>" size="25" />
	</div>
	<div class="urun-aciklama">
	Ürün açıklaması: 
	  <label for="urun_aciklama"></label>
	  <textarea name="urun_aciklama" id="urun_aciklama" cols="53" rows="4"><?php echo $urun_aciklama; ?></textarea>
	</div>
	<div class="urun-aciklama">
	<br />
	Ürün fiyatı: 
	  <label for="urun_fiyat"></label>
	  <input name="urun_fiyat" id="urun_fiyat" value="<?php echo $urun_fiyat; ?>" size="10" maxlength="8">
	</div>
	
	<input type="submit" value="&Uuml;r&uuml;n&uuml; G&uuml;ncelle" />	
    
	</div>
	</div>
</form>
</div>
<div style="clear:both;"></div>
<?php ob_end_flush(); ?>