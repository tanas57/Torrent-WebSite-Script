<?php
if(!isset($_SESSION["login"])){
header("Location:index.php");
}
$yonetici_sifre=@mysql_fetch_array(mysql_query("select * from yoneticiler where yonetici_kullanici='".$_SESSION['kullanici']."'"));
$eski_sifre	=	$yonetici_sifre["yonetici_sifre"];
$yonetici_id=	$yonetici_sifre["id"];
?>
<div class="yanyana">
<h3 class="anabaslik">Şifre Ayarları </h3>
<?php
if ($_POST)
{
	$g_eski_sif		= md5($_POST["sifr"]);
	$g_yeni_sif		= md5($_POST["sifre2"]);
	$g_yeni2_sif	= md5($_POST["sifre3"]);
	if ($_POST["sifr"] =="" || $_POST["sifre2"] == ""  || $_POST["sifre3"] == "")
	{
		echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Lütfen boş alan bırakmayın.</span></div>";
	}
	else
	{
		if ($g_eski_sif != $eski_sifre || $g_eski_sif == "")
		{
			echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Eski şifrenizi yanlış girdiniz.</span></div>";
		}
		else 
		{
			if ($g_yeni_sif	!=$g_yeni2_sif || $g_yeni_sif == "" ||$g_yeni2_sif == "")
			{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Girdiğiniz yeni şifreler uyuşmuyor.</span></div>";
			}
			else
			{
				if ($g_yeni2_sif == "d41d8cd98f00b204e9800998ecf8427e")
				{
				$g_yeni2_sif = $eski_sifre;
				}
				$guncelle = mysql_query("update yoneticiler set yonetici_sifre='$g_yeni2_sif' where id='$yonetici_id'");
				$_SESSION["kullanici"]=$kullanici;
				$_SESSION["sifre"]=$g_yeni2_sif;
				if ($guncelle)
				{				
					echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Ayarlar Başarı İle Kaydedildi!</span></div>";
				}
				else
				{
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Güncelleme başarız oldu..</span></div>";
				}
			}
			
		}
	}
}
?>
	<div class="ortala" style="width:500px; height:auto;">
    <form action="" method="post">
	  <table width="500" border="0">
	    <tr>
	      <td>&#350;ifreniz:</td>
	      <td><label for="sifr"></label>
          <input type="password" name="sifr" id="sifr" /></td>
        </tr>
	    <tr>
	      <td>Yeni &#350;ifre:</td>
	      <td>
	        <label for="sifre2"></label>
	        <input type="password" name="sifre2" id="sifre2" />
	      </td>
        </tr>
	    <tr>
	      <td>Yeni &#351;ifre tekrar:</td>
	      <td><label for="sifre3"></label>
          <input type="password" name="sifre3" id="sifre3" /></td>
        </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td><input type="submit" name="ok" id="ok" value="Bilgileri G&uuml;ncelle" /></td>
        </tr>
      </table>
      </form>
	  <br />
  </div>


</div>
</div><div style="clear:both;"></div>