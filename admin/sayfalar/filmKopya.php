<div class="yanyana">
	<h3 class="anabaslik"> Filmler </h3>
	<div style="clear:both;"></div>
	<?php
	$id	= $_GET["id"];
	BaglantiAc();
	$sql = mysql_query("SELECT * FROM `filmler` WHERE id='$id'");
	$bilg = mysql_fetch_array($sql);
		$seo	 	= $bilg["seo"];
		$baslik 	= mysql_real_escape_string($bilg["adi"]);
		$aciklama   = mysql_real_escape_string($bilg["aciklama"]);
		$icerik	    = mysql_real_escape_string($bilg["icerik"]);
		$turu	    = mysql_real_escape_string($bilg["turu"]);
		$surum	    = $bilg["surum"];
		$imdb	    = $bilg["imdb"];
		$boyut	    = $bilg["boyut"];
		$kalite	    = $bilg["kalite"];
		$seriMi	    = $bilg["seriMi"];
		$yili	    = $bilg["yili"];
		$eklenme    = $bilg["eklenme"];
		$link1    	= $bilg["link1"];
		$link2    	= $bilg["link2"];
		$fragman   	= $bilg["fragman"];
		$altyazi1   = $bilg["altyazi1"];
		$altyazi2 	= $bilg["altyazi2"];
		$user 	= $bilg["user"];
		
	$kopyala = mysql_query("INSERT INTO filmler(adi,seo,copySeo,aciklama,icerik,turu,surum,imdb,boyut,kalite,eklenme,seriMi,yili,link1,link2,fragman,altyazi1,altyazi2,user) VALUES ('$baslik','$seo','$seo','$aciklama','$icerik','$turu','$surum','$imdb','$boyut','$kalite','$eklenme','$seriMi','$yili','$link1','$link2','$fragman','$altyazi1','$altyazi2','$user')");
	if($kopyala){
		$yid = mysql_insert_id();
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film kopyalandi ! </span></div><br/> <a href='yonetim.php?s=filmKopyaDuzenle&id=$yid'>TIKLA DUZENLE</a>";
	}
	else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Kopyalanamadý ! ..</span></div> ".mysql_error();
	BaglantiKapat();
	
	?>
</div>
<div style="clear:both;"></div>