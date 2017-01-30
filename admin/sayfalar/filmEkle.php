<?php ob_start(); ?>
<div class="yanyana">

<?php
$seos = @$_SESSION["seo"];
if(@$_SESSION["seo"] != ""){
	if(@$_SESSION["tur"] != "filmEkle") {
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
			$adi 		= mysql_real_escape_string(ucwords($_POST["adi"]));
			$yili		= mysql_real_escape_string($_POST["yili"]);
			$aciklama 	= mysql_real_escape_string($_POST["aciklama"]);
			$turu		= $_POST["turu"];
			$turu1		= "";
			$Q=0;
			foreach ($turu as $key ) {if($Q==0){$turu1 = '\''.$key.'\'';}else{$turu1 = $turu1.','.'\''.$key.'\'';} $Q++;}
			$turu1 = rtrim($turu1,",");
			$kalite = $_POST["kalite"];
			$seo 	= seolink($adi).'-'.strtolower(FilmKalite($kalite)).'-indir';
			$_SESSION["seo"] = $seo;
			$_SESSION["tur"] = "filmEkle";
			$say = mysql_num_rows(mysql_query("select id from filmler where seo='$seo'"));
			if($say < 1){
				$ekle = mysql_query("insert into filmler(adi,aciklama,turu,kalite,seo,yili) values('$adi','$aciklama',\"$turu1\",'$kalite','$seo','$yili')");
				if($ekle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film Eklendi. Adım 2ye geç!</span></div>";
				else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Film eklenemedi .".mysql_error()."</span></div>";
			}
			else{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Film daha önc eklenmiş.</span></div>";
			}
			
			BaglantiKapat();
			break;
			
			case 2:
			// içerik güncelle :)
			BaglantiAc();
			$icerik		= mysql_real_escape_string($_POST["icerik"]);
			$guncelle 			= mysql_query("update filmler set icerik='$icerik' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film Güncellendi. Adım 3ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Film güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 3:
			$surum		= $_POST["surum"];
			$surum1		= "";
			$Q=0;
			foreach ($surum as $key ) {if($Q==0){$surum1 = $key;}else{$surum1 = $surum1.' '.$key;}$Q++;}
			$surum1 	= rtrim($surum1," ");
			$imdb		= $_POST["imdb"];
			$boyut  	= strtoupper($_POST["boyut"]);
			$fragman	= $_POST["fragman"];
			$seri 		= $_POST["seriEkle"];
			$seriId		= 0;
			if($seri == "1"){
				BaglantiAc();
				$add = mysql_real_escape_string($_POST["seriAdi"]);
				$seoo= seolink($add);
				mysql_query("insert into film_seri (adi,seo) values('$add','$seoo')");
				$seriId = mysql_insert_id();
				BaglantiKapat();
			}
			else{
				$seriId = $_POST["seri"];
			}
			BaglantiAc();
			$guncelle = mysql_query("update filmler set surum='$surum1',imdb='$imdb',boyut='$boyut',fragman='$fragman',seriMi='$seriId' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film Güncellendi. Adım 4ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Film güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 4:
			$link1	= $_POST["link1"];
			$link2	= $_POST["link2"];
			$altyazi1= $_POST["altyazi1"];
			$altyazi2= $_POST["altyazi2"];
			BaglantiAc();
			$guncelle = mysql_query("update filmler set link1='$link1',link2='$link2',altyazi1='$altyazi1',altyazi2='$altyazi2' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film Güncellendi. Adım 5ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Film güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 5:
			$dizin1 = '../files/images/film/covers/';
			$dizin2 = '../files/images/film/images/';
			
			$dosya	=	$dizin1.$seo.'-kapak.jpg';
			move_uploaded_file($_FILES["kapak"]["tmp_name"], $dosya);
			
			$dosya_sayi=count($_FILES['resim']['name']); 
				for($i=0;$i<$dosya_sayi;$i++){ 
					if(!empty($_FILES['resim']['name'][$i])){
					$dosya	=	$dizin2.$seo.'-'.($i+1).'.jpg';
					 move_uploaded_file($_FILES['resim']['tmp_name'][($i)],$dosya);
					} 
				}
			
			echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film Güncellendi. Adım 6ya geç!</span></div>";
			break;
			
			case 6:
			BaglantiAc();
			$eklenme  = date("Y-m-d H:i:s");
			
			$guncelle = mysql_query("update filmler set eklenme='$eklenme',durum='1' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film ekleme işlemi başarılı :)</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Film eklenemedi .".mysql_error()."</span></div>";
			// session bitir
			unset($_SESSION['seo']);
			BaglantiKapat();
			break;
		}
	}

	
if($seos != ""){
	BaglantiAc();
	$sqls 		= mysql_query("select * from filmler where seo='$seos'");
	$ceks 		= mysql_fetch_array($sqls);
	$adi		= $ceks["adi"];
	$yili		= $ceks["yili"];
	$aciklama	= $ceks["aciklama"];
	$kalite		= $ceks["kalite"];
	$icerik		= $ceks["icerik"];
	$turu		= $ceks["turu"];
	$surum		= $ceks["surum"];
	$imdb		= $ceks["imdb"];
	$boyut		= $ceks["boyut"];
	$link1		= $ceks["link1"];
	$link2		= $ceks["link2"];
	$fragman	= $ceks["fragman"];
	$seriMi		= $ceks["seriMi"];
	$altyazi1	= $ceks["altyazi2"];
	$altyazi2	= $ceks["altyazi2"];
	BaglantiKapat();
}
?>

<h3 class="anabaslik"> Film Ekle </h3>
<ul>
	<li><a href="yonetim.php?s=filmEkle&a=1&seo=<?php echo @$_SESSION["seo"];?>">Adım 1</a></li>
	<li><a href="yonetim.php?s=filmEkle&a=2&seo=<?php echo @$_SESSION["seo"];?>">Adım 2</a></li>
	<li><a href="yonetim.php?s=filmEkle&a=3&seo=<?php echo @$_SESSION["seo"];?>">Adım 3</a></li>
	<li><a href="yonetim.php?s=filmEkle&a=4&seo=<?php echo @$_SESSION["seo"];?>">Adım 4</a></li>
	<li><a href="yonetim.php?s=filmEkle&a=5&seo=<?php echo @$_SESSION["seo"];?>">Adım 5</a></li>
	<li><a href="yonetim.php?s=filmEkle&a=6&seo=<?php echo @$_SESSION["seo"];?>">Adım 6</a></li>
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
		<h4>Film Adı : </h4>
		<input name="adi" type="text" value="<?php echo @$adi; ?>" size="25" maxlength="200" />
		</div>
		
		<div class="urun-baslik">
		<h4>Film Yılı : </h4>
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
		
		<div class="urun-baslik">
		<h4>Film Açıklaması : </h4>
		<input style="height:60px;" name="aciklama" type="text" value="<?php echo @$aciklama; ?>" size="25" maxlength="300" />
		</div>
		
		<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Filmi Ekle" />	
	</div>

	<div style="width:200px; float:left;">
		<div class="urun-baslik">
		FİLM TÜRÜ <BR/>
		<select multiple="multiple" name="turu[]" style="width:200px; height:250px;">
		<?php
		BaglantiAc();
		$sql = mysql_query("select * from film_turleri order by adi asc");
		
		if(@$turu != ""){
			$bol = explode(',',$turu);
			for($i=0; $i<count($bol); $i++){
				$iyiceBol = explode('\'',$bol[$i]);
				$sayi = $iyiceBol[1];
				$cek = mysql_fetch_array(mysql_query("select * from film_turleri where id='$sayi' order by adi asc"));
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
		<div class="urun-baslik">
		<h4>Kalite : </h4>
				<select name="kalite" >
					<option value="1" <?php if(@$kalite == 1) echo "selected"; ?>>1080p</option>
					<option value="2"<?php if(@$kalite == 2) echo "selected"; ?>>720p</option>
					<option value="3"<?php if(@$kalite == 3) echo "selected"; ?>>480p</option>
					<option value="4"<?php if(@$kalite == 4) echo "selected"; ?>>360p</option>
					<option value="5"<?php if(@$kalite == 5) echo "selected"; ?>>Bilinmiyor</option>
				</select>
		</div>
		
	</div>
			<?php break;
			
			case 2: ?>
			<div class="urun-baslik">
				<h4>Film İçeriği : </h4>
				<textarea class="Editor" name="icerik" rows="10" cols="60" ><?php echo @$icerik; ?></textarea>
				<br/>
				<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="İçeriği ekle" />
			</div>
			
			
			<?php break;
			
			case 3: ?>
			
			<div style="width:400px; float:left;">
			<div class="urun-baslik">
				<h4>Film İMDB : </h4>
				<input type="text" name="imdb" size="20" maxlength="10" value="<?php echo @$imdb; ?>" /> 
			</div>
			<div class="urun-baslik">
				<h4>Film Boyutu : </h4>
				<input type="text" name="boyut" size="20" maxlength="150" value="<?php echo @$boyut; ?>" /> 
			</div>
			<div class="urun-baslik">
				<h4>FRAGMAN YOUTUBE KODU  : </h4>
				<input type="text" name="fragman" size="20" maxlength="150" value="<?php echo @$fragman; ?>" />
			</div>
			
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Filmi Güncelle" />
			</div>
			<div style="width:200px; float:left;">
			<div class="urun-baslik">
				<h4>Film Sürüm : </h4>
				<select multiple="multiple" name="surum[]" style="width:200px; height:150px;">
					<?php
					BaglantiAc();
					if(@$surum != ""){
						$bol = explode(' ',$surum);
						foreach($bol as $yaz){
							echo '<option value="'.$yaz.'" selected>'.$yaz.'</option>';
						}
						
						}
					
					
					$sql = mysql_query("select * from surumler where turu='film' order by adi asc");
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
				<h4>Film Seri mi? : </h4>
				<div style="width:auto; height:auto; border:1px solid #ccc;">
				<center>FİLM SERİ Mİ ? <input style="width:50px; height:15px;" type="checkbox" name="seriMi" <?php if($seriMi != 0) echo "checked"; ?> onchange="AltGetir();"/> <br /></center>

				<div id="seriKismi">
				 <br /> 
				EKLE <input style="width:50px; height:15px;" type="radio" name="seriEkle" value="1" /><BR/>
				SEÇ <input style="width:50px; height:15px;" type="radio" name="seriEkle" value="2" />
				<br/>Yeni Seri: <input placeholder="Film adını gir" style="width:190px; height:20px;" type="text" name="seriAdi" size="15"/>
				
				
				<br/>
				Seride ara <input placeholder="Kelime gir" style="width:190px; height:20px;" type="text" name="seriAra" onchange="SeriAra();" /> <br/> <br />
				SEÇ <select name="seri">
					<option value="0">Veri gelmedi</option>
				</select>
				</div>
				</div>
			</div>
			
			</div>
			
			<?php break;
			
			case 4: ?>
			
			<div style="width:300px; float:left;">
			
			<div class="urun-baslik">
					<h4>Link1 (Google Drive) : </h4>
					<input name="link1" type="text" size="25" maxlength="150" value="<?php echo @$link1; ?>" />
				</div>
			
				<div class="urun-baslik">
					<h4>Link2 (Yandex Disk)  : </h4>
					<input name="link2" type="text" size="25" maxlength="150" value="<?php echo @$link2; ?>" />
				</div>
			
			</div>
			<div style="width:300px; float:left;">
			
			<div class="urun-baslik">
					<h4>Altyazı 1 (Turkcealtyazi.org)  : </h4>
					<input name="altyazi1" type="text" size="25" maxlength="300" value="<?php echo @$altyazi1; ?>" />
				</div>
				
				<div class="urun-baslik">
					<h4>Altyazı 2 (Altyazi.org) : </h4>
					<input name="altyazi2" type="text" size="25" maxlength="300" value="<?php echo @$altyazi2; ?>" />
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
					<h4>FİLM RESMLERİ : </h4>
					<input type="file" name="resim[]" size="70" multiple="multiple"/>
			</div>
			
			</div>
			<input type="hidden" name="bok" />
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Resimleri Yükle" />
			<?php break;
			case 6: ?>
			<input type="hidden" name="bok" />
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" name="Ekle" type="submit" value="Filmi paylaş" />
			<?php break;
		}
?>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>