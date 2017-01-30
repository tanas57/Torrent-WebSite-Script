<?php ob_start(); ?>
<div class="yanyana">

<?php
if($_POST == TRUE){
		$sidebar1baslik 	= $_POST["sidebar1baslik"];
		$sidebar2baslik 	= $_POST["sidebar2baslik"];
		$sidebar3baslik 	= $_POST["sidebar3baslik"];
		$sidebar4baslik 	= $_POST["sidebar4baslik"];
		$sidebar5baslik 	= $_POST["sidebar5baslik"];
		$sidebar6baslik 	= $_POST["sidebar6baslik"];
		$sidebar1icerik 	= $_POST["sidebar1icerik"];
		$sidebar3sayi 		= $_POST["sidebar3sayi"];
		$editorDizi 		= $_POST["editorDizi"];
		$sidebar5sayi 		= $_POST["sidebar5sayi"];
		$sidebar6sayi 		= $_POST["sidebar6sayi"];
		BaglantiAc();
		$guncelle = mysql_query("update ayarlar set Sidebar1Baslik='$sidebar1baslik',Sidebar1Icerik='$sidebar1icerik',Sidebar2Baslik='$sidebar2baslik',Sidebar3Baslik='$sidebar3baslik',Sidebar3Sayi='$sidebar3sayi',Sidebar4Baslik='$sidebar4baslik',editorDizi='$editorDizi',Sidebar5Baslik='$sidebar5baslik',Sidebar5Sayi='$sidebar5sayi',Sidebar6Baslik='$sidebar6baslik',Sidebar6Sayi='$sidebar6sayi'");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi! . '".mysql_error()."</span></div>";
		BaglantiKapat();
	}
BaglantiAc();
$sql = mysql_query("select editorDizi,Sidebar1Baslik,Sidebar1Icerik,Sidebar2Baslik,Sidebar3Baslik,Sidebar3Sayi,Sidebar4Baslik,Sidebar5Baslik,Sidebar5Sayi,Sidebar6Baslik,Sidebar6Sayi from ayarlar");
$cek = mysql_fetch_array($sql);
$deger1 = $cek["Sidebar1Baslik"];
$deger2 = $cek["Sidebar1Icerik"];
$deger3 = $cek["Sidebar2Baslik"];
$deger4 = $cek["Sidebar3Baslik"];
$deger5 = $cek["Sidebar3Sayi"];
$deger6 = $cek["Sidebar4Baslik"];
$deger7 = $cek["editorDizi"];
$deger8 = $cek["Sidebar5Baslik"];
$deger9 = $cek["Sidebar5Sayi"];
$deger10 = $cek["Sidebar6Baslik"];
$deger11 = $cek["Sidebar6Sayi"];
BaglantiKapat();
?>

<h3 class="anabaslik"> Sidebar Ayarları </h3>
	<form action="" method="post">
	<div style="width=230px; margin-left:15px; margin-right:15px; float:left;">
		<div class="urun-baslik">
		<h4>Sidebar 1 : </h4>
		Başlık : <input style="width:230px" type="text" name="sidebar1baslik" maxlength="150" value="<?php echo $deger1; ?>" /> <br/><br/>
		İçerik : <textarea name="sidebar1icerik" rows="5" cols="30"><?php echo $deger2; ?></textarea>
		</div>
		<div class="urun-baslik">
		<h4>Sidebar 2 : </h4>
		Başlık : <input style="width:230px"  type="text" name="sidebar2baslik" maxlength="150" value="<?php echo $deger3; ?>" /> <br/>
		</div>
		<div class="urun-baslik">
		<h4>Sidebar 3 : </h4>
		Başlık : <input style="width:230px" type="text" name="sidebar3baslik" maxlength="150" value="<?php echo $deger4; ?>" /> <br/><br/>
		Kaç Film : <select name="sidebar3sayi" style="width:45px; height:25px;">
			<?php
			for($i=1; $i<=20; $i++){
				if($deger5 == $i) echo '<option value="'.$i.'" selected>'.$i.'</option>';
				else echo '<option value="'.$i.'">'.$i.'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		</div>
		
		
	</div>
	
	<div style="width=230px; margin-left:15px; margin-right:15px; float:left;">
		
		
		<div class="urun-baslik">
		<h4>Sidebar 4 : </h4>
		Başlık : <input style="width:200px" type="text" name="sidebar4baslik" maxlength="150" value="<?php echo $deger6; ?>" /> <br/> <br/>
		Seçilen dizi : 
		<select name="editorDizi" style="width:170px; height:25px;">
			<?php
			BaglantiAc();
			$sql = mysql_query("select id,adi from diziler order by adi asc");
			while($cek = mysql_fetch_array($sql)){
				if($cek["id"]==$deger7) echo '<option value="'.$cek["id"].'" selected>'.$cek["adi"].'</option>';
				else echo '<option value="'.$cek["id"].'">'.$cek["adi"].'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		</div>
		<div class="urun-baslik">
		<h4>Sidebar 5 : </h4>
		Başlık : <input style="width:200px" type="text" name="sidebar5baslik" maxlength="150" value="<?php echo $deger8; ?>" /> <br/><br/>
		Kaç Program :
		<select name="sidebar5sayi" style="width:45px; height:25px;">
			<?php
			for($i=1; $i<=20; $i++){
				if($deger9 == $i) echo '<option value="'.$i.'" selected>'.$i.'</option>';
				else echo '<option value="'.$i.'">'.$i.'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		</div>
		<div class="urun-baslik">
		<h4>Sidebar 6 : </h4>
		Başlık : <input style="width:200px" type="text" name="sidebar6baslik" maxlength="150" value="<?php echo $deger10; ?>" /> <br/><br/>
		Kaç Film :
		<select name="sidebar6sayi" style="width:45px; height:25px;">
			<?php
			for($i=1; $i<=20; $i++){
				if($deger11 == $i) echo '<option value="'.$i.'" selected>'.$i.'</option>';
				else echo '<option value="'.$i.'">'.$i.'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		</div>
	</div>
	<div style="clear:both;"></div>
		<br/><input type="submit" value="Güncelle" /><br/><br/>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>