<?php ob_start(); ?>
<div class="yanyana">
<h3 class="anabaslik"> Yeni Yönetici Ekle </h3>
<?php
	if ($_POST == true)
	{
		$yonetici_kullanici		=	$_POST["yonetici_kullanici"];
		$yonetici_sifre			=	$_POST["yonetici_sifre"];
		$yonetici_sifre2		=	$_POST["yonetici_sifre2"];
			
			if ($yonetici_kullanici != "" || $yonetici_sifre != "" || $yonetici_sifre2 != "")
			{
				if ($yonetici_sifre == $yonetici_sifre2)
				{
					$yonetici_sifre = md5($yonetici_sifre);
					$yonetici_durum = 1 ;
					$yonetici_ekle	=	mysql_query("insert into yoneticiler values ('','$yonetici_kullanici','$yonetici_sifre','$yonetici_durum')");
					if($yonetici_ekle == true)
					{
						echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Yönetici Başarı İle Eklendi!</span></div>";
					}
					else
					{
						echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Yönetici eklenemedi!</span></div>";
					}
				}
				else
				{
					echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Yönetici eklenemedi!</span></div>";
				}
			}
			else
			{
				echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Boş alanları doldurun!</span></div>";
			}			
		}
?>
<form action="" method="post">
<div class="ortala">
	  <table width="300" border="0">
	    <tr>
	      <td width="120">Kullanıcı Adı:</td>
	      <td width="170"><label for="yonetici_kullanici"></label>
          <input type="text" name="yonetici_kullanici" id="yonetici_kullanici" value="" /></td>
        </tr>
	    <tr>
	      <td>Şifre:</td>
	      <td><label for="yonetici_sifre"></label>
          <input type="password" name="yonetici_sifre" id="yonetici_sifre" /></td>
        </tr>
	    <tr>
	      <td>Tekrar Şifre:</td>
	      <td>
	        <label for="yonetici_sifre2"></label>
	        <input type="password" name="yonetici_sifre2" id="yonetici_sifre2" />
	      </td>
        </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td><input type="submit" name="ok" id="ok" value="Yönetici Ekle" /></td>
        </tr>
      </table>
</div>
      </form>
</div>
<div style="clear:both;"></div>

<?php ob_end_flush(); ?>