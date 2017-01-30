<div class="yanyana">

<?php
	$id = $_GET["id"];
		BaglantiAc();
		$sql = mysql_query("SELECT * FROM filmler WHERE id='$id'");
		
		$bilg = mysql_fetch_array($sql);
		
		
		$baslik 	= $bilg["adi"];
		$aciklama   = mysql_real_escape_string($bilg["aciklama"]);
	if($_POST== TRUE){
		
		$surum		= $_POST["surum"];
		$surum1		= "";
		$Q=0;
		foreach ($surum as $key ) {if($Q==0){$surum1 = $key;}else{$surum1 = $surum1.' '.$key;}$Q++;}
		$surum1 	= rtrim($surum1," ");
		$kalite 	= $_POST["kalite"];
		$seo 		= seolink($baslik).'-'.strtolower(FilmKalite($kalite)).'-indir';
		
		$boyut	    = strtoupper($_POST["boyut"]);
		$link1    	= $_POST["link1"];
		$link2    	= $_POST["link2"];
		$eklenme  = date("Y-m-d H:i:s");
		$kopyala = mysql_query("update filmler set seo='$seo',aciklama='$aciklama',surum='$surum1',kalite='$kalite',boyut='$boyut',link1='$link1',link2='$link2',eklenme='$eklenme',durum='1' where id='$id'");
		if($kopyala){
		$yid = mysql_insert_id();
		echo "<div class=\"uyar basarili\"><img src=\"images/icon/basarili.png\"><span>Film başarıyla kopyalanıp güncellendi ! </span></div>";
		}
		else echo "<div class=\"uyar error\"><img src=\"images/icon/errors.png\"><span>Kopyalanamadı ! ..</span></div> ".mysql_error();
		
		
		BaglantiKapat();
	}
?>

<h3 class="anabaslik"> <?php echo $baslik; ?> Filmi Onayla :) </h3>


<form action="" method="post" enctype="multipart/form-data">

	<div style="width:250px; float:left; margin-right:44px;">
		<div class="urun-baslik">
		<h4>Film Açıklaması : </h4>
		<input style="height:60px;" name="aciklama" type="text" value="<?php echo $aciklama; ?>" size="25" maxlength="300" />
		</div>
		<div class="urun-baslik">
		<h4>Kalite : </h4>
				<select name="kalite" >
					<option value="1">1080p</option>
					<option value="2">720p</option>
					<option value="3">480p</option>
					<option value="4">360p</option>
					<option value="5">Bilinmiyor</option>
				</select>
		</div>
		<div class="urun-baslik">
					<h4>Link1 (Google Drive) : </h4>
					<input name="link1" type="text" value="" size="25" maxlength="150" />
				</div>
			
				<div class="urun-baslik">
					<h4>Link2 (Yandex Disk)  : </h4>
					<input name="link2" type="text" value="" size="25" maxlength="150" />
				</div>
	</div>

			
			
			<div style="width:250px; float:left;">
			
			
			<div class="urun-baslik">
				<h4>Film Sürüm : </h4>
				<select multiple="multiple" name="surum[]" style="width:200px; height:150px;">
					<?php
					BaglantiAc();
					$sql = mysql_query("select * from surumler where turu='film' order by adi asc");
					while($yaz = mysql_fetch_array($sql)){
						echo '
						<option value="'.$yaz["adi"].'">'.$yaz["adi"].'</option>
						';
					}
					BaglantiKapat();
					?>
				</select>
			</div>
			
				<div class="urun-baslik">
				<h4>Dosya Boyutu : </h4>
				<input type="text" name="boyut" size="20" maxlength="150" /> 
		</div>
			</div>
			
			
			<div style="width:300px; float:left;">
			
			
			
			</div>
				
			<input type="hidden" name="bok" />
			<input style="margin-top:15px; margin-bottom:33px; height:44px;" type="submit" value="Filmi paylaş" />

	</form>
</div>
<div style="clear:both;"></div>