<?php ob_start(); ?>

<?php
	$gelen_id = $_GET["id"];
	$yonetici_sql	=	mysql_query("select * from yoneticiler where id='$gelen_id'");
	$yonetici_cek	=	mysql_fetch_array($yonetici_sql);
				
				$yonetici_kullanici	=	$yonetici_cek["yonetici_kullanici"];
				$yonetici_sifre		=	$yonetici_cek["yonetici_sifre"];
				$yonetici_durum		=	$yonetici_cek["yonetici_durum"];
?>
<div class="yanyana">
<h3 class="anabaslik"><?php echo $yonetici_kullanici." - Yöneticisini Düzenle"; ?> </h3>
<?php
	if ($_POST == true)
	{
		$yonetici_kullanici =	$_POST["yonetici_kullanici"];
		$yonetici_sifre		=	md5($_POST["yonetici_sifre"]);
		$yonetici_durum		=	$_POST["yonetici_durum"];	
		if ($yonetici_sifre == "" || $yonetici_sifre == "d41d8cd98f00b204e9800998ecf8427e")
		{			
			$yonetici_guncelle = mysql_query("update yoneticiler set yonetici_kullanici='$yonetici_kullanici', yonetici_durum='$yonetici_durum' where id='$gelen_id'");
			if ($yonetici_guncelle == true)
			{
				echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Yönetici başarıyla güncellendi.</span></div>";
			}
			else
			{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Yönetici güncellenemedi.</span></div>";
			}
		}
		else
		{
			$yonetici_guncelle = mysql_query("update yoneticiler set yonetici_kullanici='$yonetici_kullanici', yonetici_sifre='$yonetici_sifre', yonetici_durum='$yonetici_durum' where id='$gelen_id'");
			if ($yonetici_guncelle == true)
			{
				echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Yönetici başarıyla güncellendi.</span></div>";
			}
			else
			{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Yönetici güncellenemedi.</span></div>";
			}
		}
	}
?>
<?php
	if ($_POST == true)
	{
		$yonetici_kullanici	=	$_POST["yonetici_kullanici"];
		$yonetici_sifre		=	$_POST["yonetici_sifre"];
		$yonetici_durum		=	$_POST["yonetici_durum"];
	}
?>
<form name="yonetici" action="" method="post" enctype="multipart/form-data">
	<div class="uzat">
		<div class="ortala2">
    <div class="orta">Yönetici kullanıcı adı:
      <label for="yonetici_kullanici"></label>
      <input type="text" name="yonetici_kullanici" id="yonetici_kullanici" value="<?php echo $yonetici_kullanici; ?>" /><br />
	</div>
	<div class="orta">
    Yönetici şifre:<br />
	<label for="yonetici_sifre"></label>
	<input type="password" name="yonetici_sifre" id="yonetici_sifre" /><br />
	</div>
    <div class="orta">Yönetici durum:
    <label for="yonetici_durum"></label>
    <select name="yonetici_durum" id="yonetici_durum">
      <?php
	  if ($yonetici_durum == 1 )
	  {
	  echo "<option value=\"1\" selected>Aktif</option>";
	  echo "<option value=\"0\">Pasif</option>";
	  }
	  else
	  {
      echo "<option value=\"1\">Aktif</option>";
	  echo "<option value=\"0\" selected>Pasif</option>";
	  }
	  ?>
    </select><br />
	</div>
    <input name="" type="submit" value="Yöneticiyi Güncelle" />
		</div>
    </div>
</form>
</div>
<div style="clear:both;"></div>
<?php ob_end_flush(); ?>