<?php ob_start(); ?>
<?php
	$gelen_id = $_GET["id"];
	$bebek_sql	=	mysql_query("select * from bebekbildirimleri where id='$gelen_id'");
	$bebek_cek	=	mysql_fetch_array($bebek_sql);
				
				$bebek_id		=	$bebek_cek["id"];
				$anneAdSoyad	=	$bebek_cek["anneAdSoyad"];
				$babaAdSoyad	=	$bebek_cek["babaAdSoyad"];
				$tarih			=	$bebek_cek["tarih"];
				$tel			=	$bebek_cek["tel"];
				$adres			=	$bebek_cek["adres"];
?>
<div class="yanyana">
<h3 class="anabaslik"> Bebek Bildirim Detayları </h3>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat" style="padding-left:10px; padding-top:10px;">
    <center>
	<div class="urun-baslik">
	Anne Adı ve Soyadı:&nbsp;
	<input name="urun_baslik" type="text" value="<?php echo $anneAdSoyad; ?>" size="20" />
	</div>
	
	<div class="urun-baslik">
	Baba Adı ve Soyadı:&nbsp;&nbsp;
	<input name="urun_baslik" type="text" value="<?php echo $babaAdSoyad; ?>" size="20" />
	</div>
	
	<div class="urun-baslik">
	Bebek Doğum Tarihi:
	<input name="urun_baslik" type="text" value="<?php echo $tarih; ?>" size="20" />
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