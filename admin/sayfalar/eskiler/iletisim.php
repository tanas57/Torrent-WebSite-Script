<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> İletişim Bildirim Listesi </h3>
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
$iletisim_sql			=	mysql_query("select * from iletisim");
$i=0;
		while($iletisim_cek			=	mysql_fetch_array($iletisim_sql))
			{
				$iletisim_id			=	$iletisim_cek["id"];
				$ad						=	$iletisim_cek["ad"];
				$soyad					=	$iletisim_cek["soyad"];
				$durum					=	$iletisim_cek["durum"];
				$advesoyad				=	$ad.' '.$soyad;
				if ($durum == 0 )
				{
				$durum 	=	'<li class="durum">Bekliyor <img class="durums" width="16" src="images/icon/bekleme.png"></li>';
				}
				else
				{
				$durum	=	'<li class="durum">Okundu <img class="durums" width="16" src="images/icon/active.png"></li>';
				}
				$i++;
				echo "<div class=\"satir\">
<li class=\"no\"><input type=\"checkbox\" name=\"option1\" ></li>
<li class=\"no\">$i</li>
$durum
<li class=\"baslik\">$advesoyad</li>

<li class=\"islem\">
<li class=\"edit\"><a href=\"yonetim.php?s=iletisim-oku&id=$iletisim_id\" class=\"button icon edit\">Oku</a></li>
<li class=\"sil\"> <a href=\"yonetim.php?s=iletisim-sil&id=$iletisim_id\" class=\"button icon remove danger\">Sil</a></li>
</li>
<div class=\"temizle\"></div>
</div>";
			}		
?>
</form>
</div>
</div>
<div style="clear:both;"></div>