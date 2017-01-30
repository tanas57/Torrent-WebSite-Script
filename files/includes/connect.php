<?php

		$sunucu = "localhost";
		$kullan = "root";
		$veri	= "torrent";
		$pass   = "";
		
		$baglan = mysql_connect($sunucu,$kullan,$pass) or die("Mysql connect ERROR!");
		mysql_select_db($veri,$baglan) or die("Datebase connect ERROR!");
		mysql_query("SET NAMES UTF8");		

?>