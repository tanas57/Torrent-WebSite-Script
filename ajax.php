<?php
if($_GET == TRUE){
	$islem = $_GET["islem"];
	$tarih = @date("Y-m-d H:i:s");
	$ip_adresi=$_SERVER['REMOTE_ADDR'];
	/*
	$id2   = @$_GET["hile"];
	
	$hostname2=$_SERVER['HTTP_USER_AGENT'];
	*/
include "files/includes/functions.php";
switch($islem)
{

	
	case 1:
	$cat = $_GET["cat"];
	echo '<option value="0">Seçiniz</option>';
		BaglantiAc();
		if($cat == "film") {
			
			$sql = mysql_query("select id,adi from film_turleri order by adi asc");
			while($cek = mysql_fetch_array($sql)){
				$id2 = $cek["id"];
				$say = mysql_num_rows(mysql_query("select id from filmler where turu like '%\'$id2\'%' and durum='1'"));
				if($say > 0){
					echo '
					<option value="'.$cek["id"].'">'.$cek["adi"].'</option>
					';
				}
			}
		}
		elseif($cat == "oyun") {
		$sql = mysql_query("select id,adi from oyun_turleri order by adi asc");
			while($cek = mysql_fetch_array($sql)){
				$id2 = $cek["id"];
				$say = mysql_num_rows(mysql_query("select id from oyunlar where turu='$id2' and durum='1'"));
				if($say > 0){
					echo '
					<option value="'.$cek["id"].'">'.$cek["adi"].'</option>
					';
				}
			}
		}
		elseif($cat == "program") {
		$sql = mysql_query("select id,adi from program_turleri order by adi asc");
		while($cek = mysql_fetch_array($sql)){
				$id2 = $cek["id"];
				$say = mysql_num_rows(mysql_query("select id from programlar where turu='$id2' and durum='1'"));
				if($say > 0){
					echo '
					<option value="'.$cek["id"].'">'.$cek["adi"].'</option>
					';
				}
			}
		}
		elseif($cat == "dizi") {
		$sql = mysql_query("select id,adi from dizi_turleri order by adi asc");
		while($cek = mysql_fetch_array($sql)){
				$id2 = $cek["id"];
				$say = mysql_num_rows(mysql_query("select * from diziler where turu like '%\'$id2\'%' and durum='1'"));
				if($say > 0){
					echo '
					<option value="'.$cek["id"].'">'.$cek["adi"].'</option>
					';
				}
			}
		}
		
		BaglantiKapat();
	break;
	
	case 2:
	$tur = $_GET["tur"];
	$seo = $_GET["id"];
	$link= $site_adres.'/torrent-'.$tur.'/'.$seo.'.html';
	BaglantiAc();
	mysql_query("insert into reports (icerik_id,icerik_link,icerik_tur,tarih,ip,durum) values ('$seo','$link','$tur','$tarih','$ip_adresi','0')");
	BaglantiKapat();
	break;
	
	case 3:
	$seo = $_GET["id"];
	$tur = $_GET["sec"];
	BaglantiAc();
	if($tur == "1") mysql_query("update filmler set sayac_indirilme=sayac_indirilme+1 where seo='$seo'");
	elseif($tur == "2") mysql_query("update oyunlar set sayac_indirilme=sayac_indirilme+1 where seo='$seo'");
	elseif($tur == "3") mysql_query("update programlar set sayac_indirilme=sayac_indirilme+1 where seo='$seo'");
	elseif($tur == "4") mysql_query("update dizi_bolumler set sayac_indirilme=sayac_indirilme+1 where seo='$seo'");
	BaglantiKapat();
	break;
}
}
else{
	#header("Location: http://www.hilesindir.com");
	exit;
}
?>
