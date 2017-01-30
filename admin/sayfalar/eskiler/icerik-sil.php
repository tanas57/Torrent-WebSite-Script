<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"><?php echo "İçerik Sil"; ?> </h3>
<?php
$gelen	=	$_GET["id"];
$sil	=	mysql_query("delete from icerikler where id=$gelen");
	if ($sil == true)
	{
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Seçilen içerik başarıyla silindi.</span></div>";
	}
	else
	{
		echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata içerik silinemedi!</span></div>";
	}
?>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>