<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"> Yeni Ürün Ekle </h3>
<?php
	if ($_POST == true)
	{
		$urun_baslik 		=	$_POST["urun_baslik"];
		$urun_fiyat			=	$_POST["urun_fiyat"];
		$urun_resim			=	$_FILES["urun_resim"]["name"];
		$urun_aciklama		=	$_POST["urun_aciklama"];
			if ($urun_resim == true)
			{
				$yol = "../yuklenenler/";
				$kaynak 	= 	$_FILES["urun_resim"]["tmp_name"];
				$uzanti		=	substr($_FILES["urun_resim"]["name"],-4,4);
				$dosya_adi	=	md5($urun_resim).rand(0,999999).$uzanti;
				$gonder	= move_uploaded_file($kaynak,$yol.$dosya_adi);
					if ($gonder == true)
					{
						$urun_resim	= "http://".$_SERVER['HTTP_HOST']."/yuklenenler/$dosya_adi";
						$urun_ekle = mysql_query("insert into urunler values ('','$urun_baslik','$urun_fiyat','$urun_resim','$urun_aciklama')");
							if ($urun_ekle == true )
							{
								echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Ürün Başarı İle Eklendi!</span></div>";
							}
							else
							{
								echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata ürün eklenemedi!</span></div>";
							}
					}
					else
					{
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Resim yüklenemedi!</span></div>";
					}
			}
			else
			{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Resim seçilmedi!</span></div>";
			}
	}
?><form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat">
	<div class="urun-resim">	
	<img src="../images/resim_yok.png" width="100" height="100" />
	<div class="resmi-degistir">
	<input name="urun_resim" id="urun_resim" type="file" size="1" maxlength="0" />
	</div>
	</div>
    <div class="urun-ozellikler">
    
	<div class="urun-baslik">
	Ürün başlığı:
	<input name="urun_baslik" type="text" value="" size="25" maxlength="50" />
	</div>
	<div class="urun-aciklama">
	Ürün açıklaması: 
	  <label for="urun_aciklama"></label>
	  <textarea name="urun_aciklama" id="urun_aciklama" cols="53" rows="4" maxlength="350"></textarea>
	</div>
	<div class="urun-aciklama">
	<br />
	Ürün fiyatı: 
	  <label for="urun_fiyat"></label>
	  <input name="urun_fiyat" id="urun_fiyat" value="" size="10" maxlength="8">
	</div>
	
	<input type="submit" value="Ürünü Ekle" />	
    
	</div>
	</div>
</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>