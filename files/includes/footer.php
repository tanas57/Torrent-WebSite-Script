	<div id="footer">
		<div id="footLeft">
		<img src="<?php echo $site_adres; ?>/files/images/style/logo2.png" width="250" height="53" alt="<?php echo $site_baslik;?> Logo" />
		</div>
		<div id="footCenter">
		<?php echo $site_baslik; ?> sunucularında film,dizi,oyun veya program saklamaz. Yandex ve Google'nın sunucularında yüklenmiş verilerin paylaşımını yapar. Telif hakkı size ait olan bir eser için <a href="<?php echo $site_adres;?>/iletisim/" title="İletşim / Contact">"Bize Ulaşın (Contact)"</a> sayfasından bizimle irtibat kurduğunuz takdirde ilgili eser 3 iş günü içerisinde sitemizden kaldırılacaktır.
		</div>
		<div id="footRight">
		<ul>
			<li><a href="<?php echo $site_adres;?>/hakkinda/">Hakkında</a></li>
			<li><a href="<?php echo $site_adres;?>/yasal/">Yasal Uyarı</a></li>
			<li><a href="<?php echo $site_adres;?>/reklam/">Reklam</a></li>
			<li><a href="<?php echo $site_adres;?>/iletisim/">İletişim</a></li>
		</ul>
		</div>
		<div class="temizle"></div>
	</div>
<?php
BaglantiAc();
$tarih		= @date("Y-m-d H:i:s");
$referans	= $_SERVER['HTTP_REFERER'];
$agent 		= $_SERVER['HTTP_USER_AGENT'];
$ip 		= $_SERVER['REMOTE_ADDR'];
$ur 		= $_SERVER['REQUEST_URI'];
mysql_query("insert into logs (tarih,ip,referans,uri,agent) values ('$tarih','$ip','$referans','$ur','$agent')");
BaglantiKapat();
?>