<?php
include "sayfalar/ayarlar.php";
session_start();
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
include "sayfalar/ust.php";
$gelen	=	@$_GET["s"];
switch ($gelen)
{
	case "Bildirimler":
	include "sayfalar/rapor.php";
	break;
	
	case "BildirimBak":
	include "sayfalar/BildirimBak.php";
	break;
	
	case "Loglar":
	include "sayfalar/log.php";
	break;
	
	case "ReklamAyar":
	include "sayfalar/ReklamAyar.php";
	break;
	
	case "programlar":
	include "sayfalar/programlar.php";
	break;
	
	case "programDuzenle":
	include "sayfalar/programDuzenle.php";
	break;
	
	case "programSil":
	include "sayfalar/programSil.php";
	break;
	
	case "programKategoriSil":
	include "sayfalar/programKategoriSil.php";
	break;
	
	case "filmler":
	include "sayfalar/filmler.php";
	break;
	
	case "oyunlar":
	include "sayfalar/oyunlar.php";
	break;
	
	case "filmKategoriSil":
	include "sayfalar/filmKategoriSil.php";
	break;
	
	case "diziKategoriSil":
	include "sayfalar/diziKategoriSil.php";
	break;
	
	case "oyunKategoriSil":
	include "sayfalar/oyunKategoriSil.php";
	break;
	
	case "oyunDuzenle":
	include "sayfalar/oyunDuzenle.php";
	break;
	
	case "oyunSil":
	include "sayfalar/oyunSil.php";
	break;
	
	case "SurumSil":
	include "sayfalar/SurumSil.php";
	break;
	
	case "diziSil":
	include "sayfalar/diziSil.php";
	break;
	
	case "diziBolumSil":
	include "sayfalar/diziBolumSil.php";
	break;
	
	case "filmSil":
	include "sayfalar/filmSil.php";
	break;
	
	case "hesap":
	include "sayfalar/hesap.php";
	break;
	
	case "AnasayfaAyar":
	include "sayfalar/AnasayfaAyar.php";
	break;
	
	case "SidebarAyar":
	include "sayfalar/SidebarAyar.php";
	break;
	
	case "SayfalamaAyar":
	include "sayfalar/SayfalamaAyar.php";
	break;
	
	case "YorumSil":
	include "sayfalar/YorumSil.php";
	break;
	
	case "diziBolumler":
	include "sayfalar/diziBolumler.php";
	break;
	
	case "diziBolumDuzenle":
	include "sayfalar/diziBolumDuzenle.php";
	break;
	
	case "diziBolumKopya":
	include "sayfalar/diziBolumKopya.php";
	break;
	
	case "filmBekleyen":
	include "sayfalar/filmBekleyen.php";
	break;
	
	case "diziler":
	include "sayfalar/diziler.php";
	break;
	
	case "diziDuzenle":
	include "sayfalar/diziDuzenle.php";
	break;
	
	case "filmDuzenle":
	include "sayfalar/filmDuzenle.php";
	break;
	
	case "filmKopya":
	include "sayfalar/filmKopya.php";
	break;
	
	case "filmKopyaDuzenle":
	include "sayfalar/filmKopyaDuzenle.php";
	break;
	
	case "ayarlar":
	include "sayfalar/genel-ayarlar.php";
	break;
	
	case "surumEkle":
	include "sayfalar/surumEkle.php";
	break;
	
	case "surumler":
	include "sayfalar/surumler.php";
	break;
	
	case "surumDuzenle":
	include "sayfalar/surumDuzenle.php";
	break;
	
	case "editorDizi":
	include "sayfalar/editorDizi.php";
	break;
	
	case "":
	include "sayfalar/orta.php";
	break;
	
	case "hesabim":
	include "sayfalar/hesabim.php";
	break;
	
	case "cikis":
	include "sayfalar/cikis.php";
	break;
	
	case "filmler":
	include "sayfalar/personel.php";
	break;
	
	case "filmEkle":
	include "sayfalar/filmEkle.php";
	break;
	
	case "oyunEkle":
	include "sayfalar/oyunEkle.php";
	break;
	
	case "programEkle":
	include "sayfalar/programEkle.php";
	break;
	
	case "diziEkle":
	include "sayfalar/diziEkle.php";
	break;
	
	case "diziBolumEkle":
	include "sayfalar/diziBolumEkle.php";
	break;
	
	case "filmKategoriler":
	include "sayfalar/filmKT.php";
	break;
	
	case "filmKategoriDuzenle":
	include "sayfalar/filmKTDZ.php";
	break;
	
	case "diziKategoriler":
	include "sayfalar/dizikategoriler.php";
	break;
	
	case "diziKategoriDuzenle":
	include "sayfalar/dizikategoriduzenle.php";
	break;
	
	case "oyunKategoriler":
	include "sayfalar/oyunkategoriler.php";
	break;
	
	case "oyunKategoriDuzenle":
	include "sayfalar/oyunkategoriduzenle.php";
	break;
	
	case "programKategoriler":
	include "sayfalar/programkategoriler.php";
	break;
	
	case "programKategoriDuzenle":
	include "sayfalar/programkategoriduzenle.php";
	break;
	
	case "oyunKategoriEkle":
	include "sayfalar/oyunkategoriekle.php";
	break;
	
	case "filmKategoriEkle":
	include "sayfalar/filmkategoriekle.php";
	break;
	
	case "diziKategoriEkle":
	include "sayfalar/dizikategoriekle.php";
	break;
	
	case "programKategoriEkle":
	include "sayfalar/programkategoriekle.php";
	break;
	
	case "yorumlar":
	include "sayfalar/yorumlar.php";
	break;
	
	case "yorumlarDuzenle":
	include "sayfalar/yorumlarduzenle.php";
	break;
	
	case "yoneticiler":
	include "sayfalar/yoneticiler.php";
	break;
	
	case "yonetici-duzenle":
	include "sayfalar/yonetici-duzenle.php";
	break;
	
	case "yonetici-sil":
	include "sayfalar/yonetici-sil.php";
	break;
	
	case "yonetici-ekle":
	include "sayfalar/yonetici-ekle.php";
	break;
	
	default:
	include "sayfalar/hata.php";
	break;
}
include "sayfalar/alt.php";
?>