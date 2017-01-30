<?php ob_start(); ?>
<div class="yanyana">

<?php
if($_POST == TRUE){
		$deger1 	= $_POST["reklamKisaltmaDurum"];
		$deger2 	= mysql_real_escape_string($_POST["reklamKisaltma"]);
		$deger3 	= $_POST["reklamSidebarDurum"];
		$deger4 	= mysql_real_escape_string($_POST["reklamSidebar"]);
		$deger5 	= $_POST["reklamPosterDurum"];
		$deger6 	= mysql_real_escape_string($_POST["reklamPoster"]);
		$deger7 	= $_POST["reklamIcDurum"];
		$deger8 	= mysql_real_escape_string($_POST["reklamIc"]);
		$deger9 	= $_POST["reklamPopupDurum"];
		$deger10 	= mysql_real_escape_string($_POST["reklamPopup"]);
		$deger11 	= $_POST["reklamSplashDurum"];
		$deger12 	= mysql_real_escape_string($_POST["reklamSplash"]);
		$deger13 	= $_POST["reklamAltDurum"];
		$deger14 	= mysql_real_escape_string($_POST["reklamAlt"]);
		BaglantiAc();
		$guncelle = mysql_query("update ayarlar set reklamKisaltmaDurum='$deger1',reklamKisaltma='$deger2',reklamSidebarDurum='$deger3',reklamSidebar='$deger4',reklamPosterDurum='$deger5',reklamPoster='$deger6',reklamIcDurum='$deger7',reklamIc='$deger8',reklamPopupDurum='$deger9',reklamPopup='$deger10',reklamSplashDurum='$deger11',reklamSplash='$deger12',reklamAltDurum='$deger13',reklamAlt='$deger14'");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi! . '".mysql_error()."</span></div>";
		BaglantiKapat();
	}
BaglantiAc();
$sql = mysql_query("select reklamKisaltmaDurum,reklamKisaltma,reklamSidebarDurum,reklamSidebar,reklamPosterDurum,reklamPoster,reklamIcDurum,reklamIc,reklamPopupDurum,reklamPopup,reklamSplashDurum,reklamSplash,reklamAltDurum,reklamAlt from ayarlar");
$cek = mysql_fetch_array($sql);
$deger1 = $cek["reklamKisaltmaDurum"];
$deger2 = $cek["reklamKisaltma"];
$deger3 = $cek["reklamSidebarDurum"];
$deger4 = $cek["reklamSidebar"];
$deger5 = $cek["reklamPosterDurum"];
$deger6 = $cek["reklamPoster"];
$deger7 = $cek["reklamIcDurum"];
$deger8 = $cek["reklamIc"];
$deger9 = $cek["reklamPopupDurum"];
$deger10 = $cek["reklamPopup"];
$deger11 = $cek["reklamSplashDurum"];
$deger12 = $cek["reklamSplash"];
$deger13 = $cek["reklamAltDurum"];
$deger14 = $cek["reklamAlt"];
BaglantiKapat();
?>

<h3 class="anabaslik"> Reklam Ayarları </h3>
	<form action="" method="post">
	<div style="width=250px; margin-left:15px; margin-right:15px; float:left;">
		<div class="urun-baslik">
		<h4>Kısaltma Servisi Reklamı : </h4>
		Reklam aktif edilsin mi? 
		<select name="reklamKisaltmaDurum" style="width:60px; height:25px; margin-bottom:10px">
				<option value="1" <?php if($deger1 == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($deger1 == 0) echo "selected"; ?>> Pasif </option>
		</select> <br/>
		<?php if($deger1 == 1) echo '<input type="text" name="reklamKisaltma" value="'.$deger2.'" placeholder="Reklam kodu buraya" maxlength="499" style="color:#fff; background:#0dc80d;"/>'; else echo '<input type="text" name="reklamKisaltma" value="'.$deger2.'" placeholder="Reklam kodu buraya" maxlength="499" style="color:#fff; background:#f44d4d;/>'; ?>
		</div>
		
		<div class="urun-baslik">
		<h4>Sidebar Reklamı : 300x250 / 300x600 </h4>
		Reklam aktif edilsin mi? 
		<select name="reklamSidebarDurum" style="width:60px; height:25px; margin-bottom:10px">
				<option value="1" <?php if($deger3 == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($deger3 == 0) echo "selected"; ?>> Pasif </option>
		</select> <br/>
		<?php if($deger3 == 1) echo '<textarea name="reklamSidebar" rows="5" cols="37" placeholder="Reklam kodu buraya" style="color:#fff; background:#0dc80d;">'.$deger4.'</textarea>'; else echo '<textarea name="reklamSidebar" rows="5" cols="37" placeholder="Reklam kodu buraya" style="color:#fff; background:#f44d4d;">'.$deger4.'</textarea>'; ?>
		</div>
		
		<div class="urun-baslik">
		<h4>PosterAltı Reklam (önerilen: 250x75)</h4>
		Reklam aktif edilsin mi? 
		<select name="reklamPosterDurum" style="width:60px; height:25px; margin-bottom:10px">
				<option value="1" <?php if($deger5 == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($deger5 == 0) echo "selected"; ?>> Pasif </option>
		</select> <br/>
		<?php if($deger5 == 1) echo '<textarea name="reklamPoster" rows="5" cols="37" placeholder="Reklam kodu buraya" style="color:#fff; background:#0dc80d;">'.$deger6.'</textarea>'; else echo '<textarea name="reklamPoster" rows="5" cols="37" placeholder="Reklam kodu buraya" style="color:#fff; background:#f44d4d;">'.$deger6.'</textarea>'; ?>
		</div>
		
		<div class="urun-baslik">
		<h4>İç Reklam (Max Width 310px)</h4>
		Reklam aktif edilsin mi? 
		<select name="reklamIcDurum" style="width:60px; height:25px; margin-bottom:10px">
				<option value="1" <?php if($deger7 == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($deger7 == 0) echo "selected"; ?>> Pasif </option>
		</select> <br/>
		<?php if($deger7 == 1) echo '<textarea name="reklamIc" rows="5" cols="37" placeholder="Reklam kodu buraya" style="color:#fff; background:#0dc80d;">'.$deger8.'</textarea>'; else echo '<textarea name="reklamIc" rows="5" cols="37" placeholder="Reklam kodu buraya" style="color:#fff; background:#f44d4d;">'.$deger8.'</textarea>'; ?>
		</div>
		
	</div>
	
	<div style="width=250px; margin-left:15px; margin-right:15px; float:left;">
		
		<div class="urun-baslik">
		<h4>Alt Reklam (yatay olabilir)</h4>
		Reklam aktif edilsin mi? 
		<select name="reklamAltDurum" style="width:60px; height:25px; margin-bottom:10px">
				<option value="1" <?php if($deger13 == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($deger13 == 0) echo "selected"; ?>> Pasif </option>
		</select><br/>
		<?php if($deger13 == 1) echo '<textarea name="reklamAlt" rows="5" cols="32" placeholder="Reklam kodu buraya" style="color:#fff; background:#0dc80d;">'.$deger14.'</textarea>'; else echo '<textarea name="reklamAlt" rows="5" cols="32" placeholder="Reklam kodu buraya" style="color:#fff; background:#f44d4d;">'.$deger14.'</textarea>'; ?>
		</div>
		
		<div class="urun-baslik">
		<h4>Popup Reklam</h4>
		Reklam aktif edilsin mi? 
		<select name="reklamPopupDurum" style="width:60px; height:25px; margin-bottom:10px">
				<option value="1" <?php if($deger9 == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($deger9 == 0) echo "selected"; ?>> Pasif </option>
		</select><br/>
		<?php if($deger9 == 1) echo '<textarea name="reklamPopup" rows="5" cols="32" placeholder="Reklam kodu buraya" style="color:#fff; background:#0dc80d;">'.$deger10.'</textarea>'; else echo '<textarea name="reklamPopup" rows="5" cols="32" placeholder="Reklam kodu buraya" style="color:#fff; background:#f44d4d;">'.$deger10.'</textarea>'; ?>
		</div>
		
		<div class="urun-baslik">
		<h4>Splash Reklam</h4>
		Reklam aktif edilsin mi? 
		<select name="reklamSplashDurum" style="width:60px; height:25px; margin-bottom:10px">
				<option value="1" <?php if($deger11 == 1) echo "selected"; ?>> Aktif </option>
				<option value="0" <?php if($deger11 == 0) echo "selected"; ?>> Pasif </option>
		</select> <br/>
		<?php if($deger11 == 1) echo '<textarea name="reklamSplash" rows="5" cols="32" placeholder="Reklam kodu buraya" style="color:#fff; background:#0dc80d;">'.$deger12.'</textarea>'; else echo '<textarea name="reklamSplash" rows="5" cols="32" placeholder="Reklam kodu buraya" style="color:#fff; background:#f44d4d;">'.$deger12.'</textarea>'; ?>
		</div>
		
	</div>
	<div style="clear:both;"></div>
		<br/><input type="submit" value="Güncelle" /><br/><br/>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>