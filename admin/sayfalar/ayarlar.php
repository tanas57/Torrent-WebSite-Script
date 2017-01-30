<?php
include "baglan.php";
$ayar_sql	=	mysql_query("select * from ayarlar");
$ayar_getir	=	mysql_fetch_array($ayar_sql);

	$title		=	"FullTorrentler";
	$desc		=	$ayar_getir["site_description"];
	$keyw		=	$ayar_getir["site_keywords"];
	$metalar	=	$ayar_getir["site_metalar"];
?>