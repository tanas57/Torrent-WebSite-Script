<?php ob_start(); ?>
<div class="yanyana">

<?php
if(@$_SESSION["seo"] != ""){
	if(@$_SESSION["tur"] != "diziBolumEkle") {
	echo '<script Language="JavaScript"> Alert("Bu sayfa program ekleme sayfası; siz önceki işlemi tamamlamadınız. Oraya yönlendiriliyorsunuz. Eğer işlem iptal olacaksa çıkış yapıp tekrar girin.");</script>';
	// yönlendir
	}
}

	if($_POST == TRUE){
$adim = $_GET["a"];
$seo  = $_SESSION["seo"];		

		switch($adim){
		
			case 1:
			BaglantiAc();
			$dizi_id	= $_POST["dizi_id"];
			$dizi_ad_cek= mysql_fetch_array(mysql_query("select adi from diziler where id='$dizi_id'"));
			$dizi_ad	= $dizi_ad_cek["adi"];
			$aciklama 	= mysql_real_escape_string($_POST["aciklama"]);
			$sezon		= $_POST["sezon"];
			$bolum		= $_POST["bolum"];
			$kalite 	= $_POST["kalite"];
			$kaliteYaz	= strtolower(FilmKalite($kalite));
			if($sezon == 0){
				$seo 	= seolink($dizi_ad).'-boxset-tum-sezonlar-bolumler-'.$kaliteYaz.'-indir';
				$adi	= $dizi_ad.' Tüm Sezon & Bölümler - Boxset';
			}
			else{
				if($bolum != 0){
				$seo 	= seolink($dizi_ad).'-sezon-'.$sezon.'-bolum-'.$bolum.'-'.$kaliteYaz.'-indir';
				$adi	= $dizi_ad.' '.$sezon.'. Sezon '.$bolum.'. Bölüm';
				}
				else{
				$seo 	= seolink($dizi_ad).'-sezon-'.$sezon.'-tum-bolumler-'.$kaliteYaz.'-indir';
				$adi	= $dizi_ad.' '.$sezon.'. Sezon Tüm Bölümler';	
				}
			}
			
			$_SESSION["seo"] = $seo;
			$_SESSION["tur"] = "diziBolumEkle";
			$say = mysql_num_rows(mysql_query("select id from dizi_bolumler where seo='$seo'"));
			if($say < 1){
				$ekle = mysql_query("insert into dizi_bolumler(adi,aciklama,kalite,seo,sezon,bolum,dizi_id) values('$adi','$aciklama','$kalite','$seo','$sezon','$bolum','$dizi_id')");
				if($ekle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Bölüm Eklendi. Adım 2ye geç!</span></div>";
				else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi Bölüm eklenemedi .".mysql_error()."</span></div>";
			}
			else{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi Bölüm daha önce eklenmiş.</span></div>";
			}
			
			BaglantiKapat();
			break;
			
			case 2:
			// içerik güncelle :)
			BaglantiAc();
			$icerik		= mysql_real_escape_string($_POST["icerik"]);
			$guncelle 			= mysql_query("update dizi_bolumler set icerik='$icerik' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Bölüm Güncellendi. Adım 3ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi Bölüm güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 3:
			$surum		= $_POST["surum"];
			$surum1		= "";
			$Q=0;
			foreach ($surum as $key ) {if($Q==0){$surum1 = $key;}else{$surum1 = $surum1.' '.$key;}$Q++;}
			$surum1 	= rtrim($surum1," ");
			$boyut  	= strtoupper($_POST["boyut"]);
			$fragman	= $_POST["fragman"];
			
			BaglantiAc();
			$guncelle = mysql_query("update dizi_bolumler set surum='$surum1',boyut='$boyut',fragman='$fragman' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Bölüm Güncellendi. Adım 4ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi Bölüm güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 4:
			$link1	= $_POST["link1"];
			$link2	= $_POST["link2"];
			#$altyazi1= $_POST["altyazi1"];
			#$altyazi2= $_POST["altyazi2"];
			BaglantiAc();
			$guncelle = mysql_query("update dizi_bolumler set link1='$link1',link2='$link2' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Bölüm Güncellendi. Adım 5ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi Bölüm güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 5:
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
			
			echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Bölüm Güncellendi. Adım 6ya geç!</span></div>";
			break;
			
			case 6:
			BaglantiAc();
			$eklenme  = date("Y-m-d H:i:s");
			
			$guncelle = mysql_query("update dizi_bolumler set eklenme='$eklenme',durum='1' where seo='$seo'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Bölüm ekleme işlemi başarılı :)</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi Bölüm eklenemedi .".mysql_error()."</span></div>";
			// session bitir
			unset($_SESSION['seo']);
			BaglantiKapat();
			break;
		}
	}
if(@$_SESSION["seo"] != ""){
	$seo = $_SESSION["seo"];
	BaglantiAc();
	$sql = mysql_query("select * from dizi_bolumler where seo='$seo'");
	$cek = mysql_fetch_array($sql);
	$adi		=	$cek["adi"];
	$dizi_id	=	$cek["dizi_id"];
	$sezon		=	$cek["sezon"];
	$bolum		=	$cek["bolum"];
	$aciklama	=	$cek["aciklama"];
	$icerik		=	$cek["icerik"];
	$surum		=	$cek["surum"];
	$kalite		=	$cek["kalite"];
	$boyut		=	$cek["boyut"];
	$link1		=	$cek["link1"];
	$link2		=	$cek["link2"];
	$fragman	=	$cek["fragman"];
	BaglantiKapat();
}
?>

<h3 class="anabaslik"> Dizi Bölümü Ekle </h3>
<ul>
	<li><a href="yonetim.php?s=diziBolumEkle&a=1&seo=<?php echo @$_SESSION["seo"];?>">Adım 1</a></li>
	<li><a href="yonetim.php?s=diziBolumEkle&a=2&seo=<?php echo @$_SESSION["seo"];?>">Adım 2</a></li>
	<li><a href="yonetim.php?s=diziBolumEkle&a=3&seo=<?php echo @$_SESSION["seo"];?>">Adım 3</a></li>
	<li><a href="yonetim.php?s=diziBolumEkle&a=4&seo=<?php echo @$_SESSION["seo"];?>">Adım 4</a></li>
	<li><a href="yonetim.php?s=diziBolumEkle&a=5&seo=<?php echo @$_SESSION["seo"];?>">Adım 5</a></li>
	<li><a href="yonetim.php?s=diziBolumEkle&a=6&seo=<?php echo @$_SESSION["seo"];?>">Adım 6</a></li>
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
		<h4>Dizi Seç : </h4>
		<select name="dizi_id" style="width:270px; height:25px;">
			<?php
			BaglantiAc();
			$sql = mysql_query("select id,adi from diziler order by adi asc");
			while($cek = mysql_fetch_array($sql)){
				if(@$dizi_id != ""){
					if($dizi_id == $cek["id"]){
						echo '<option value="'.$cek["id"].'" selected>'.$cek["adi"].'</option>';
					}
					else
					echo '<option value="'.$cek["id"].'">'.$cek["adi"].'</option>';
				}
				else{
				echo '<option value="'.$cek["id"].'">'.$cek["adi"].'</option>';
				}
				
			}
			BaglantiKapat();
			?>
		</select>
		</div>
		<div style="width:150px; float:left;">
			<div class="urun-baslik">
				<h4>Sezon : </h4>
				<select name="sezon" style="height:25px;">
					<?php
					for($i=1; $i<16; $i++){
						if(@$sezon != ""){
							if($sezon == $i){
								echo '<option value="'.$i.'" selected>'.$i.'.Sezon</option>';
							}
							else{
								echo '<option value="'.$i.'">'.$i.'.Sezon</option>';
							}
						}
						else echo '<option value="'.$i.'">'.$i.'.Sezon</option>';
					}
					?>
					<?php if(@$sezon != ""){
							if($sezon == 0){
								echo '<option value="0" selected>BoxSet</option>';
							}
							else{
								echo '<option value="0">BoxSet</option>';
							}
					}
					else{
						echo '<option value="0">BoxSet</option>';
					}
					?>
				</select>
		</div>
		</div>
		<div style="width:150px; float:left;">
			<div class="urun-baslik">
				<h4>Bölüm : </h4>
				<select name="bolum" style="height:25px;">
					<?php
					for($i=1; $i<30; $i++){
						if(@$bolum != ""){
							if($bolum == $i){
								echo '<option value="'.$i.'" selected>'.$i.'.Bölüm</option>';
							}
							else{
								echo '<option value="'.$i.'">'.$i.'.Bölüm</option>';
							}
						}
						else echo '<option value="'.$i.'">'.$i.'.Bölüm</option>';
					}
					?>
					<?php if(@$bolum != ""){
							if($bolum == 0){
								echo '<option value="0" selected>Tüm Bölümler</option>';
							}
							else{
								echo '<option value="0">Tüm Bölümler</option>';
							}
					}
					else{
						echo '<option value="0">Tüm Bölümler</option>';
					}
					?>
					
				</select>
		</div>
		</div>
		<br/>
		
		
		<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Diziyi Ekle" />	
	</div>

	<div style="width:200px; float:left;">
		<div class="urun-baslik">
		<h4>Dizi Açıklaması : </h4>
		<input style="height:60px;" name="aciklama" type="text" value="<?php echo @$aciklama; ?>" size="25" maxlength="300" />
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
				<h4>Dizi Bölüm İçeriği : </h4>
				<textarea class="Editor" name="icerik" rows="10" cols="60" ><?php echo @$icerik; ?></textarea>
				<br/>
				<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="İçeriği ekle" />
			</div>
			
			
			<?php break;
			
			case 3: ?>
			
			<div style="width:400px; float:left;">
			<div class="urun-baslik">
				<h4>Dizi Bölüm Boyutu : </h4>
				<input type="text" name="boyut" size="20" maxlength="150" value="<?php echo @$boyut; ?>" /> 
			</div>
			<div class="urun-baslik">
				<h4>FRAGMAN YOUTUBE KODU  : </h4>
				<input type="text" name="fragman" size="20" maxlength="150" value="<?php echo @$fragman; ?>" />
			</div>
			
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Bölümü Güncelle" />
			</div>
			<div style="width:200px; float:left;">
			<div class="urun-baslik">
				<h4>Dizi Bölüm Sürüm : </h4>
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
					<div class="urun-baslik">
					<h4>Link2 (Yandex Disk)  : </h4>
					<input name="link2" type="text" value="<?php echo @$link2; ?>" size="25" maxlength="150" />
				</div>
			
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
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Bölümü paylaş" />
			<?php break;
		}
?>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>