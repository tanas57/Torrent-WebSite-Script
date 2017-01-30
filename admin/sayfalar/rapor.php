<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Linkleri Kontrol et.. </h3>
	<div style="clear:both;"></div>
<table style="witdh:650px;">
<tr>
	<td style="width:100px; font-weight:bold;">Tür</td>
	<td style="width:500px; font-weight:bold;">Link</td>
	<td style="width:120px; font-weight:bold;">Durum</td>
</tr>
<tr></tr>
<?php
BaglantiAc();
$sql = mysql_query("select * from reports order by tarih desc");
while($cek = mysql_fetch_array($sql)){
	$li = $cek["icerik_link"];
	$id = $cek["id"];
if($cek["durum"] == 0) $dyaz = "<li class=\"edit\"><a target=\"_blank\" href=\"yonetim.php?s=BildirimBak&link=$li&id=$id\" class=\"button icon clock\">Kontrol Et</a></li>";
elseif($cek["durum"]== 1) $dyaz = "<li class=\"edit\"><a href=\"#\" class=\"button icon approve\">Bakıldı</a></li>";
	echo '
	<tr>
		<td style="width:100px">'.ucwords($cek["icerik_tur"]).'</td>
		<td style="width:500px"><a href="'.$cek["icerik_link"].'" target="_blank">'.kisalt($cek["icerik_link"],50,"").'</a></td>
		<td style="width:100px">'.$dyaz.'</td>
	</tr>
	';
}
BaglantiKapat();
?>
</table>
</div>
<div style="clear:both;"></div>
