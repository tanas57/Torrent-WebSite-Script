<?php ob_start(); ?>
<div class="yanyana">

<?php
$seos  = $_GET["id"];
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
			$say = mysql_num_rows(mysql_query("select id from diziler where seo='$seo' and id!='$seos'"));
			if($say < 1){
				$ekle = mysql_query("update diziler set adi='$adi',aciklama='$aciklama',turu=\"$turu1\",seo='$seo' where id='$seos'");
				if($ekle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Güncellendi. Adım 2ye geç!</span></div>";
				else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi eklenemedi .".mysql_error()."</span></div>";
			}
			else{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi daha önce eklenmiş</span></div>";
			}
			
			BaglantiKapat();
			break;
			
			case 2:
			// içerik güncelle :)
			BaglantiAc();
			$icerik		= mysql_real_escape_string($_POST["icerik"]);
			$guncelle 			= mysql_query("update diziler set icerik='$icerik' where id='$seos'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi içeriği güncellendi. Adım 3ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 3:
			$imdb		= $_POST["imdb"];
			$fragman	= $_POST["fragman"];
			
			BaglantiAc();
			$guncelle = mysql_query("update diziler set imdb='$imdb',fragman='$fragman' where id='$seos'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi Güncellendi. Adım 4ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 4:
			$seo = @$_SESSION["seoDuzen2"];
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
			$durum	  = $_POST["durum"];
			$guncelle = mysql_query("update diziler set eklenme='$eklenme',durum='$durum' where id='$seos'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi ekleme işlemi başarılı :)</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi eklenemedi .".mysql_error()."</span></div>";
			// session bitir
			unset($_SESSION['seoDuzen2']);
			BaglantiKapat();
			break;
		}
	}
if($seos != ""){
	BaglantiAc();
	$sqls 		= mysql_query("select * from diziler where id='$seos'");
	$ceks 		= mysql_fetch_array($sqls);
	$adi		= $ceks["adi"];
	@$_SESSION["seoDuzen2"]		= $ceks["seo"];
	$aciklama	= $ceks["aciklama"];
	$icerik		= $ceks["icerik"];
	$turu		= $ceks["turu"];
	$imdb		= $ceks["imdb"];
	$fragman	= $ceks["fragman"];
	$durum		= $ceks["durum"];
	BaglantiKapat();
}
?>

<h3 class="anabaslik"> Dizi Ekle </h3>
<ul>
	<li><a href="yonetim.php?s=diziDuzenle&a=1&id=<?php echo $seos;?>">Adım 1</a></li>
	<li><a href="yonetim.php?s=diziDuzenle&a=2&id=<?php echo $seos;?>">Adım 2</a></li>
	<li><a href="yonetim.php?s=diziDuzenle&a=3&id=<?php echo $seos;?>">Adım 3</a></li>
	<li><a href="yonetim.php?s=diziDuzenle&a=4&id=<?php echo $seos;?>">Adım 4</a></li>
	<li><a href="yonetim.php?s=diziDuzenle&a=5&id=<?php echo $seos;?>">Adım 5</a></li>
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
		
		<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Diziyi Güncelle" />	
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
				<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="İçeriği güncelle" />
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
			<select name="durum" style="width:200px; height:45px;">
				<option value="1" <?php if($durum == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($durum == 0) echo "selected"; ?>> Pasif </option>
			</select>
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Güncelle" />
			<?php break;
		}
?>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>