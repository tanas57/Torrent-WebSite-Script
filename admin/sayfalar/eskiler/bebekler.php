<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Bebek Bildirim Listesi </h3>
<form> 
<div class="tablo">
<li class="no"><b><input name="checkall" onclick="checkUncheckAll(this);" type="checkbox" /></b></li>
<li class="no"><b>No</b></li>
<li class="durum"><b>Durum</b></li>
<li class="baslik"><b>Anne Adı ve Soyadı</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php
$bebek_sql			=	mysql_query("select * from bebekbildirimleri");
$i=0;
		while($bebek_cek	=	mysql_fetch_array($bebek_sql))
			{
				$bebek_id			=	$bebek_cek["id"];
				$anne_ad			=	$bebek_cek["anneAdSoyad"];
				$bebek_durum		=	$bebek_cek["bebek_durum"];
				$i++;
				if ($bebek_durum == 1)
				{
				$durum	=	"<li class=\"durum\">Aktif <img class=\"durums\" width=\"16\" src=\"images/icon/active.png\" title=\"Aktif\"/></li>";
				$buton	=	"<li class=\"sil\"> <a href=\"yonetim.php?s=bebek-onaykaldir&id=$bebek_id\" class=\"button\">Onay Kaldır</a></li>";
				}
				else
				{
				$durum	=	"<li class=\"durum\">Bekliyor <img class=\"durums\" width=\"16\" src=\"images/icon/bekleme.png\" title=\"Bekliyor\"/></li>";
				$buton	=	"<li class=\"sil\"> <a href=\"yonetim.php?s=bebek-onay&id=$bebek_id\" class=\"button\">Onayla</a></li>";
				}
				echo "<div class=\"satir\">
<li class=\"no\"><input type=\"checkbox\" name=\"option1\" ></li>
<li class=\"no\">$i</li>
$durum
<li class=\"baslik\">$anne_ad</li>

<li class=\"islem\">
<li class=\"edit\"><a href=\"yonetim.php?s=bebek-detay&id=$bebek_id\" class=\"button icon edit\">Detay</a></li>
$buton
</li>
<div class=\"temizle\"></div>
</div>";
			}		
?>
</form>
</div>
</div>
<div style="clear:both;"></div>