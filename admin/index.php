<?php
include "sayfalar/ayarlar.php";
session_start();
ob_start();
if(isset($_SESSION["login"])){
header("Location:yonetim.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yönetim Paneli Girişi - <?php echo $title; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="POST">
<div id="site">
<div id="sitebosluk"></div>
<div id="ortainput">
<div id="kullaniciadi"><label>Kullanıcı Adı</label>
<div id="kullaniciadiinput"><input name="kullaniciadi" size="20px" type="text" /></div>
</div>

<div id="sifre">
<label>Şifre</label>
<div id="sifreinput"><input type="password" name="sifre" size="20px" /></div>
</div>
<div id="alt">
<div id="hata">
<?php
	if ( $_POST == true )
	{
		$kullanici	= $_POST["kullaniciadi"];
		$sifre		= $_POST["sifre"];
		if ( $kullanici == "" || $sifre == "")
		{
			echo "<img src=\"images/hata.png\" alt=\"\" /> <a>Hata :</a> boş alanları doldurun!";
		}
		else
		{
			$kullanici  = strtolower($kullanici);
			$sifre		= md5($sifre);
			$kontrol	= mysql_query("select * from yoneticiler where yonetici_kullanici='$kullanici'");
			if (mysql_num_rows($kontrol) == 1)
			{
				$yonetici_kontrol = mysql_fetch_array($kontrol);
				$yonetici_sifre	=	$yonetici_kontrol["yonetici_sifre"];
				$yonetici_durum	=	$yonetici_kontrol["yonetici_durum"];
					if ($yonetici_durum != 1)
					{
						echo "<img src=\"images/hata.png\" alt=\"\" /> <a>Hata :</a> yasaklanmış yonetici girişi!";
					}
					else
					{
						if ($yonetici_sifre == $sifre)
						{
							$_SESSION["login"] = "true";
							$_SESSION["kullanici"] = $kullanici;
							$_SESSION["sifre"] = $yonetici_sifre;
							$_SESSION["durum"] = $yonetici_durum;
							echo "<img src=\"images/tik.png\" alt=\"\" /> <a>Bilgi :</a> giriş başarılı, yönlendiriliyorsununuz...";
							header("Refresh: 2; url=yonetim.php");
						}
						else
						{
							echo "<img src=\"images/hata.png\" alt=\"\" /> <a>Hata :</a> lütfen kullanıcı adı ve şifrenizi kontol edin";
						}
						
					}
			}
			else
			{
				echo "<img src=\"images/hata.png\" alt=\"\" /> <a>Hata :</a> kullanıcı bulunamadı!";
			}
		}
	}
?>
</div>
<div id="girisyap"><input type="submit" class="el-buton" /></div>
</div>
</div>
</div>
</form>

</body>
</html>
