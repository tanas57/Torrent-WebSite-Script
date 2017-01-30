<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"><?php echo "Bebek Bildirimi Onay Kaldırma"; ?> </h3>
<?php
$gelen	=	$_GET["id"];
$urun_sil	=	mysql_query("update bebekbildirimleri set bebek_durum='0' where id=$gelen");
	if ($urun_sil == true)
	{
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Bildirimin onayı başarıyla kaldırıldı.</span></div>";
	}
	else
	{
		echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata bildirimin onayı kaldırılamadı!</span></div>";
	}
?>
<center>
<a href="yonetim.php?s=bebekler">Geri Dön</a>
</center>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>