<?php
error_reporting(0);

BaglantiAc();
// Site Ayar
$site_bilgi_sql = mysql_query("select * from ayarlar");
$site_bilgi		= mysql_fetch_array($site_bilgi_sql);
$site_baslik 	= $site_bilgi["site_title"];
$site_aciklama	= $site_bilgi["site_description"];
$site_anahtar	= $site_bilgi["site_keywords"];
$site_adres 	= $site_bilgi["site_adres"];
$site_meta 		= $site_bilgi["site_metalar"];

// Anasayfa Ayar
$indexEnCokInd 	= $site_bilgi["indexEnCokInd"];
$indexFilmSayi 	= $site_bilgi["indexFilmSayi"];
$indexOyunSayi 	= $site_bilgi["indexOyunSayi"];
$indexDiziBlmSy = $site_bilgi["indexDiziBolumSayi"];
$indexProgramSy = $site_bilgi["indexProgramSayi"];

// Sidebar Ayar
$Sidebar1Baslik 	= $site_bilgi["Sidebar1Baslik"];
$Sidebar1Icerik 	= $site_bilgi["Sidebar1Icerik"];
$Sidebar2Baslik 	= $site_bilgi["Sidebar2Baslik"];
$Sidebar3Baslik 	= $site_bilgi["Sidebar3Baslik"];
$Sidebar3Sayi 		= $site_bilgi["Sidebar3Sayi"];
$Sidebar4Baslik 	= $site_bilgi["Sidebar4Baslik"];
$Sidebar4Dizi 		= $site_bilgi["editorDizi"];
$Sidebar5Baslik 	= $site_bilgi["Sidebar5Baslik"];
$Sidebar5Sayi 		= $site_bilgi["Sidebar5Sayi"];
$Sidebar6Baslik 	= $site_bilgi["Sidebar6Baslik"];
$Sidebar6Sayi 		= $site_bilgi["Sidebar6Sayi"];

// Sayfalama Ayar
$FilmSayi 		= $site_bilgi["SayfaFilm"];
$OyunSayi 		= $site_bilgi["SayfaOyun"];
$ProgramSayi 	= $site_bilgi["SayfaProgram"];
$DiziSayi 		= $site_bilgi["SayfaDizi"];

// Reklam Ayar
$reklamKisaltmaDurum 		= $site_bilgi["reklamKisaltmaDurum"];
$reklamKisaltma 			= $site_bilgi["reklamKisaltma"];
$reklamSidebarDurum 		= $site_bilgi["reklamSidebarDurum"];
$reklamSidebar 				= $site_bilgi["reklamSidebar"];
$reklamPosterDurum 			= $site_bilgi["reklamPosterDurum"];
$reklamPoster 				= $site_bilgi["reklamPoster"];
$reklamIcDurum 				= $site_bilgi["reklamIcDurum"];
$reklamIc 					= $site_bilgi["reklamIc"];
$reklamPopupDurum 			= $site_bilgi["reklamPopupDurum"];
$reklamPopup 				= $site_bilgi["reklamPopup"];
$reklamSplashDurum 			= $site_bilgi["reklamSplashDurum"];
$reklamSplash 				= $site_bilgi["reklamSplash"];
$reklamAltDurum 			= $site_bilgi["reklamAltDurum"];
$reklamAlt 					= $site_bilgi["reklamAlt"];
$yatayHeryerDurum 			= $site_bilgi["yatayHeryerDurum"];
$yatayHeryer 				= $site_bilgi["yatayHeryer"];

$bugun = date("Y-m-d");
$yenitarih = strtotime('-1 day',strtotime($bugun));
$yenitarih = date('Y-m-d' ,$yenitarih );
mysql_query("delete from logs where tarih like '%$yenitarih%'");

BaglantiKapat();
/*
$site_baslik 	= "FullTorrentler";
$site_aciklama	= "Full torrent indir";
$site_anahtar	= "full,torrent,torrent indir,torrentler";
*/
$site_icon_adres = $site_adres.'/files/images/style/';
date_default_timezone_set('Europe/Istanbul');

function TarayiciAdres()
{
$adres = 'http://'.$_SERVER['HTTP_HOST' ].$_SERVER['REQUEST_URI'];
return $adres;
}
function kisalt($kelime, $uzunluk, $son=""){
	$kelime = strip_tags($kelime);
	$say	= strlen($kelime); // harfleri saydık
	if($say > $uzunluk){ // uzunluk değşkeninden uzun ise;
		$yeni	= substr($kelime,0,$uzunluk); // büyük olduğunda parçaldık
		$yeni  .= $son; // kelimenin sonuna ekledik.
	}elseif(($say == $uzunluk) or ($say < $uzunluk)){ // küçük yada eşit ise;
		$yeni	=  $kelime; // değişiklilk yapma
	}
	return $yeni;
}
function timeTR($par)
	{
      $explode = explode(" ", $par);
      $explode2 = explode("-", $explode[0]);
      $zaman = substr($explode[1], 0, 5);
      
      if ($explode2[1] == "1") $ay = "Ocak";
      elseif ($explode2[1] == "2") $ay = "Şubat";
      elseif ($explode2[1] == "3") $ay = "Mart";
      elseif ($explode2[1] == "4") $ay = "Nisan";
      elseif ($explode2[1] == "5") $ay = "Mayıs";
      elseif ($explode2[1] == "6") $ay = "Haziran";
      elseif ($explode2[1] == "7") $ay = "Temmuz";
      elseif ($explode2[1] == "8") $ay = "Ağustos";
      elseif ($explode2[1] == "9") $ay = "Eylül";
      elseif ($explode2[1] == "10") $ay = "Ekim";
      elseif ($explode2[1] == "11") $ay = "Kasım";
      elseif ($explode2[1] == "12") $ay = "Aralık";
      
      return $explode2[2]." ".$ay." ".$explode2[0]." ".$zaman;
    }
function timeTR2($par)
	{
      $explode = explode(" ", $par);
      $explode2 = explode("-", $explode[0]);
      $zaman = substr($explode[1], 0, 5);
      
      if ($explode2[1] == "1") $ay = "Ocak";
      elseif ($explode2[1] == "2") $ay = "Şubat";
      elseif ($explode2[1] == "3") $ay = "Mart";
      elseif ($explode2[1] == "4") $ay = "Nisan";
      elseif ($explode2[1] == "5") $ay = "Mayıs";
      elseif ($explode2[1] == "6") $ay = "Haziran";
      elseif ($explode2[1] == "7") $ay = "Temmuz";
      elseif ($explode2[1] == "8") $ay = "Ağustos";
      elseif ($explode2[1] == "9") $ay = "Eylül";
      elseif ($explode2[1] == "10") $ay = "Ekim";
      elseif ($explode2[1] == "11") $ay = "Kasım";
      elseif ($explode2[1] == "12") $ay = "Aralık";
      
      return $explode2[2]." ".$ay." ".$explode2[0];
    }
// seo link fonksiyonu
function seolink($baslik){
$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', ' ', '.', '(', ')','-', '0');
$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', '-', '', '', '', '-', '0');
$perma = str_replace($bul, $yap, $baslik);
$perma = preg_replace("@[^A-Za-z0-9\.\-_]@i", '', $perma);
$perma = strtolower($perma);
return $perma;
}
function epostakontrol($mail){
if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
return 1;
} else {
return 0; }
}
function BaglantiAc(){
	include "connect.php";
}
function BaglantiKapat(){
	mysql_close();
}
function FilmTurYaz($id){
	$idler = explode(',',$id);
	BaglantiAc();
	$i=0;
	global $site_adres;
	foreach($idler as $nID){
		preg_match("@'(.*?)'@si",$nID,$de1);
		$nID = $de1[1];
		$sql = mysql_query("select adi,seo from film_turleri where id='$nID'");
		$cek = mysql_fetch_array($sql);
		if($i != 0) echo ' | ';
		echo '<a href="'.$site_adres.'/torrent-film/'.$cek["seo"].'/" title="'.$cek["adi"].' Filmlerini Torrent İndir">'.$cek["adi"].' </a>';
		$i++;
	}
	BaglantiKapat();
}
function DiziTurYaz($id){
	$idler = explode(',',$id);
	BaglantiAc();
	$i=0;
	global $site_adres;
	foreach($idler as $nID){
		preg_match("@'(.*?)'@si",$nID,$de1);
		$nID = $de1[1];
		$sql = mysql_query("select adi,seo from dizi_turleri where id='$nID'");
		$cek = mysql_fetch_array($sql);
		if($i != 0) echo ' | ';
		echo '<a href="'.$site_adres.'/torrent-dizi/'.$cek["seo"].'/" title="'.$cek["adi"].' Dizileri Torrent İndir">'.$cek["adi"].' </a>';
		$i++;
	}
	BaglantiKapat();
}
function FilmKalite($ka){
	if($ka==1)return '1080P';
	elseif($ka==2)return '720P';
	elseif($ka==3)return '480P';
	elseif($ka==4)return '360P';
}
function FilmKaliteResim($film,$ka1,$ass){
	if($ka1==1) echo '<img src="'.$ass.'/1080p.png" width="55" height="55" alt="'.$film.' 1080P Torrent Full İndir" title="'.$film.' 1080P Torrent Full İndir" />';
	elseif($ka1==2)  echo '<img src="'.$ass.'/720p.png" width="55" height="55" alt="'.$film.' 720P Torrent Full İndir" title="'.$film.' 720P Torrent Full İndir" />';
	elseif($ka1==3)  echo '<img src="'.$ass.'/480p.png" width="55" height="55" alt="'.$film.' 480P Torrent Full İndir" title="'.$film.' 480P Torrent Full İndir" />';
	elseif($ka1==4)  echo '<img src="'.$ass.'/360p.png" width="55" height="55" alt="'.$film.' 360P Torrent Full İndir" title="'.$film.' 360P Torrent Full İndir" />';
}
function AnahtarOlustur($baslik,$kalite){
	$baslik = mb_strtolower($baslik,"UTF-8");
	$olusan = $baslik.' torrent, '.$baslik.' indir, '.$baslik.' full torrent, '.$baslik.' '.$kalite.' indir, '.$baslik.' '.$kalite.' torrent indir, '.$baslik.' '.$kalite.' full torrent indir, '.$kalite.' '.$baslik.' torrent, '.$kalite.' '.$baslik.' full torrent';
	echo $olusan;
}
function IMDBRenk($puan){
	if($puan == "1" || $puan == "2" || $puan == "3" || $puan == "4" || $puan == "5" || $puan == "6" || $puan == "7" || $puan == "8" || $puan == "9") $puan = $puan.".0";
	if($puan > 9) echo '<span style="color:#2a6300;" title="Bu filmin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 8) echo '<span style="color:#3d800b;" title="Bu filmin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 7) echo '<span style="color:#0a298e;" title="Bu filmin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 6) echo '<span style="color:#3258d2;" title="Bu filmin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 5) echo '<span style="color:#849818;" title="Bu filmin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 4) echo '<span style="color:#d829b9;" title="Bu filmin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 3) echo '<span style="color:#ff0000;" title="Bu filmin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 2) echo '<span style="color:#7e0000;" title="Bu filmin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
}
function IMDBRenk2($puan){
	if($puan == "1" || $puan == "2" || $puan == "3" || $puan == "4" || $puan == "5" || $puan == "6" || $puan == "7" || $puan == "8" || $puan == "9") $puan = $puan.".0";
	if($puan > 9) echo '<span style="color:#2a6300;" title="Bu dizinin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 8) echo '<span style="color:#3d800b;" title="Bu dizinin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 7) echo '<span style="color:#0a298e;" title="Bu dizinin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 6) echo '<span style="color:#3258d2;" title="Bu dizinin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 5) echo '<span style="color:#849818;" title="Bu dizinin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 4) echo '<span style="color:#d829b9;" title="Bu dizinin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 3) echo '<span style="color:#ff0000;" title="Bu dizinin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
	elseif($puan > 2) echo '<span style="color:#7e0000;" title="Bu dizinin İMDB Puanı : '.$puan.'">'.$puan.'</span>';
}
function Sayfala($link,$say,$sayfa,$sayfa_sayisi){
global $site_adres;
$link = $site_adres.$link;
$dil_sayfalama_goster	= ". sayfa gösteriliyor";
$dil_sayfalama_ileri 	= "Sonraki sayfa>>";
$dil_sayfalama_geri	 	= "<<Önceki sayfa";

if($sayfa_sayisi > 1){
	// sayfasayısı 1den fazla..
	/*  *
		* hem geri hem ileri olacak
		* sadece ileri olacak
		* sadece geri olacak
	*/
	if($sayfa == $sayfa_sayisi){
		echo'
						<span id="onceki"><a href="'.$link.($sayfa-1).'/">'.$dil_sayfalama_geri.'</a></span>
						';
						echo'
						<span id="orta">'.$sayfa.$dil_sayfalama_goster.'</a></span>
						';
	}
	elseif($sayfa== 1){
		echo'
						<span id="orta">'.$sayfa.$dil_sayfalama_goster.'</a></span>
						';
						
						echo'
						<span id="sonraki"><a href="'.$link.($sayfa+1).'/">'.$dil_sayfalama_ileri.'</a></span>
						';
		
	}
	elseif($sayfa >1 and $sayfa <=$sayfa_sayisi){
		echo'
						<span id="onceki"><a href="'.$link.($sayfa-1).'/">'.$dil_sayfalama_geri.'</a></span>
						';
						echo'
						<span id="orta">'.$sayfa.$dil_sayfalama_goster.'</a></span>
						';
						echo '
						<span id="sonraki"><a href="'.$link.($sayfa+1).'/">'.$dil_sayfalama_ileri.'</a></span>
						';
	}
}
else{
	// tek sayfa var adamım..
	echo '
		<span id="orta">'.$sayfa.$dil_sayfalama_goster.'</a></span>
		';
}

/*
				if($sayfa_sayisi <= $sayfa){
					echo'
						<span id="orta">'.$sayfa.$dil_sayfalama_goster.'</a></span>
						';
				}
				else{
					if($sayfa == 1){
						echo'
						<span id="orta">'.$sayfa.$dil_sayfalama_goster.'</a></span>
						';
						
						echo'
						<span id="sonraki"><a href="'.$link.($sayfa+1).'/">'.$dil_sayfalama_ileri.'</a></span>
						';
					}
					else if($sayfa == $sayfa_sayisi){
						echo'
						<span id="onceki"><a href="'.$link.($sayfa-1).'/">'.$dil_sayfalama_geri.'</a></span>
						';
						echo'
						<span id="orta">'.$sayfa.$dil_sayfalama_goster.'</a></span>
						';
					}
					else{
						echo'
						<span id="onceki"><a href="'.$link.($sayfa-1).'/">'.$dil_sayfalama_geri.'</a></span>
						';
						echo'
						<span id="orta">'.$sayfa.$dil_sayfalama_goster.'</a></span>
						';
						echo '
						<span id="sonraki"><a href="'.$link.($sayfa+1).'/">'.$dil_sayfalama_ileri.'</a></span>
						';
					}	
				}
	*/
	
}
function SiteCek($url){
    $useragent = 'Mozilla/5.0 (compatible; FullTorrentler Link Creator)';
	#$referer = 'http://www.google.com/'; 
	$header[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
	$header[] = "Cache-Control: private, max-age=0";
	$header[] = "Connection: keep-alive";
	$header[] = "Keep-Alive: 115";
	$header[] = "Accept-Charset: ISO-8859-9,utf-8;q=0.7,*;q=0.7";
	$header[] = "Accept-Language: tr-TR,tr;q=0.8,en-us;q=0.5,en;q=0.3";
	$header[] = "Pragma: "; 
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_HTTPHEADER , $header);
	#curl_setopt ($ch, CURLOPT_REFERER, $referer);
	curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
	$return = curl_exec($ch);
	curl_close($ch);  
	return $return;
}
function Yonlendir($url,$zaman){
ob_start();
header("Refresh: $zaman; url=$url");
ob_end_flush();
}
function LinkDuzenle($content) { 
$text = $content; 
preg_match_all("/<a.*? href=\"(.*?)\".*?>(.*?)<\/a>/i", $text, $matches); 
for($i=0;$i<count($matches[0]);$i++){ 
if(!preg_match("/rel=[\"\']*nofollow[\"\']*/",$matches[0][$i])){ 
preg_match_all("/<a.*? href=\"(.*?)\"(.*?)>(.*?)<\/a>/i", $matches[0][$i], $matches1); 
$text = str_replace(">".$matches1[3][0]."</a>"," rel=\"nofollow\">".$matches1[3][0]."</a>",$text); 
} 
} 
return $text; 
}
?>