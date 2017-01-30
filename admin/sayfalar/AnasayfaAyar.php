<?php ob_start(); ?>
<div class="yanyana">

<?php
if($_POST == TRUE){
		$encokindirilen = $_POST["encokindirilen"];
		$filmsayi = $_POST["filmsayi"];
		$oyunsayi = $_POST["oyunsayi"];
		$dizisayi = $_POST["dizisayi"];
		$programsayi = $_POST["programsayi"];
		BaglantiAc();
		$guncelle = mysql_query("update ayarlar set indexEnCokInd='$encokindirilen',indexFilmSayi='$filmsayi',indexOyunSayi='$oyunsayi',indexDiziBolumSayi='$dizisayi',indexProgramSayi='$programsayi'");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi! . '".mysql_error()."</span></div>";
		BaglantiKapat();
	}
BaglantiAc();
$sql = mysql_query("select indexEnCokInd,indexFilmSayi,indexOyunSayi,indexDiziBolumSayi,indexProgramSayi from ayarlar");
$cek = mysql_fetch_array($sql);
$deger1 = $cek["indexEnCokInd"];
$deger2 = $cek["indexFilmSayi"];
$deger3 = $cek["indexOyunSayi"];
$deger4 = $cek["indexDiziBolumSayi"];
$deger5 = $cek["indexProgramSayi"];
BaglantiKapat();
?>

<h3 class="anabaslik"> Anasayfa Ayarları </h3>
	<form action="" method="post">
	<div style="width=250px; margin-left:15px; margin-right:15px; float:left;">
		<div class="urun-baslik">
		<h4>En çok indirilenler sayısı : </h4>
		<select name="encokindirilen" style="width:45px; height:25px;">
			<?php
			for($i=1; $i<=20; $i++){
				if($deger1 == $i) echo '<option value="'.$i.'" selected>'.$i.'</option>';
				else echo '<option value="'.$i.'">'.$i.'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		</div>
		<div class="urun-baslik">
		<h4>Son eklenen film sayısı : </h4>
		<select name="filmsayi" style="width:45px; height:25px;">
			<?php
			for($i=1; $i<=20; $i++){
				if($deger2 == $i) echo '<option value="'.$i.'" selected>'.$i.'</option>';
				else echo '<option value="'.$i.'">'.$i.'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		</div>
		<div class="urun-baslik">
		<h4>Son eklenen oyun sayısı : </h4>
		<select name="oyunsayi" style="width:45px; height:25px;">
			<?php
			for($i=1; $i<=20; $i++){
				if($deger3 == $i) echo '<option value="'.$i.'" selected>'.$i.'</option>';
				else echo '<option value="'.$i.'">'.$i.'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		</div>
	</div>
	
	<div style="width=250px; margin-left:15px; margin-right:15px; float:left;">
		<div class="urun-baslik">
		<h4>Son eklenen dizi bölüm sayısı : </h4>
		<select name="dizisayi" style="width:45px; height:25px;">
			<?php
			for($i=1; $i<=20; $i++){
				if($deger4 == $i) echo '<option value="'.$i.'" selected>'.$i.'</option>';
				else echo '<option value="'.$i.'">'.$i.'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		</div>
		<div class="urun-baslik">
		<h4> Son eklenen program sayısı : </h4>
		<select name="programsayi" style="width:45px; height:25px;">
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
	<div style="clear:both;"></div>
		<br/><input type="submit" value="Güncelle" /><br/><br/>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>