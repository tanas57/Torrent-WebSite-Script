<?php
$host='localhost';
$kullanici='root';
$veritabani='torrent';
$sifre='';


$baglan=@mysql_connect($host,$kullanici,$sifre);

if(! $baglan) die ("Bağlantı kurulamadı!");

mysql_select_db($veritabani,$baglan) or die ("Veri tabanına bağlanılamadı!");
mysql_query("SET NAMES 'utf-8'");
mysql_query("SET CHARACTER SET utf-8");
?>