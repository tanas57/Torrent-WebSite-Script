<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Dizi Bölümleri </h3>
	<div style="clear:both;"></div>
<form action="" method="post">
	<div class="urun-baslik">
		Dizi Seç : 
		<select name="dizi_id" style="width:260px; height:25px;">
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
		<input type="submit" value="Bölümleri Listele" />
	</div>
</form>
<br />
<div class="tablo">
<div class="temizle"></div>
<li class="no">nö</li>
<li class="baslik"><b>Dizi Adı</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php
BaglantiAc();
if($_POST == TRUE){
	$dizi = $_POST["dizi_id"];
	$icerik_sql			=	mysql_query("select * from dizi_bolumler where dizi_id='$dizi' and copySeo='0' order by eklenme desc limit 30");
}
else{
	$icerik_sql			=	mysql_query("select * from dizi_bolumler where copySeo='0' order by eklenme desc limit 30");
}

$i=1;
		while($icerik_cek	=	mysql_fetch_array($icerik_sql))
			{
				$id			=	$icerik_cek["id"];
				$adi		=	$icerik_cek["adi"];
				
echo "<div class=\"satir\">
<li class=\"no\"></li>
<li class=\"no\">$i</li>
<li class=\"baslik\">$adi</li>

<li class=\"islem\">
<li class=\"edit\"><a href=\"yonetim.php?s=diziBolumDuzenle&id=$id&a=1\" class=\"button icon edit\">Düzenle</a></li>
<li class=\"edit\"><a href=\"yonetim.php?s=diziBolumKopya&id=$id\" class=\"button icon edit\">Kopyala</a></li>
<li class=\"edit\"><a href=\"yonetim.php?s=diziBolumSil&id=$id\" class=\"button icon remove\">Sil</a></li>
</li>
<div class=\"temizle\"></div>
</div>";
$i++;
			}

BaglantiKapat();	
	
?>
</div>
</div>
<div style="clear:both;"></div>