<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"><?php echo "Ürün Sil"; ?> </h3>
<?php
$urun_gelen	=	$_GET["id"];
$urun_sil	=	mysql_query("delete from urunler where urun_id=$urun_gelen");
	if ($urun_sil == true)
	{
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Seçilen ürün başarıyla silindi.</span></div>";
	}
	else
	{
		echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Hata ürün silinemedi!</span></div>";
	}
?>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>