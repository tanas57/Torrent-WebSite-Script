<?php ob_start(); ?>
<?php
	$gelen_id = $_GET["id"];
	$iletisim_sql	=	mysql_query("select * from iletisim where id='$gelen_id'");
	$iletisim_cek	=	mysql_fetch_array($iletisim_sql);
				
				$ad			=	$iletisim_cek["ad"];
				$soyad		=	$iletisim_cek["soyad"];
				$telefon	=	$iletisim_cek["telefon"];
				$mail		=	$iletisim_cek["email"];
				$mesaj		=	$iletisim_cek["mesaj"];
				$advesoyad	=	$ad.' '.$soyad;
	mysql_query("update iletisim set durum='1' where id='$gelen_id'"); //okundu
?>
<div class="yanyana">
<h3 class="anabaslik"> İletişim Oku </h3>

<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat-auto">
    <div class="bebek-ozellikler">
    
	<div class="urun-baslik">
	Ad ve Soyad:
	<input name="adsoyad" type="text" size="25" value="<?php echo $advesoyad; ?>" />
	</div>
	
	<div class="urun-baslik">
	Telefon:&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="pozisyon" type="text" size="25" value="<?php echo $telefon; ?>" />
	</div>
	
	<div class="urun-baslik">
	E-Mail:&nbsp;&nbsp;
	<input name="mail" type="text" size="25" value="<?php echo $mail; ?>" />
	</div>
	<div class="urun-aciklama">
	Mesaj:
	  <label for="ozgecmis"></label>
	  <textarea name="ozgecmis" id="ozgecmis" cols="52" rows="4"><?php echo $mesaj; ?></textarea>
	</div>	
    <br />
	<center>
	<a href="mailto:<?php echo $mail; ?>"> CEVAPLA </a>
	</center>
	</div>
	</div>
</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>