<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Filmler </h3>
	<div style="clear:both;"></div>
<div class="tablo">
<div class="temizle"></div>
<li class="no">nö</li>
<li class="baslik"><b>Film Adı</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php

BaglantiAc();
$icerik_sql			=	mysql_query("select * from filmler where copySeo='0' and durum='2' group by adi order by id desc limit 50");
$i=1;
		while($icerik_cek	=	mysql_fetch_array($icerik_sql))
			{
				$id			=	$icerik_cek["id"];
				$adi		=	$icerik_cek["adi"];
				$kalite		=	$icerik_cek["kalite"];
				$kalite		= 	FilmKalite($kalite);
				
echo "<div class=\"satir\">
<li class=\"no\"></li>
<li class=\"no\">$i</li>
<li class=\"durum\"> $kalite</li>
<li class=\"baslik\">$adi</li>

<li class=\"islem\">
<li class=\"edit\"><a href=\"yonetim.php?s=filmDuzenle&id=$id&a=1\" class=\"button icon edit\">Düzenle</a></li>
<li class=\"edit\"><a href=\"yonetim.php?s=filmKopya&id=$id\" class=\"button icon edit\">Kopyala</a></li>
<li class=\"edit\"><a href=\"yonetim.php?s=filmSil&id=$id\" class=\"button icon remove\">Sil</a></li>
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