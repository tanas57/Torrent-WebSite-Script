<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Yorumlar </h3>
	<div style="clear:both;"></div>
<form> 
<div class="tablo">
<div class="temizle"></div>
<li class="no">nö</li>
<li class="durum"><b>Durum</b></li>
<li class="baslik"><b>Ad ve Soyad</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php
BaglantiAc();
$icerik_sql			=	mysql_query("select * from yorumlar order by eklenme desc");
$i=0;
		while($icerik_cek	=	mysql_fetch_array($icerik_sql))
			{
				$icerik_id			=	$icerik_cek["id"];
				$icerik_baslik		=	$icerik_cek["yapan"];
				if ($icerik_cek["durum"] == 0 )
				{
				$durum 	=	'<li class="durum">Bekliyor <img class="durums" width="16" src="images/icon/bekleme.png"></li>';
				}
				else
				{
				$durum	=	'<li class="durum">Onaylı <img class="durums" width="16" src="images/icon/active.png"></li>';
				}
				
				
				$i++;
echo "<div class=\"satir\">
<li class=\"no\"></li>
<li class=\"no\">$i</li>
<li class=\"durum\"> $durum</li>
<li class=\"baslik\">$icerik_baslik</li>

<li class=\"islem\">
<li class=\"edit\"><a href=\"yonetim.php?s=yorumlarDuzenle&id=$icerik_id\" class=\"button icon edit\">Düzenle</a></li>
<li class=\"edit\"><a href=\"yonetim.php?s=YorumSil&id=$icerik_id\" class=\"button icon remove\">Sil</a></li>
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