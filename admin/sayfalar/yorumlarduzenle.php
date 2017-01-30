<?php ob_start(); ?>
<?php
BaglantiAc();
	$gelen_id = $_GET["id"];
	$icerik_sql	=	mysql_query("select * from yorumlar where id='$gelen_id'");
	$icerik_cek	=	mysql_fetch_array($icerik_sql);
				
				$id		=	$icerik_cek["id"];
				$yapan		=	$icerik_cek["yapan"];
				$mail		=	$icerik_cek["mail"];
				$eklenme	=	$icerik_cek["eklenme"];
				$ip	=	$icerik_cek["ip"];
				$icerik	=	$icerik_cek["icerik"];
				$durum	=	$icerik_cek["durum"];
				$turID	=	$icerik_cek["turID"];
				$cevap	=	$icerik_cek["cevap"];
				$user	=	$icerik_cek["user"];
				$tur		=	$icerik_cek["tur"];
				$turID		=	$icerik_cek["turID"];
				
				$link = "";
				$table= "";
				
				if($tur == "diziBolum"){
					$link = "torrent-dizi";
					$table= "dizi_bolumler";
					$sql = mysql_query("select seo from $table where id='$turID'");
					$cek = mysql_fetch_array($sql);
					$SeO = $cek["seo"];
					$linkyaz = "$site_adres/$link/$SeO.html#comments";
				}
				elseif($tur == "film"){
					$link = "torrent-film";
					$table= "filmler";
					$sql = mysql_query("select seo from $table where id='$turID'");
					$cek = mysql_fetch_array($sql);
					$SeO = $cek["seo"];
					$linkyaz = "$site_adres/$link/$SeO.html#comments";
				}
				elseif($tur == "oyun"){
					$link = "torrent-oyun";
					$table= "oyunlar";
					$sql = mysql_query("select seo from $table where id='$turID'");
					$cek = mysql_fetch_array($sql);
					$SeO = $cek["seo"];
					$linkyaz = "$site_adres/$link/$SeO.html#comments";
				}
				elseif($tur == "dizi"){
					$link = "dizi";
					$table= "diziler";
					$sql = mysql_query("select seo from $table where id='$turID'");
					$cek = mysql_fetch_array($sql);
					$SeO = $cek["seo"];
					$linkyaz = "$site_adres/$link/$SeO/#comments";
				}
				elseif($tur == "program"){
					$link = "torrent-program";
					$table= "programlar";
					$sql = mysql_query("select seo from $table where id='$turID'");
					$cek = mysql_fetch_array($sql);
					$SeO = $cek["seo"];
					$linkyaz = "$site_adres/$link/$SeO.html#comments";
				}
				
				
				
BaglantiKapat();
?>
<div class="yanyana">
<h3 class="anabaslik"> Yorum Düzenliyos xD </h3>
<?php
	if ($_POST == true)
	{
		BaglantiAc();
		$secenek = $_POST["sec"];
		if($secenek == "duzen"){
				$yapan		=	$_POST["yapan"];
				$mail		=	$_POST["mail"];
				$eklenme	=	$_POST["eklenme"];
				$ip			=	$_POST["ip"];
				$icerik		=	$_POST["icerik"];
				$durum		=	$_POST["durum"];
				
				$guncelle = mysql_query("update yorumlar set yapan='$yapan',mail='$mail',eklenme='$eklenme',ip='$ip',icerik='$icerik',durum='$durum' where id='$gelen_id'");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi!</span></div>";
		}
		elseif($secenek == "cevap"){
			$cevap = $_POST["cevap_yorum"];
			$eklenme  = date("Y-m-d H:i:s");
			$ip 		= $_SERVER['REMOTE_ADDR'];
			$ekle = mysql_query("insert into yorumlar (yapan,mail,eklenme,ip,icerik,durum,tur,turID,cevap) values('ADMİN','admin@fulltorrentler.com','$eklenme','$ip','$cevap','2','$tur','$turID','$id')");
			if($ekle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Cevap eklendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Cevap eklenemedi!</span></div>";
		}
				
		BaglantiKapat();
	}
?>
<form name="urun" action="" method="post" enctype="multipart/form-data">
	<div class="uzat" style="height:auto; padding:10px;">
	<a href="<?php echo $linkyaz; ?>" target="_blank">İÇERİK LİNKİ</a>
	<div class="urun-baslik">
	Yorum yapan
	<input name="yapan" type="text" value="<?php echo $yapan; ?>" size="65" />
	</div><br/>
	<div class="urun-baslik">
	Mail
	<input name="mail" type="text" value="<?php echo $mail; ?>" size="65" />
	</div><br/>
	<div class="urun-baslik">
	Tarihi
	<input name="eklenme" type="text" value="<?php echo $eklenme; ?>" size="65" />
	</div><br/>
	<div class="urun-baslik">
	İP'i:
	<input name="ip" type="text" value="<?php echo $ip; ?>" size="65" />
	</div><br/>
	<div class="urun-baslik">
	İçerik
	<textarea name="icerik" cols="77" rows="3"><?php echo $icerik; ?></textarea>
	</div><br/>
	<div class="urun-baslik">
	DURUM
	<select name="durum" style="width:200px; height:45px;">
				<option value="1" <?php if($durum == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($durum == 0) echo "selected"; ?>> Pasif </option>
	</select>
	</div><br/>
	<input type="submit" value="Güncelle" />	<br/><br/>
</center>

	</div>
	<input type="hidden" name="sec" value="duzen" />
</form>
<br />
<hr />
<form action="" method="post">
<input type="hidden" name="sec" value="cevap" />
<strong> Cevap Yorumu Yaz </strong><h6 style="margin:0px; font-weight:normal;">Yorumu yazıp onaylayın, otomatik eklenecektir.</h6> <br/>
<div class="urun-baslik">
	<textarea name="cevap_yorum" cols="77" rows="3"></textarea>
	<br/>
	<input type="submit" value="Cevap EKLE" />
</div>
</form>
</div>
<div style="clear:both;"></div>
<?php ob_end_flush(); ?>