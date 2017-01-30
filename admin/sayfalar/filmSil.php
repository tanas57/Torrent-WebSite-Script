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
	// resimleri sil..
	$cek = mysql_fetch_array(mysql_query("select seo,copySeo from filmler where id='$id'"));
	if($cek["copySeo"] == "0") $seo = $cek["seo"];
	else $seo = $cek["copySeo"];
	
	// kapak sil.
	$dizin1 = '../files/images/film/covers/';
	$dizin2 = '../files/images/film/images/';
	@unlink($dizin1.$seo."-kapak.jpg");
	
	for($i=1;$i<=10;$i++){
		@unlink($dizin2.$seo."-$i.jpg");
	}
	
	$sil = mysql_query("delete from filmler where id='$id'");
	if($sil){
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film başarıyla Silindi.. Yönlendiriliyorsunuz.</span></div>";
		Yonlendir('yonetim.php?s=filmler&a=1',2);
	}
	else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Film Silinemedi .".mysql_error()."</span></div>";

	BaglantiKapat();
}
?>
	<h3 class="anabaslik"> Film Silinecek </h3>
	<div style="clear:both;"></div>
<form action="" method="post"> 
<p> Az önce silinmesi için tıkladığınız film aşağıdaki butona tıklayarak sistemden tamamen silebilirsiniz. Film ile birlikte resim dosyalarıda silinecektir.  <br /><br /><strong>Bu işlemi gerçekten yapmak istiyor musunuz ?</strong></p>
<input type="hidden" name="siliyorz" value="1"/>
<input type="submit" name="sil" value="Filmi tamamen Sil" /> <br/><br/>
</form>
</div>
</div>
<div style="clear:both;"></div>