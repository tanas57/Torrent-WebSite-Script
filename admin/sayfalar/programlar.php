<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Programlar </h3>
	<div style="clear:both;"></div>
<form action="" method="post">
	Arama: <input type="text" name="keys" style="width:150px; height:25px;" /> <input type="submit" value="Ara" style="width:55px; height:25px;" />
</form>
<br />
<div class="tablo">
<div class="temizle"></div>
<li class="no">nö</li>
<li class="baslik"><b>Program Adı</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">
<?php
if(@$_GET["sayfa"] != "") { $sayfa = @$_GET["sayfa"]; }

if($_POST == TRUE){
	$arama = $_POST["keys"];
	BaglantiAc();

$keys	 = explode(' ',$arama);
$araAdi = "";
$araIcrk= "";
$say = count($keys); $sa = 0;

foreach($keys as $key){

				if($sa < $say-1){
					$araAdi .= "adi like '%$key%' or ";
					$araIcrk .= "icerik like '%$key%' or ";
				}
				else{
					$araAdi .= "adi like '%$key%'";
					$araIcrk .= "icerik like '%$key%'";
				}
				$sa++;
}
$icerik_sql			=	mysql_query("select * from programlar where $araAdi or $araIcrk order by eklenme desc");
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
<li class=\"edit\"><a href=\"yonetim.php?s=programDuzenle&id=$id&a=1\" class=\"button icon edit\">Düzenle</a></li>
<li class=\"edit\"><a href=\"yonetim.php?s=programSil&id=$id\" class=\"button icon remove\">Sil</a></li>
</li>
<div class=\"temizle\"></div>
</div>";
$i++;
			}
echo '<hr/>';

	
	
	
}

BaglantiAc();
$icerik_sql			=	mysql_query("select * from programlar order by eklenme desc limit 10");
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
<li class=\"edit\"><a href=\"yonetim.php?s=programDuzenle&id=$id&a=1\" class=\"button icon edit\">Düzenle</a></li>
<li class=\"edit\"><a href=\"yonetim.php?s=programSil&id=$id\" class=\"button icon remove\">Sil</a></li>
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