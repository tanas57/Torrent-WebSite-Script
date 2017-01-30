<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Personel Listesi </h3>
	<div id="yeni-personel"><a href="yonetim.php?s=personel-ekle">Yeni Personel Ekle</a></div>
	<div style="clear:both;"></div>
<form> 
<div class="tablo">
<li class="no"><b><input name="checkall" onclick="checkUncheckAll(this);" type="checkbox" /></b></li>
<li class="no"><b>No</b></li>
<li class="durum"><b>Durum</b></li>
<li class="baslik"><b>Ad ve Soyad</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php
$personel_sql			=	mysql_query("select * from personel");
$i=0;
		while($personel_cek			=	mysql_fetch_array($personel_sql))
			{
				$personel_id			=	$personel_cek["id"];
				$advesoyad				=	$personel_cek["adsoyad"];
				$i++;
				echo "<div class=\"satir\">
<li class=\"no\"><input type=\"checkbox\" name=\"option1\" ></li>
<li class=\"no\">$i</li>
<li class=\"durum\">Aktif <img class=\"durums\" width=\"16\" src=\"images/icon/active.png\"></li>
<li class=\"baslik\">$advesoyad</li>

<li class=\"islem\">
<li class=\"edit\"><a href=\"yonetim.php?s=personel-duzenle&id=$personel_id\" class=\"button icon edit\">Düzenle</a></li>
<li class=\"sil\"> <a href=\"yonetim.php?s=personel-sil&id=$personel_id\" class=\"button icon remove danger\">Sil</a></li>
</li>
<div class=\"temizle\"></div>
</div>";
			}		
?>
</form>
</div>
</div>
<div style="clear:both;"></div>