<?php ob_start(); ?>
<div class="yanyana">

<?php
$id = @$_GET["id"];


	if($_POST == TRUE){
		$adim = $_GET["a"];
		switch($adim){
		
			case 1:
			BaglantiAc();
			$adi 		= ucwords(mysql_real_escape_string($_POST["adi"]));
			$yili		= mysql_real_escape_string($_POST["yili"]);
			$aciklama 	= mysql_real_escape_string($_POST["aciklama"]);
			$turu		= $_POST["turu"];
			$seo 		= seolink($adi).'-full-indir';
			$say = mysql_num_rows(mysql_query("select id from programlar where seo='$seo' and id!='$id'"));
			if($say < 1){
				$ekle = mysql_query("update programlar set adi='$adi',aciklama='$aciklama',turu='$turu',seo='$seo',yili='$yili' where id='$id'");
				if($ekle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Program Güncellendi. Adım 2ye geç!</span></div>";
				else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Program güncellenemedi .".mysql_error()."</span></div>";
			}
			else{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Program daha önce eklenmiş.</span></div>";
			}
			
			BaglantiKapat();
			break;
			
			case 2:
			// içerik güncelle :)
			BaglantiAc();
			$icerik		= mysql_real_escape_string($_POST["icerik"]);
			$guncelle 			= mysql_query("update programlar set icerik='$icerik' where id='$id'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Program Güncellendi. Adım 3ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Program güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			
			break;
			
			case 3:
			$platform	= $_POST["platform"];
			$kullanim	= $_POST["kullanim"];
			$boyut  	= strtoupper($_POST["boyut"]);
			$tanitim	= $_POST["tanitim"];
			
			BaglantiAc();
			$guncelle = mysql_query("update programlar set kullanim='$kullanim',platform='$platform',boyut='$boyut',tanitim='$tanitim' where id='$id'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Program Güncellendi. Adım 4ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Program güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 4:
			$link1	= $_POST["link1"];
			$link2	= $_POST["link2"];
			
			BaglantiAc();
			$guncelle = mysql_query("update programlar set link1='$link1',link2='$link2' where id='$id'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Program Güncellendi. Adım 5ye geç!</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Program güncellenemedi .".mysql_error()."</span></div>";
			BaglantiKapat();
			break;
			
			case 5:
			$dizin1 = '../files/images/program/covers/';
			$dizin2 = '../files/images/program/images/';
			$seo	= $_SESSION["programSeo"];
			
			$dosya	=	$dizin1.$seo.'-kapak.jpg';
			move_uploaded_file($_FILES["kapak"]["tmp_name"], $dosya);
			
			$dosya_sayi=count($_FILES['resim']['name']); 
				for($i=0;$i<$dosya_sayi;$i++){ 
					if(!empty($_FILES['resim']['name'][$i])){
					$dosya	=	$dizin2.$seo.'-'.($i+1).'.jpg';
					 move_uploaded_file($_FILES['resim']['tmp_name'][($i)],$dosya);
					} 
				}
			
			echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Program Güncellendi. Adım 6ya geç!</span></div>";
			break;
			
			case 6:
			BaglantiAc();
			$eklenme  = date("Y-m-d H:i:s");
			$durum	  = $_POST["durum"];
			$guncelle = mysql_query("update programlar set eklenme='$eklenme',durum='$durum' where id='$id'");
			if($guncelle) echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Program güncelleme işlemi başarılı :)</span></div>";
			else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Program güncellenemedi .".mysql_error()."</span></div>";
			// session bitir
			unset($_SESSION['programSeo']);
			BaglantiKapat();
			break;
		}
	}
if($id != ""){
	BaglantiAc();
	$sqls 		= mysql_query("select * from programlar where id='$id'");
	$ceks 		= mysql_fetch_array($sqls);
	$adi		= $ceks["adi"];
	$_SESSION["programSeo"] = $ceks["seo"];
	$aciklama	= $ceks["aciklama"];
	$icerik		= $ceks["icerik"];
	$turu		= $ceks["turu"];
	$yili		= $ceks["yili"];
	$platform	= $ceks["platform"];
	$boyut		= $ceks["boyut"];
	$tanitim	= $ceks["tanitim"];
	$kullanim	= $ceks["kullanim"];
	$link1		= $ceks["link1"];
	$link2		= $ceks["link2"];
	$durum		= $ceks["durum"];
	BaglantiKapat();
}
?>

<h3 class="anabaslik"> Program Ekle </h3>
<ul>
	<li><a href="yonetim.php?s=programDuzenle&a=1&id=<?php echo $id;?>">Adım 1</a></li>
	<li><a href="yonetim.php?s=programDuzenle&a=2&id=<?php echo $id;?>">Adım 2</a></li>
	<li><a href="yonetim.php?s=programDuzenle&a=3&id=<?php echo $id;?>">Adım 3</a></li>
	<li><a href="yonetim.php?s=programDuzenle&a=4&id=<?php echo $id;?>">Adım 4</a></li>
	<li><a href="yonetim.php?s=programDuzenle&a=5&id=<?php echo $id;?>">Adım 5</a></li>
	<li><a href="yonetim.php?s=programDuzenle&a=6&id=<?php echo $id;?>">Adım 6</a></li>
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
		<h4>Program Adı : </h4>
		<input name="adi" type="text" value="<?php echo @$adi; ?>" size="25" maxlength="200" />
		</div>
		
		<div class="urun-baslik">
		<h4>Program Yılı : </h4>
		<select name="yili" style="width:200px; height:25PX;">
					<?php
					$yil = 2016;
					for($i=1;$i<=30;$i++){
						if($yil == @$yili) echo '<option value="'.$yil.'" selected>'.$yil.'</option>';
						else echo '<option value="'.$yil.'">'.$yil.'</option>';
					$yil=$yil-1;
					}
					?>
		</select>
		</div>
		
		
		
		<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Programı Güncelle" />	
	</div>

	<div style="width:200px; float:left;">
		<div class="urun-baslik">
		Program TÜRÜ <BR/>
		<select name="turu" style="width:200px; height:25PX;">
		<?php
		BaglantiAc();
		$sql = mysql_query("select * from program_turleri order by id asc");
		while($cek = mysql_fetch_array($sql)){
			if(@$turu != ""){
				if($turu == $cek["id"]) echo '<option value="'.$cek["id"].'" selected>'.$cek["adi"].'</option>';
				else echo '<option value="'.$cek["id"].'">'.$cek["adi"].'</option>';
				
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
		
		<div class="urun-baslik">
		<h4>Program Açıklaması : </h4>
		<input style="height:60px;" name="aciklama" type="text" value="<?php echo @$aciklama; ?>" size="25" maxlength="300" />
		</div>
		
	</div>
			<?php break;
			
			case 2: ?>
			<div class="urun-baslik">
				<h4>Program İçeriği : </h4>
				<textarea class="Editor" name="icerik" rows="10" cols="60" ><?php echo @$icerik; ?></textarea>
				<br/>
				<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="İçeriği Güncelle" />
			</div>
			
			
			<?php break;
			
			case 3: ?>
			
			<div style="width:320px; float:left;">
			<div class="urun-baslik">
				<h4>Program Platform : </h4>
				<select name="platform" style="width:200px; height:25PX;">
					<option value="Windows"<?php if(@$platform == "Windows") echo " selected"; ?>>Windows</option>
					<option value="Linux"<?php if(@$platform == "Linux") echo " selected"; ?>>Linux</option>
					<option value="Mac"<?php if(@$platform == "Mac") echo " selected"; ?>>Mac</option>
					<option value="Android"<?php if(@$platform == "Android") echo " selected"; ?>>Android</option>
					<option value="Genel"<?php if(@$platform == "Genel") echo " selected"; ?>>Genel</option>
				</select>
			</div>
			<div class="urun-baslik">
				<h4>Lisans / Açıklama  : </h4>
				<input type="text" name="kullanim" size="20" value="<?php echo @$kullanim; ?>" maxlength="150" />
			</div>
			
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Filmi Güncelle" />
			</div>
			<div style="width:200px; float:left;">
			<div class="urun-baslik">
				<h4>BOYUT  : </h4>
				<input type="text" name="boyut" value="<?php echo @$boyut; ?>" size="20" maxlength="150" />
			</div>
			<div class="urun-baslik">
				<h4>Program YOUTUBE KODU  : </h4>
				<input type="text" name="tanitim" value="<?php echo @$tanitim; ?>" size="20" maxlength="150" />
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
				
				<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Linkleri Güncelle" />
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
					<h4>PROGRAM RESMLERİ : </h4>
					<input type="file" name="resim[]" size="70" multiple="multiple"/>
			</div>
			
			</div>
			<input type="hidden" name="bok" />
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Resimleri Yükle" />
			<?php break;
			case 6: ?>
			<input type="hidden" name="bok" />
			<select name="durum" style="width:200px; height:45px;">
				<option value="1" <?php if($durum == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($durum == 0) echo "selected"; ?>> Pasif </option>
			</select>
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Programı Güncelle" />
			<?php break;
		}
?>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>