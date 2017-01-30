<?php ob_start(); ?>
<div class="yanyana">

<?php
if(@$_SESSION["seo"] != ""){
	if(@$_SESSION["tur"] != "oyunEkle") {
	echo '<script Language="JavaScript"> Alert("Bu sayfa program ekleme sayfası; siz önceki işlemi tamamlamadınız. Oraya yönlendiriliyorsunuz. Eğer işlem iptal olacaksa çıkış yapıp tekrar girin.");</script>';
	// yönlendir
	}
}

	if($_POST == TRUE){
		$adim = $_GET["a"];
		$seo  = @$_SESSION["seo"];
		switch($adim){
		
			case 1:
			BaglantiAc();
			$adi 		= ucwords(mysql_real_escape_string($_POST["adi"]));
			$yili		= mysql_real_escape_string($_POST["yili"]);
			$aciklama 	= mysql_real_escape_string($_POST["aciklama"]);
			$turu		= $_POST["turu"];
			$seo 		= seolink($adi).'-full-indir';
			@$_SESSION["seo"] = $seo;
			@$_SESSION["tur"] = "oyunEkle";
			$say = mysql_num_rows(mysql_query("select id from oyunlar where seo='$seo'"));
			if($say < 1){
				$ekle = mysql_query("insert into oyunlar(adi,aciklama,turu,seo,yili) values('$adi','$aciklama','$turu','$seo','$yili')");
				if($ekle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Oyun Eklendi. Adım 2ye geç!</span></div>";
				else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Oyun eklenemedi .".mysql_error()."</span></div>";
			}
			else{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Oyun daha önc eklenmiş.</span></div>";
			}
			
			BaglantiKapat();
			break;
			
			case 2:
			// içerik güncelle :)
			BaglantiAc();
			$icerik		= mysql_real_escape_string($_POST["icerik"]);
			$guncelle 			= mysql_query("update oyunlar set icerik='$icerik' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Oyun Güncellendi. Adım 3ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Oyun güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			
			break;
			
			case 3:
			$surum		= $_POST["surum"];
			$platform	= $_POST["platform"];
			$boyut  	= strtoupper($_POST["boyut"]);
			$tanitim	= $_POST["tanitim"];
			
			BaglantiAc();
			$guncelle = mysql_query("update oyunlar set surum='$surum',platform='$platform',boyut='$boyut',tanitim='$tanitim' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Oyun Güncellendi. Adım 4ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Oyun güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 4:
			$link1	= $_POST["link1"];
			$link2	= $_POST["link2"];
			
			BaglantiAc();
			$guncelle = mysql_query("update oyunlar set link1='$link1',link2='$link2' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Oyun Güncellendi. Adım 5ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Oyun güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 5:
			$dizin1 = '../files/images/game/covers/';
			$dizin2 = '../files/images/game/images/';
			
			$dosya	=	$dizin1.$seo.'-kapak.jpg';
			move_uploaded_file($_FILES["kapak"]["tmp_name"], $dosya);
			
			$dosya_sayi=count($_FILES['resim']['name']); 
				for($i=0;$i<$dosya_sayi;$i++){ 
					if(!empty($_FILES['resim']['name'][$i])){
					$dosya	=	$dizin2.$seo.'-'.($i+1).'.jpg';
					 move_uploaded_file($_FILES['resim']['tmp_name'][($i)],$dosya);
					} 
				}
			
			echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Oyun Güncellendi. Adım 6ya geç!</span></div>";
			break;
			
			case 6:
			BaglantiAc();
			$eklenme  = date("Y-m-d H:i:s");
			
			$guncelle = mysql_query("update oyunlar set eklenme='$eklenme',durum='1' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Oyun ekleme işlemi başarılı :)</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Oyun eklenemedi .".mysql_error()."</span></div>";
			// session bitir
			unset($_SESSION['seo']);
			BaglantiKapat();
			break;
		}
	}
BaglantiAc();
$seo = @$_SESSION["seo"];
$goster_sql = mysql_query("select * from oyunlar where seo='$seo'");
$ceks = mysql_fetch_array($goster_sql);
	$adi		= $ceks["adi"];
	$aciklama	= $ceks["aciklama"];
	$icerik		= $ceks["icerik"];
	$turu		= $ceks["turu"];
	$surum		= $ceks["surum"];
	$platform	= $ceks["platform"];
	$boyut		= $ceks["boyut"];
	$yili		= $ceks["yili"];
	$tanitim	= $ceks["tanitim"];
	$link1		= $ceks["link1"];
	$link2		= $ceks["link2"];

BaglantiKapat();
?>

<h3 class="anabaslik"> Oyun Ekle </h3>
<ul>
	<li><a href="yonetim.php?s=oyunEkle&a=1&seo=<?php echo @$_SESSION["seo"];?>">Adım 1</a></li>
	<li><a href="yonetim.php?s=oyunEkle&a=2&seo=<?php echo @$_SESSION["seo"];?>">Adım 2</a></li>
	<li><a href="yonetim.php?s=oyunEkle&a=3&seo=<?php echo @$_SESSION["seo"];?>">Adım 3</a></li>
	<li><a href="yonetim.php?s=oyunEkle&a=4&seo=<?php echo @$_SESSION["seo"];?>">Adım 4</a></li>
	<li><a href="yonetim.php?s=oyunEkle&a=5&seo=<?php echo @$_SESSION["seo"];?>">Adım 5</a></li>
	<li><a href="yonetim.php?s=oyunEkle&a=6&seo=<?php echo @$_SESSION["seo"];?>">Adım 6</a></li>
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
		<h4>Oyun Adı : </h4>
		<input name="adi" type="text" value="<?php echo @$adi; ?>" size="25" maxlength="200" />
		</div>
		
		<div class="urun-baslik">
		<h4>Oyun Yılı : </h4>
		<select name="yili" style="width:200px; height:25PX;">
					<?php
					$yil = 2016;
					for($i=1;$i<=90;$i++){
						if($yil == @$yili) echo '<option value="'.$yil.'" selected>'.$yil.'</option>';
						else echo '<option value="'.$yil.'">'.$yil.'</option>';
					$yil=$yil-1;
					}
					?>
		</select>
		</div>
		
		<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Oyunu Ekle" />	
	</div>

	<div style="width:200px; float:left;">
		<div class="urun-baslik">
		OYUN TÜRÜ <BR/>
		<select name="turu" style="width:200px; height:25PX;">
		<?php
		BaglantiAc();
		if($turu != ""){
		$sql2 = mysql_query("select * from oyun_turleri where id='$turu'");
		$turcek = mysql_fetch_array($sql2);
		echo '<option value="'.$turcek["id"].'" selected>'.$turcek["adi"].'</option>';
		}
		$sql = mysql_query("select * from oyun_turleri order by adi asc");
		while($cek = mysql_fetch_array($sql)){
			echo '
			<option value="'.$cek["id"].'">'.$cek["adi"].'</option>
			';
		}
		BaglantiKapat();
		?>
		</select>
		</div>
		<div class="urun-baslik">
		<h4>Oyun Açıklaması : </h4>
		<input style="height:60px;" name="aciklama" type="text" value="<?php echo @$aciklama; ?>" size="25" maxlength="300" />
		</div>
		
	</div>
			<?php break;
			
			case 2: ?>
			<div class="urun-baslik">
				<h4>Oyun İçeriği : </h4>
				<textarea class="Editor" name="icerik" rows="10" cols="60" ><?php echo @$icerik; ?></textarea>
				<br/>
				<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="İçeriği ekle" />
			</div>
			
			
			<?php break;
			
			case 3: ?>
			
			<div style="width:320px; float:left;">
			<div class="urun-baslik">
				<h4>Oyun Platform : </h4>
				<select name="platform" style="width:200px; height:25PX;">
					<option value="PC Oyunu"<?php if(@$platform == "PC Oyunu") echo "selected";?>>PC Oyunu</option>
					<option value="PS Oyunu"<?php if(@$platform == "PS Oyunu") echo "selected";?>>PS Oyunu</option>
					<option value="PS3 Oyunu"<?php if(@$platform == "PS3 Oyunu") echo "selected";?>>PS3 Oyunu</option>
					<option value="PS4 Oyunu"<?php if(@$platform == "PS4 Oyunu") echo "selected";?>>PS4 Oyunu</option>
					<option value="Xbox Oyunu"<?php if(@$platform == "Xbox Oyunu") echo "selected";?>>Xbox Oyunu</option>
				</select>
			</div>
			<div class="urun-baslik">
				<h4>Oyun Sürüm : </h4>
				<select name="surum" style="width:200px; height:25PX;">
					<?php
					BaglantiAc();
					if($surum != ""){
						$sql2 = mysql_query("select * from surumler where turu='oyun' and adi='$surum'");
						$yaz = mysql_fetch_array($sql2);
						echo '<option value="'.$yaz["adi"].'">'.$yaz["adi"].'</option>';
					}
					$sql = mysql_query("select * from surumler where turu='oyun' order by adi asc");
					while($yaz = mysql_fetch_array($sql)){
						echo '
						<option value="'.$yaz["adi"].'">'.$yaz["adi"].'</option>
						';
					}
					BaglantiKapat();
					?>
				</select>
			</div>
			<div class="urun-baslik">
				<h4>TANITIM YOUTUBE KODU  : </h4>
				<input type="text" name="tanitim" size="20" maxlength="150" value="<?php echo @$tanitim; ?>"/>
			</div>
			
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Oyunu Güncelle" />
			</div>
			<div style="width:200px; float:left;">
			<div class="urun-baslik">
				<h4>BOYUT  : </h4>
				<input type="text" name="boyut" size="20" maxlength="150" value="<?php echo @$boyut; ?>" />
			</div>
			
			</div>
			
			<?php break;
			
			case 4: ?>
			
			<div style="width:300px; float:left;">
			
			<div class="urun-baslik">
					<h4>Link1 (Google Drive) : </h4>
					<input name="link1" type="text" value="<?php echo @$link1; ?>" size="25" maxlength="150" />
				</div>
			
			
			</div>
			<div style="width:300px; float:left;">
			
			<div class="urun-baslik">
					<h4>Link2 (Yandex Disk)  : </h4>
					<input name="link2" type="text" value="<?php echo @$link2; ?>" size="25" maxlength="150" />
				</div>
			
			</div>
				
				<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Linkleri Ekle" />
			<?php break;
			
			case 5: ?>
			
			<div style="width:300px; float:left;">
			<div class="urun-baslik">
					<h4>KAPAK RESMİ : </h4>
					<input type="file" name="kapak" size="70" />
			</div>
			
			</div>
			<div style="width:300px; float:left;">
			<div class="urun-baslik">
					<h4>OYUN RESMLERİ : </h4>
					<input type="file" name="resim[]" size="70" multiple="multiple"/>
			</div>
			
			</div>
			<input type="hidden" name="bok" />
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Resimleri Yükle" />
			<?php break;
			case 6: ?>
			<input type="hidden" name="bok" />
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Oyunu paylaş" />
			<?php break;
		}
?>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>