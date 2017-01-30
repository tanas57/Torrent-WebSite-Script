<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"><?php echo "Yönetici Sil"; ?> </h3>
<?php
$yonetici_gelen		=	$_GET["id"];
$yonetici_sil		=	mysql_query("delete from yoneticiler where id=$yonetici_gelen");
	if ($yonetici_sil == true)
	{
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Seçilen slider başarıyla silindi.</span></div>";
	}
	else
	{
		echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata slider silinemedi!</span></div>";
	}
?>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>