<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"> Yöneticiler </h3>
<div id="yeni-yonetici"><a href="yonetim.php?s=yonetici-ekle">Yeni Yönetici Ekle</a></div>
	<div style="clear:both;"></div>

<form> 
<div class="tablo">
<li class="no"><b><input name="checkall" onclick="checkUncheckAll(this);" type="checkbox" /></b></li>
<li class="no"><b>No</b></li>
<li class="durum"><b>Durum</b></li>
<li class="baslik"><b>Kullanıcı Adı</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php

$yonetici_sql	=	mysql_query("select * from yoneticiler");
$i=0;
		while($yonetici_cek	=	mysql_fetch_array($yonetici_sql))
			{
				$yonetici_id	=	$yonetici_cek["id"];
				$yonetici_ad	=	$yonetici_cek["yonetici_kullanici"];
				$yonetici_durum	=	$yonetici_cek["yonetici_durum"];
				$i++;
				echo "<div class=\"satir\">
				<li class=\"no\"><input type=\"checkbox\" name=\"option1\" ></li>
				<li class=\"no\">$i</li>";
				if ($yonetici_durum == 1 )
				{
				echo "<li class=\"durum\">Aktif <img class=\"durums\" width=\"16\" src=\"images/icon/active.png\"></li>";
				}
				else
				{
				echo "<li class=\"durum\">Pasif <img class=\"durums\" width=\"16\" src=\"images/icon/cancel.png\"></li>";
				}
				echo "<li class=\"baslik\">$yonetici_ad</li>
				<li class=\"islem\">
				<li class=\"edit\"><a href=\"yonetim.php?s=yonetici-duzenle&id=$yonetici_id\" class=\"button icon edit\">Düzenle</a></li>
				<li class=\"sil\"> <a href=\"yonetim.php?s=yonetici-sil&id=$yonetici_id\" class=\"button icon remove danger\">Sil</a></li>
				</li>
				<div class=\"temizle\"></div>
				</div>";
			}
			
?>
</div>
</div>
<div style="clear:both;"></div>