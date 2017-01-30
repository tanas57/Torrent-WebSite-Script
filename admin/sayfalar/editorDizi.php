<?php ob_start(); ?>
<div class="yanyana">

<?php
	if($_POST == TRUE){
		$id = $_POST["dizi_id"];
		BaglantiAc();
		$guncelle = mysql_query("update ayarlar set editorDizi='$id'");
				if($guncelle)
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Güncellendi !</span></div>";
				else
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncellenemedi! . '".mysql_error()."</span></div>";
		BaglantiKapat();
	}
?>

<h3 class="anabaslik"> Sidebar Seçimiş Dizi </h3>
	<form action="" method="post">
		<div class="urun-baslik">
		<h4>Dizi Seç : </h4>
		<select name="dizi_id" style="width:270px; height:25px;">
			<?php
			BaglantiAc();
			$sql = mysql_query("select id,adi from diziler order by adi asc");
			while($cek = mysql_fetch_array($sql)){
				echo '<option value="'.$cek["id"].'">'.$cek["adi"].'</option>';
			}
			BaglantiKapat();
			?>
		</select>
		<input type="submit" value="Güncelle" />
		</div>
	</form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>