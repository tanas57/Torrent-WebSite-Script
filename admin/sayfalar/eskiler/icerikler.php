<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> İçerik Listesi </h3>
	<div id="yeni-slider"><a href="yonetim.php?s=icerik-ekle">Yeni İçerik Ekle</a></div>
	<div style="clear:both;"></div>
<form> 
<div class="tablo">
<li class="no"><b><input name="checkall" onclick="checkUncheckAll(this);" type="checkbox" /></b></li>
<li class="no"><b>No</b></li>
<li class="durum"><b>Durum</b></li>
<li class="baslik"><b>Başlık</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php
$icerik_sql			=	mysql_query("select * from icerikler");
$i=0;
		while($icerik_cek	=	mysql_fetch_array($icerik_sql))
			{
				$icerik_id			=	$icerik_cek["id"];
				$icerik_baslik		=	$icerik_cek["baslik"];
				$i++;
				echo "<div class=\"satir\">
<li class=\"no\"><input type=\"checkbox\" name=\"option1\" ></li>
<li class=\"no\">$i</li>
<li class=\"durum\">Aktif <img class=\"durums\" width=\"16\" src=\"images/icon/active.png\"></li>
<li class=\"baslik\">$icerik_baslik</li>

<li class=\"islem\">
<li class=\"edit\"><a href=\"yonetim.php?s=icerik-duzenle&id=$icerik_id\" class=\"button icon edit\">Düzenle</a></li>
<li class=\"sil\"> <a href=\"yonetim.php?s=icerik-sil&id=$icerik_id\" class=\"button icon remove danger\">Sil</a></li>
</li>
<div class=\"temizle\"></div>
</div>";
			}		
?>
</form>
</div>
</div>
<div style="clear:both;"></div>