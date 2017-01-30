<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana" style="width:1150px; margin-left:0px;">
	<h3 class="anabaslik" style="margin-left:320px"> Linkleri Kontrol et.. </h3>
	<div style="clear:both;"></div>
<table style="witdh:1150px;">
<tr>
	<td style="width:200px; font-weight:bold;">User-Agent</td>
	<td style="width:200px; font-weight:bold;">Sayfa</td>
	<td style="width:100px; font-weight:bold;">Ref</td>
	<td style="width:200px; font-weight:bold;">İP</td>
</tr>
<tr></tr>
<?php
BaglantiAc();
$sql = mysql_query("select * from logs order by id desc");
while($cek = mysql_fetch_array($sql)){
	
	echo '
	<tr>
		<td style="width:200px">'.ucwords($cek["agent"]).'</td>
		<td style="width:200px">'.$site_adres.$cek["uri"].'</td>
		<td style="width:100px">'.kisalt($cek["referans"],70,"").'</td>
		<td style="width:200px">'.$cek["ip"].'</td>
	</tr>
	<tr></tr>
	';
}
BaglantiKapat();
?>
</table>
</div>
<div style="clear:both;"></div>
