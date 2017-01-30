<?php ob_start(); ?>
<div class="yanyana">

<?php
if($_POST == TRUE){
		$filmsayi 		= 	$_POST["filmsayi"];
		$oyunsayi 		= 	$_POST["oyunsayi"];
		$dizisayi 		= 	$_POST["dizisayi"];
		$programsayi 	= 	$_POST["programsayi"];
		BaglantiAc();
		$guncelle = mysql_query("update ayarlar set SayfaFilm='$filmsayi',SayfaOyun='$oyunsayi',SayfaProgram='$programsayi',SayfaDizi='$dizisayi'");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi! . '".mysql_error()."</span></div>";
		BaglantiKapat();
	}
BaglantiAc();
$sql = mysql_query("select SayfaFilm,SayfaOyun,SayfaProgram,SayfaDizi from ayarlar");
$cek = mysql_fetch_array($sql);
$deger1 = $cek["SayfaFilm"];
$deger2 = $cek["SayfaOyun"];
$deger3 = $cek["SayfaProgram"];
$deger4 = $cek["SayfaDizi"];
BaglantiKapat();
?>

<h3 class="anabaslik"> Sayfalama Ayarları </h3>
	<form action="" method="post">
	<div style="width=250px; margin-left:15px; margin-right:15px; float:left;">
		<div class="urun-baslik">
		<h4>Filmler sayfası-> Film Adeti : </h4>
		<select name="filmsayi" style="width:200px; height:25px;">
			<?php
			$i=4;
			while($i<=40){
				if($deger1 == $i) echo '<option value="'.$i.'" selected>'.$i.' adet listele</option>';
				else echo '<option value="'.$i.'">'.$i.' adet listele</option>';
				$i=$i+4;
			}
			?>
		</select>
		</div>
		<div class="urun-baslik">
		<h4>Oyunlar sayfası-> Oyun Adeti : </h4>
		<select name="oyunsayi" style="width:200px; height:25px;">
			<?php
			$i=4;
			while($i<=40){
				if($deger2 == $i) echo '<option value="'.$i.'" selected>'.$i.' adet listele</option>';
				else echo '<option value="'.$i.'">'.$i.' adet listele</option>';
				$i=$i+4;
			}
			?>
		</select>
		</div>
	</div>
	
	<div style="width=250px; margin-left:15px; margin-right:15px; float:left;">
		<div class="urun-baslik">
		<h4>Programlar sayfası-> Program Adeti : </h4>
		<select name="programsayi" style="width:200px; height:25px;">
			<?php
			$i=4;
			while($i<=40){
				if($deger3 == $i) echo '<option value="'.$i.'" selected>'.$i.' adet listele</option>';
				else echo '<option value="'.$i.'">'.$i.' adet listele</option>';
				$i=$i+4;
			}
			?>
		</select>
		</div>
		<div class="urun-baslik">
		<h4>Diziler Sayfası-> Dizi Adeti : </h4>
		<select name="dizisayi" style="width:200px; height:25px;">
			<?php
			$i=2;
			while($i<=40){
				if($deger4 == $i) echo '<option value="'.$i.'" selected>'.$i.' adet listele</option>';
				else echo '<option value="'.$i.'">'.$i.' adet listele</option>';
				$i=$i+2;
			}
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