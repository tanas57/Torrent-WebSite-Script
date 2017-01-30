<div class="yanyana">
	<h3 class="anabaslik"> Diziler </h3>
	<div style="clear:both;"></div>
	<?php
	$id	= $_GET["id"];
	BaglantiAc();
	$sql = mysql_query("SELECT * FROM `dizi_bolumler` WHERE id='$id'");
	$bilg = mysql_fetch_array($sql);
		
		$adi 		= mysql_real_escape_string($bilg["adi"]);
		$seo	 	= $bilg["seo"];
		$dizi_id	= $bilg["dizi_id"];
		$sezon		= $bilg["sezon"];
		$bolum		= $bilg["bolum"];
		$aciklama   = mysql_real_escape_string($bilg["aciklama"]);
		$icerik	    = mysql_real_escape_string($bilg["icerik"]);
		$surum	    = $bilg["surum"];
		$kalite	    = $bilg["kalite"];
		$boyut	    = $bilg["boyut"];
		$link1    	= $bilg["link1"];
		$link2    	= $bilg["link2"];
		$fragman   	= $bilg["fragman"];
		$eklenme    = $bilg["eklenme"];
		$user 		= $bilg["user"];
		
	$kopyala = mysql_query("INSERT INTO dizi_bolumler(adi,seo,copySeo,dizi_id,sezon,bolum,aciklama,icerik,surum,boyut,kalite,eklenme,link1,link2,fragman,user) VALUES ('$adi','$seo','0','$dizi_id','$sezon','$bolum','$aciklama','$icerik','$surum','$boyut','$kalite','$eklenme','$link1','$link2','$fragman','$user')");
	if($kopyala){
		$yid = mysql_insert_id();
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi bolum kopyalandi ! </span></div><br/> <a href='yonetim.php?s=diziBolumDuzenle&id=$yid&a=1'>TIKLA DUZENLE</a>";
	}
	else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Kopyalanamadý ! ..</span></div> ".mysql_error();
	BaglantiKapat();
	
	?>
</div>
<div style="clear:both;"></div>