<?php ob_start(); ?>
<div class="yanyana">

<?php
if(@$_SESSION["seo"] != ""){
	if(@$_SESSION["tur"] != "diziEkle") {
	echo '<script Language="JavaScript"> Alert("Bu sayfa program ekleme sayfası; siz önceki işlemi tamamlamadınız. Oraya yönlendiriliyorsunuz. Eğer işlem iptal olacaksa çıkış yapıp tekrar girin.");</script>';
	// yönlendir
	}
}
$seos  = @$_SESSION["seo"];
	if($_POST == TRUE){
		$adim = $_GET["a"];
		$seo  = @$_SESSION["seo"];
		switch($adim){
		
			case 1:
			BaglantiAc();
			$adi 		= ucwords($_POST["adi"]);
			$aciklama 	= mysql_real_escape_string($_POST["aciklama"]);
			$turu		= $_POST["turu"];
			$turu1	= "";
			$Q=0;
			foreach ($turu as $key ) {if($Q==0){$turu1 = '\''.$key.'\'';}else{$turu1 = $turu1.','.'\''.$key.'\'';} $Q++;}
			$turu1 = rtrim($turu1,",");
			$seo 	= seolink($adi).'-torrent-indir';
			$_SESSION["seo"] = $seo;
			$_SESSION["tur"] = "diziEkle";
			$say = mysql_num_rows(mysql_query("select id from diziler where seo='$seo'"));
			if($say < 1){
				$ekle = mysql_query("insert into diziler(adi,aciklama,turu,seo) values('$adi','$aciklama',\"$turu1\",'$seo')");
				if($ekle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Eklendi. Adım 2ye geç!</span></div>";
				else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi eklenemedi .".mysql_error()."</span></div>";
			}
			else{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi daha önce eklenmiş.</span></div>";
			}
			
			BaglantiKapat();
			break;
			
			case 2:
			// içerik güncelle :)
			BaglantiAc();
			$icerik		= mysql_real_escape_string($_POST["icerik"]);
			$guncelle 			= mysql_query("update diziler set icerik='$icerik' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Güncellendi. Adım 3ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 3:
			$imdb		= $_POST["imdb"];
			$fragman	= $_POST["fragman"];
			
			BaglantiAc();
			$guncelle = mysql_query("update diziler set imdb='$imdb',fragman='$fragman' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Güncellendi. Adım 4ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 4:
			$dizin1 = '../files/images/series/covers/';
			$dizin2 = '../files/images/series/images/';
			
			$dosya	=	$dizin1.$seo.'-kapak.jpg';
			move_uploaded_file($_FILES["kapak"]["tmp_name"], $dosya);
			
			$dosya_sayi=count($_FILES['resim']['name']); 
				for($i=0;$i<$dosya_sayi;$i++){ 
					if(!empty($_FILES['resim']['name'][$i])){
					$dosya	=	$dizin2.$seo.'-'.($i+1).'.jpg';
					 move_uploaded_file($_FILES['resim']['tmp_name'][($i)],$dosya);
					} 
				}
			
			echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Güncellendi. Adım 5ya geç!</span></div>";
			break;
			
			case 5:
			BaglantiAc();
			$eklenme  = date("Y-m-d H:i:s");
			
			$guncelle = mysql_query("update diziler set eklenme='$eklenme',durum='1' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi ekleme işlemi başarılı :)</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi eklenemedi .".mysql_error()."</span></div>";
			// session bitir
			unset($_SESSION['seo']);
			BaglantiKapat();
			break;
		}
	}
if($seos != ""){
	BaglantiAc();
	$sqls 		= mysql_query("select * from diziler where seo='$seos'");
	$ceks 		= mysql_fetch_array($sqls);
	$adi		= $ceks["adi"];
	$aciklama	= $ceks["aciklama"];
	$icerik		= $ceks["icerik"];
	$turu		= $ceks["turu"];
	$imdb		= $ceks["imdb"];
	$fragman	= $ceks["fragman"];
	BaglantiKapat();
}
?>

<h3 class="anabaslik"> Dizi Ekle </h3>
<ul>
	<li><a href="yonetim.php?s=diziEkle&a=1&seo=<?php echo @$_SESSION["seo"];?>">Adım 1</a></li>
	<li><a href="yonetim.php?s=diziEkle&a=2&seo=<?php echo @$_SESSION["seo"];?>">Adım 2</a></li>
	<li><a href="yonetim.php?s=diziEkle&a=3&seo=<?php echo @$_SESSION["seo"];?>">Adım 3</a></li>
	<li><a href="yonetim.php?s=diziEkle&a=4&seo=<?php echo @$_SESSION["seo"];?>">Adım 4</a></li>
	<li><a href="yonetim.php?s=diziEkle&a=5&seo=<?php echo @$_SESSION["seo"];?>">Adım 5</a></li>
</ul>
<hr/>
<h3 class="anabaslik"> Adım <?php echo $_GET["a"];?> </h3>
<form action="" method="post" enctype="multipart/form-data">
<?php
$adim = $_GET["a"];
		switch($adim){
			case 1: ?>
			<div style="width:300px; float:left;">
		<div class="urun-baslik">
		<h4>Dizi Adı : </h4>
		<input name="adi" type="text" value="<?php echo @$adi; ?>" size="25" maxlength="200" />
		</div>
		
		<div class="urun-baslik">
		<h4>Dizi Açıklaması : </h4>
		<input style="height:60px;" name="aciklama" value="<?php echo @$aciklama; ?>" type="text" value="" size="25" maxlength="300" />
		</div>
		
		<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Diziyi Ekle" />	
	</div>

	<div style="width:200px; float:left;">
		<div class="urun-baslik">
		Dizi TÜRÜ <BR/>
		<select multiple="multiple" name="turu[]" style="width:200px; height:250px;">
		<?php
		BaglantiAc();
		$sql = mysql_query("select * from dizi_turleri order by adi asc");
		
		if(@$turu != ""){
			$bol = explode(',',$turu);
			for($i=0; $i<count($bol); $i++){
				$iyiceBol = explode('\'',$bol[$i]);
				$sayi = $iyiceBol[1];
				$cek = mysql_fetch_array(mysql_query("select * from dizi_turleri where id='$sayi' order by adi asc"));
				echo '<option value="'.$cek["id"].'" selected>'.$cek["adi"].'</option>';
			}
		}
		
		while($cek = mysql_fetch_array($sql)){
			echo '
			<option value="'.$cek["id"].'">'.$cek["adi"].'</option>
			';
		}
		BaglantiKapat();
		?>
		</select>
		</div>
		
	</div>
			<?php break;
			
			case 2: ?>
			<div class="urun-baslik">
				<h4>Dizi İçeriği : </h4>
				<textarea class="Editor" name="icerik" rows="10" cols="60" ><?php echo @$icerik; ?></textarea>
				<br/>
				<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="İçeriği ekle" />
			</div>
			
			
			<?php break;
			
			case 3: ?>
			
			<div style="width:300px; float:left;">
			<div class="urun-baslik">
				<h4>Dizi İMDB : </h4>
				<input type="text" name="imdb" size="20" maxlength="10" value="<?php if(@$imdb != 0) echo @$imdb; ?>" /> 
			</div>
			
			
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Diziyi Güncelle" />
			</div>
			<div style="width:200px; float:left;">
			<div class="urun-baslik">
				<h4>FRAGMAN YOUTUBE KODU  : </h4>
				<input type="text" name="fragman" size="20" maxlength="150" value="<?php echo @$fragman; ?>" />
			</div>
			</div>
			<?php break;
			
			case 4: ?>
			
			<div style="width:300px; float:left;">
			<div class="urun-baslik">
					<h4>KAPAK RESMİ : </h4>
					<input type="file" name="kapak" size="70" />
			</div>
			
			</div>
			<div style="width:300px; float:left;">
			<div class="urun-baslik">
					<h4>FİLM RESMLERİ : </h4>
					<input type="file" name="resim[]" size="70" multiple="multiple"/>
			</div>
			
			</div>
			<input type="hidden" name="bok" />
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Resimleri Yükle" />
			<?php break;
			case 5: ?>
			<input type="hidden" name="bok" />
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Diziyi paylaş" />
			<?php break;
		}
?>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>