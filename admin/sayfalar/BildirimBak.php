<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
	<h3 class="anabaslik"> Bildirim Kontrol </h3>
<?php
$id = $_GET["id"];
$link = $_GET["link"];
BaglantiAc();
mysql_query("update reports set durum='1' where id='$id'");
Yonlendir($link,0);
BaglantiKapat();

?>
</div>
<div style="clear:both;"></div>
