<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Program Kategorileri </h3>
	<div style="clear:both;"></div>
<form> 
<div class="tablo">
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php
BaglantiAc();
$icerik_sql			=	mysql_query("select * from program_turleri");
$i=0;
		while($icerik_cek	=	mysql_fetch_array($icerik_sql))
			{
				$icerik_id			=	$icerik_cek["id"];
				$icerik_baslik		=	$icerik_cek["adi"];
				$i++;
				echo "<div class=\"satir\">

<li class=\"baslik\">$icerik_baslik</li>

<li class=\"islem\">
<li class=\"edit\"><a href=\"yonetim.php?s=programKategoriDuzenle&id=$icerik_id\" class=\"button icon edit\">Düzenle</a></li>
<li class=\"edit\"><a href=\"yonetim.php?s=programKategoriSil&id=$icerik_id\" class=\"button icon remove\">Sil</a></li>
</li>
<div class=\"temizle\"></div>
</div>";
			}
BaglantiKapat();			
?>
</form>
</div>
</div>
<div style="clear:both;"></div>