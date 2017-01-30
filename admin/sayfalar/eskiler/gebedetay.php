<?php ob_start(); ?>
<?php
	$gelen_id = $_GET["id"];
	$gebe_sql	=	mysql_query("select * from gebebildirimleri where id='$gelen_id'");
	$gebe_cek	=	mysql_fetch_array($gebe_sql);
				
				$gebe_id		=	$gebe_cek["id"];
				$hastaAdSoyad	=	$gebe_cek["hastaAdSoyad"];
				$tel			=	$gebe_cek["tel"];
				$adres			=	$gebe_cek["adres"];
?>
<div class="yanyana">
<h3 class="anabaslik"> Bebek Bildirim Detayları </h3>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat" style="padding-left:10px; padding-top:10px;">
    <center>
	<div class="urun-baslik">
	Hasta Adı ve Soyadı:&nbsp;
	<input name="urun_baslik" type="text" value="<?php echo $hastaAdSoyad; ?>" size="20" />
	</div>
	
	<div class="urun-baslik">
	Telefon:
	<input name="urun_baslik" type="text" value="<?php echo $tel; ?>" size="20" />
	</div>
	
	<div class="urun-aciklama">
	Adres:<br/>
	<textarea name="urun_aciklama" id="urun_aciklama" cols="30" rows="4"><?php echo $adres; ?></textarea>
	</div>
	</center>
	</div>
</form>
</div>
<div style="clear:both;"></div>
<?php ob_end_flush(); ?>