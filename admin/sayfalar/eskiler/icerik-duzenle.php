<?php ob_start(); ?>
<?php
	$gelen_id = $_GET["id"];
	$icerik_sql	=	mysql_query("select * from icerikler where id='$gelen_id'");
	$icerik_cek	=	mysql_fetch_array($icerik_sql);
				
				$icerik_baslik	=	$icerik_cek["baslik"];
				$icerik_aciklama=	$icerik_cek["icerik"];
				$icerik_resim	=	$icerik_cek["resim"];
				$icerik_resim2	=	$icerik_resim;
?>
<div class="yanyana">
<h3 class="anabaslik"><?php echo $icerik_baslik." - İçeriğini Düzenle"; ?> </h3>
<?php
	if ($_POST == true)
	{
		$icerik_baslik		=	$_POST["icerik_baslik"];
		$icerik_aciklama	=	$_POST["icerik_aciklama"];
		$icerik_resim		=	$_FILES["icerik_resim"]["name"];
			if ($icerik_resim == true)
			{
				$yol = "../yuklenenler/";
				$kaynak 	= 	$_FILES["icerik_resim"]["tmp_name"];
				$uzanti		=	substr($_FILES["icerik_resim"]["name"],-4,4);
				if ($uzanti == "jpeg" || $uzanti == "JPEG")
					{
						$uzanti = ".jpeg";
					}
				$dosya_adi	=	md5($icerik_resim).rand(0,999999).$uzanti;
				$gonder	= move_uploaded_file($kaynak,$yol.$dosya_adi);
				if ($gonder == true)
				{
					$icerik_resim		=	"http://".$_SERVER['HTTP_HOST']."/yuklenenler/$dosya_adi";
					$icerik_guncelle	=	mysql_query("update icerikler set baslik='$icerik_baslik', icerik='$icerik_aciklama', resim='$icerik_resim', durum='1' where id='$gelen_id'");
					if ($icerik_guncelle == true)
					{
						echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>İçerik Başarı İle Güncellendi!</span></div>";
					}
					else
					{
						echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata içerik güncellenemedi!</span></div>";
					}
				}
				else
				{
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata içerik güncellenemedi!</span></div>";
				}
			}
			else
			{
				$icerik_guncelle	=	mysql_query("update icerikler set baslik='$icerik_baslik', icerik='$icerik_aciklama', resim='$icerik_resim2', durum='1' where id='$gelen_id'");
					if ($icerik_guncelle == true)
					{
						echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>İçerik Başarı İle Güncellendi!</span></div>";
						$icerik_resim	=	$icerik_resim2;
					}
					else
					{
						echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata içerik güncellenemedi!</span></div>";
					}
			}
	}
?>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat" style="height:auto;">
	<center>
	İçerik resim:<br/>
	<div style="border:1px solid #ccc; width:100px; height:100px;">
	<img src="<?php echo $icerik_resim; ?>" width="100" height="100" />
	</div>
	<div class="resmi-degistir">
	Resmi Değiştir:<input name="icerik_resim" id="icerik_resim" type="file" size="1" maxlength="0" />
	</div>
	<hr />
	<br />
	<div class="urun-baslik">
	İçerik başlığı:
	<input name="icerik_baslik" type="text" value="<?php echo $icerik_baslik; ?>" size="65" />
	<hr />
	</div>
	<div class="urun-aciklama">
	İçerik açıklaması: <br/>
	  <label for="urun_aciklama"></label>
	  <textarea name="icerik_aciklama" id="icerik_aciklama" class="ckeditor" cols="70" rows="20"><?php echo $icerik_aciklama; ?></textarea>
	</div>
	
	<input type="submit" value="Güncelle" />	
</center>
	</div>
</form>
</div>
<div style="clear:both;"></div>
<?php ob_end_flush(); ?>