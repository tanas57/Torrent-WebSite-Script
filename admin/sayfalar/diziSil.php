<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
?>
<div class="yanyana">
<?php
if($_POST == TRUE){
	BaglantiAc();
	$id  = $_GET["id"];
	
	// Hangi dizi ise onu seç.
	// o dizinin tüm bölümlerini sil.
	$sql = mysql_query("select id,seo,copySeo from dizi_bolumler where dizi_id='$id'");
	while($cek = mysql_fetch_array($sql)){
		$bolumID = $cek["id"];
		// çekilen idleri silelim.
		if($cek["copySeo"] == "0") $seo = $cek["seo"];
		else $seo = $cek["copySeo"];
	
		// kapak sil.
		$dizin1 = '../files/images/series/covers/';
		$dizin2 = '../files/images/series/images/';
		@unlink($dizin1.$seo."-kapak.jpg");
		// dizi bölüm resimlerini sil
		for($i=1;$i<=10;$i++){
			@unlink($dizin2.$seo."-$i.jpg");
		}
		
		// dizi bölümü sil
		mysql_query("delete from dizi_bolumler where id='$bolumID'");
	}
	
	$sql2 = mysql_query("select seo from diziler where id='$id'");
	$dizi = mysql_fetch_array($sql2);
	$seo = $dizi["seo"];
	
		// kapak sil.
		$dizin1 = '../files/images/series/covers/';
		$dizin2 = '../files/images/series/images/';
		@unlink($dizin1.$seo."-kapak.jpg");
		// dizi bölüm resimlerini sil
		for($i=1;$i<=10;$i++){
			@unlink($dizin2.$seo."-$i.jpg");
		}
	
	// diziyi tamamen sil.
	$sil = mysql_query("delete from diziler where id='$id'");
	if($sil){
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Dizi başarıyla Silindi.. Yönlendiriliyorsunuz.</span></div>";
		Yonlendir('yonetim.php?s=diziler',2);
	}
	else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Dizi Silinemedi .".mysql_error()."</span></div>";

	BaglantiKapat();
}
?>
	<h3 class="anabaslik"> Film Silinecek </h3>
	<div style="clear:both;"></div>
<form action="" method="post"> 
<p> Az önce silinmesi için tıkladığınız diziyi aşağıdaki butona tıklayarak sistemden tamamen silebilirsiniz. <br/><br/>Dizi ile birlikte resim dosyalarıda silinecektir.  <br/>Dizinin tüm bölümleri silinecektir.<br /><br /><strong>Bu işlemi gerçekten yapmak istiyor musunuz ?</strong></p>
<input type="hidden" name="siliyorz" value="1"/>
<input type="submit" name="sil" value="Filmi tamamen Sil" /> <br/><br/>
</form>
</div>
</div>
<div style="clear:both;"></div>