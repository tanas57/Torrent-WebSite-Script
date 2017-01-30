<?php
ob_start();
if($_POST != TRUE){
		include "files/includes/functions.php";
		Yonlendir($site_adres.'/hata/',0);
		exit;	
}
else{
include "files/includes/functions.php";
$secenek 	= @$_POST["category"];
?><html>
	<head>
	<title> Arama | <?php echo $site_baslik; ?> </title>
	<meta name="robots" content="nofollow,noindex" />
	<meta name="description" content="Torrent arama" />
	<?php include "files/includes/head.php"; ?>
	</head>
<body>
<?php include "files/includes/menu.php"; ?>
<div id="ortala">
<div id="general">
	<div id="LeftSide">
		<div class="BigBox">
			<div id="pageD">
		<h2 class="H1Class"> <?php if($secenek != "0") echo ucwords($secenek); else echo ""; ?> Arama: <?php echo $_POST["torrentAra"]; ?> </h2>
		<?php
			$sayfa = 1;
			$kacar = 20;
			
			$secenek2	= @$_POST["subCategory"];
			$secenek3	= @$_POST["imdbList"];
			BaglantiAc();
			$arama	 	= mysql_real_escape_string($_POST["torrentAra"]);
			$tarih		= @date("Y-m-d H:i:s");
			$referans	= $_SERVER['HTTP_REFERER'];
			$agent 		= $_SERVER['HTTP_USER_AGENT'];
			$ip 		= $_SERVER['REMOTE_ADDR'];
			$ur 		= $_SERVER['REQUEST_URI'];
			mysql_query("insert into logs (tarih,ip,referans,uri,agent,arama) values ('$tarih','$ip','$referans','$ur','$agent','$arama')");
			BaglantiKapat();
			$keys	 = explode(' ',$arama);
			$araAdi = "";
			$araIcrk= "";
			$say = count($keys); $sa = 0;
			foreach($keys as $key){
				if($sa < $say-1){
					$araAdi .= "adi like '%$key%' or ";
					$araIcrk .= "icerik like '%$key%' or ";
				}
				else{
					$araAdi .= "adi like '%$key%'";
					$araIcrk .= "icerik like '%$key%'";
				}
				$sa++;
			}
			$sonucSay = 0;
			if($secenek != "0"){
					$orderr = "order by eklenme desc";
					if($secenek == "film"){
						
						
						BaglantiAc();
						$gosterilen = ($sayfa*$kacar)-$kacar;
						$sqlSayfala = "limit $gosterilen,$kacar";
						
						if($secenek3 == "1") $orderr = "order by imdb desc";
						else $orderr = "order by eklenme desc";
						
						if($secenek2 != "0") $sql = mysql_query("select adi,seo,copySeo,imdb,kalite from filmler where turu like '%\'$secenek2\'%' and durum='1' and $araAdi or $araIcrk $orderr $sqlSayfala");
						else $sql = mysql_query("select adi,seo,copySeo,imdb,kalite from filmler where durum='1' and ($araAdi or $araIcrk)  $orderr $sqlSayfala");
						
						
						$say = mysql_num_rows($sql);
						$sayfa_sayisi = ceil($say/$kacar);
						
						if($say > 0){ 
						if(@$_GET["sayfa"] != "") {
								$sayfa = $_GET["sayfa"];
								if($sayfa>0 && $sayfa <900000){
									//sıkıntı yok.
									if($sayfa > $sayfa_sayisi){
										Yonlendir($site_adres.'/hata/',0);
										exit;
									}
								}
								else{
									Yonlendir($site_adres.'/hata/',0);
									exit;
								}
						}
						
						while($film_cek = mysql_fetch_array($sql)){
						?>
						<div class="film">
							<a href="<?php echo $site_adres; ?>/torrent-film/<?php echo $film_cek["seo"]; ?>.html" title="">
							<?php if($film_cek["copySeo"]=="0"){ ?>
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $film_cek["seo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $film_cek["adi"]; ?> Full Torrent İndir" /></div>
							<?php } else { ?>
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $film_cek["copySeo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $film_cek["adi"]; ?> Full Torrent İndir" /></div>
							<?php } ?>
								<div class="filmImdb">
									<?php echo IMDBRenk($film_cek["imdb"]); ?>
								</div>
								<div class="filmQuality" title="<?php echo ucwords($film_cek["adi"].' '.FilmKalite($film_cek["kalite"])); ?>  Torrent İndir"><?php FilmKaliteResim($film_cek["adi"],$film_cek["kalite"],$site_icon_adres); ?></div>
								<div class="filmName"><?php echo ucwords($film_cek["adi"].' '.FilmKalite($film_cek["kalite"])); ?>  Torrent İndir</div>
							</a>
						</div>
						<?php } 					
						BaglantiKapat();
						}
						else{
							//  yokki
							echo '<p> Arama kelimenize göre film bulunamadı. Lütfen kelimenizi tekrar deneyiniz. Eğer aradığınız sitemizde bulunmadıysa bu bize bildirim olarak geldi. En kısa sürede aradığınız filmi ekleyeceğiz. </p>';
						}
					}
					elseif($secenek == "oyun"){
						
						BaglantiAc();
						
						$gosterilen = ($sayfa*$kacar)-$kacar;
						$sqlSayfala = "limit $gosterilen,$kacar";
						
						$orderr = "order by eklenme desc";
						
						if($secenek2 != "0") $sql = mysql_query("select adi,seo,turu from oyunlar where turu='$secenek2' and durum='1' and $araAdi and $araIcrk $orderr $sqlSayfala");
						else $sql = mysql_query("select adi,seo,turu from oyunlar where durum='1' and ($araAdi or $araIcrk) $orderr $sqlSayfala");
						
						
						$say = mysql_num_rows($sql);
						$sayfa_sayisi = ceil($say/$kacar);
						
						
						if($say > 0){ 
						if(@$_GET["sayfa"] != "") {
								$sayfa = $_GET["sayfa"];
								if($sayfa>0 && $sayfa <900000){
									//sıkıntı yok.
									if($sayfa > $sayfa_sayisi){
										Yonlendir($site_adres.'/hata/',0);
										exit;
									}
								}
								else{
									Yonlendir($site_adres.'/hata/',0);
									exit;
								}
						}
						while($oyuns_cek = mysql_fetch_array($sql)){
						?>
						<div class="film">
							<a href="<?php echo $site_adres; ?>/torrent-oyun/<?php echo $oyuns_cek["seo"]; ?>.html">
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/game/covers/<?php echo $oyuns_cek["seo"];; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $oyuns_cek["adi"]; ?> Full Torrent İndir" /></div>
							<?php
							$turu = $oyuns_cek["turu"];
							$cek = mysql_fetch_array(mysql_query("select adi,seo,icon,site_ad from oyun_turleri where id='$turu'"));
							$catAdi = $cek["adi"]; $catSAdi = $cek["site_ad"]; $catSeo = $cek["seo"]; $catImg = $cek["icon"];
							?>
							<a target="_blank" href="<?php echo $site_adres; ?>/torrent-oyun/<?php echo $catSeo; ?>/" title="<?php echo $catAdi; ?> Oyunları Torrent İndir">
							<div class="oyunTur"><img src="<?php echo $site_adres; ?>/files/images/style/<?php echo $catImg; ?>" width="24" height="24" alt="<?php echo $catAdi; ?> Oyunları Torrent İndir" /><span><?php echo $catSAdi; ?>
							</div>
							</a>
							<div class="filmName"><?php echo $oyuns_cek["adi"]; ?> Full Torrent İndir</div>
							</a>
						</div>
						<?php } 					
						BaglantiKapat();
						}
						else{
							//  yokki
						}
					}
					elseif($secenek == "program"){
						BaglantiAc();
						
						$gosterilen = ($sayfa*$kacar)-$kacar;
						$sqlSayfala = "limit $gosterilen,$kacar";
						
						$orderr = "order by eklenme desc";
						
						if($secenek2 != "0") $sql = mysql_query("select adi,seo,turu from programlar where turu='$secenek2' and durum='1' and $araAdi and $araIcrk $orderr $sqlSayfala");
						else $sql = mysql_query("select adi,seo,turu from programlar where durum='1' and ($araAdi or $araIcrk) $orderr $sqlSayfala");
						
						$say = mysql_num_rows($sql);
						$sayfa_sayisi = ceil($say/$kacar);
						
						if($say > 0){ 
						if(@$_GET["sayfa"] != "") {
								$sayfa = $_GET["sayfa"];
								if($sayfa>0 && $sayfa <900000){
									//sıkıntı yok.
									if($sayfa > $sayfa_sayisi){
										Yonlendir($site_adres.'/hata/',0);
										exit;
									}
								}
								else{
									Yonlendir($site_adres.'/hata/',0);
									exit;
								}
							}
						
						while($oyuns_cek = mysql_fetch_array($sql)){
						?>
						<div class="film">
							<a href="<?php echo $site_adres; ?>/torrent-program/<?php echo $oyuns_cek["seo"]; ?>.html">
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/program/covers/<?php echo $oyuns_cek["seo"];; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $oyuns_cek["adi"]; ?> Torrent İndir" /></div>
							<?php
							$turu = $oyuns_cek["turu"];
							$cek = mysql_fetch_array(mysql_query("select adi,seo,site_ad from program_turleri where id='$turu'"));
							$catAdi = $cek["adi"]; $catSAdi = $cek["site_ad"]; $catSeo = $cek["seo"];
							?>
							<a target="_blank" href="<?php echo $site_adres; ?>/torrent-program/<?php echo $catSeo; ?>/" title="<?php echo $catAdi; ?> Torrent İndir">
							<div class="oyunTur"><span><?php echo $catSAdi; ?></span>
							</div>
							</a>
							<div class="filmName"><?php echo $oyuns_cek["adi"]; ?> Full Torrent İndir</div>
							</a>
						</div>
						<?php } 					
						BaglantiKapat();
						}
						else{
							//  yokki
							echo '<p> Arama kelimenize göre program bulunamadı. Lütfen kelimenizi tekrar deneyiniz. Eğer aradığınız sitemizde bulunmadıysa bu bize bildirim olarak geldi. En kısa sürede aradığınız programı ekleyeceğiz. </p>';
						}
					}
					elseif($secenek == "dizi"){
						
						BaglantiAc();
						
						$gosterilen = ($sayfa*$kacar)-$kacar;
						$sqlSayfala = "limit $gosterilen,$kacar";
						
						if($secenek3 == "1") $orderr = "order by imdb desc";
						else $orderr = "order by eklenme desc";
						
						if($secenek2 != "0"){
							//turu='$secenek2'
							$sql = mysql_query("select adi,seo,kalite from dizi_bolumler where durum='1' and ($araAdi or $araIcrk) $orderr $sqlSayfala");
						}
						else $sql = mysql_query("select adi,seo,kalite from dizi_bolumler where durum='1' and ($araAdi or $araIcrk)  $orderr $sqlSayfala");
						
						$say = mysql_num_rows($sql);
						$sayfa_sayisi = ceil($say/$kacar);
						
						if($say > 0){ 
						if(@$_GET["sayfa"] != "") {
								$sayfa = $_GET["sayfa"];
								if($sayfa>0 && $sayfa <900000){
									//sıkıntı yok.
									if($sayfa > $sayfa_sayisi){
										Yonlendir($site_adres.'/hata/',0);
										exit;
									}
								}
								else{
									Yonlendir($site_adres.'/hata/',0);
									exit;
								}
							}
						
						while($dizi_cek = mysql_fetch_array($sql)){
						?>
						<div class="film">
						<a href="<?php echo $site_adres; ?>/torrent-dizi/<?php echo $dizi_cek["seo"]; ?>.html" title="">
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/series/covers/<?php echo $dizi_cek["seo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $dizi_cek["adi"]; ?> Full Torrent İndir" /></div>
							<div class="filmQuality" title="<?php echo ucwords($dizi_cek["adi"].' '.FilmKalite($dizi_cek["kalite"])); ?>  Torrent İndir"><?php FilmKaliteResim($dizi_cek["adi"],$dizi_cek["kalite"],$site_icon_adres); ?></div>
							<div class="filmName"><?php echo ucwords($dizi_cek["adi"].' '.FilmKalite($dizi_cek["kalite"])); ?>  Torrent İndir</div>
						</a>
						</div>
							<?php } 					
						BaglantiKapat();
						}
						else{
							//  yokki
							echo '<p> Arama kelimenize göre dizi bulunamadı. Lütfen kelimenizi tekrar deneyiniz. Eğer aradığınız sitemizde bulunmadıysa bu bize bildirim olarak geldi. En kısa sürede aradığınız diziyi ekleyeceğiz. </p>';
						}
					}
					
				}
				else{
					
					$sayfa_sayisi = 1;
					BaglantiAc();
					$sql = mysql_query("select adi,seo,copySeo,imdb,kalite from filmler where durum='1' and ($araAdi or $araIcrk) order by id desc limit 8");
					$say = mysql_num_rows($sql);
					if($say > 0){
					echo '<h2 style="float:left; margin-top:10px;" class="H2Class"> Bulunan Filmler </h2>
					<div class="temizle"></div>
					';
					while($film_cek = mysql_fetch_array($sql)){
						?>
						<div class="film">
							<a href="<?php echo $site_adres; ?>/torrent-film/<?php echo $film_cek["seo"]; ?>.html" title="">
								<?php if($film_cek["copySeo"]=="0"){ ?>
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $film_cek["seo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $film_cek["adi"]; ?> Full Torrent İndir" /></div>
							<?php } else { ?>
							<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/film/covers/<?php echo $film_cek["copySeo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $film_cek["adi"]; ?> Full Torrent İndir" /></div>
							<?php } ?>
								<div class="filmImdb">
									<?php echo IMDBRenk($film_cek["imdb"]); ?>
								</div>
								<div class="filmQuality" title="<?php echo ucwords($film_cek["adi"].' '.FilmKalite($film_cek["kalite"])); ?>  Torrent İndir"><?php FilmKaliteResim($film_cek["adi"],$film_cek["kalite"],$site_icon_adres); ?></div>
								<div class="filmName"><?php echo ucwords($film_cek["adi"].' '.FilmKalite($film_cek["kalite"])); ?>  Torrent İndir</div>
							</a>
						</div>
					<?php $sonucsay++; } }
					$sql = mysql_query("select adi,seo,turu from oyunlar where durum='1' and ($araAdi or $araIcrk) order by id desc limit 8");
					$say = mysql_num_rows($sql);
					if($say > 0){
					echo '<div class="temizle"></div>
					<h2 style="float:left; margin-top:10px;" class="H2Class"> Bulunan Oyunlar </h2>
					<div class="temizle"></div>
					';
					while($oyuns_cek = mysql_fetch_array($sql)){ ?>
					<div class="film">
						<a href="<?php echo $site_adres; ?>/torrent-oyun/<?php echo $oyuns_cek["seo"]; ?>.html">
						<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/game/covers/<?php echo $oyuns_cek["seo"];; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $oyuns_cek["adi"]; ?> Full Torrent İndir" /></div>
						<?php
						$turu = $oyuns_cek["turu"];
						$cek = mysql_fetch_array(mysql_query("select adi,seo,icon,site_ad from oyun_turleri where id='$turu'"));
						$catAdi = $cek["adi"]; $catSAdi = $cek["site_ad"]; $catSeo = $cek["seo"]; $catImg = $cek["icon"];
						?>
						<a target="_blank" href="<?php echo $site_adres; ?>/torrent-oyun/<?php echo $catSeo; ?>/" title="<?php echo $catAdi; ?> Oyunları Torrent İndir">
						<div class="oyunTur"><img src="<?php echo $site_adres; ?>/files/images/style/<?php echo $catImg; ?>" width="24" height="24" alt="<?php echo $catAdi; ?> Oyunları Torrent İndir" /><span><?php echo $catSAdi; ?>
						</div>
						</a>
						<div class="filmName"><?php echo $oyuns_cek["adi"]; ?> Full Torrent İndir</div>
						</a>
					</div>
				<?php
					$sonucsay++; }}
					$sql = mysql_query("select adi,seo,turu from programlar where durum='1' and ($araAdi or $araIcrk) order by id desc limit 8");
					$say = mysql_num_rows($sql);
					if($say > 0){
					echo '<div class="temizle"></div>
					<h2 style="float:left; margin-top:10px;" class="H2Class"> Bulunan Programlar </h2>
					<div class="temizle"></div>
					';
					while($programs_cek = mysql_fetch_array($sql)){ ?>
					<div class="film">
						<a href="<?php echo $site_adres; ?>/torrent-program/<?php echo $programs_cek["seo"]; ?>.html">
						<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/program/covers/<?php echo $programs_cek["seo"];; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $programs_cek["adi"]; ?> Torrent İndir" /></div>
						<?php
						$turu = $programs_cek["turu"];
						$cek = mysql_fetch_array(mysql_query("select adi,seo,site_ad from program_turleri where id='$turu'"));
						$catAdi = $cek["adi"]; $catSAdi = $cek["site_ad"]; $catSeo = $cek["seo"];
						?>
						<a target="_blank" href="<?php echo $site_adres; ?>/torrent-program/<?php echo $catSeo; ?>/" title="<?php echo $catAdi; ?> Torrent İndir">
						<div class="oyunTur"><span><?php echo $catSAdi; ?></span>
						</div>
						</a>
						<div class="filmName"><?php echo $programs_cek["adi"]; ?> Full Torrent İndir</div>
						</a>
					</div>
					<?php $sonucsay++; }}
					$sql = mysql_query("select adi,seo,kalite from dizi_bolumler where durum='1' and ($araAdi or $araIcrk) order by id desc limit 8");
					$say = mysql_num_rows($sql);
					if($say > 0){
					echo '<div class="temizle"></div>
					<h2 style="float:left; margin-top:10px;" class="H2Class"> Bulunan Dizi Bölümleri </h2>
					<div class="temizle"></div>
					';
					while($dizi_cek = mysql_fetch_array($sql)){ ?>
					<div class="film">
					<a href="<?php echo $site_adres; ?>/torrent-dizi/<?php echo $dizi_cek["seo"]; ?>.html" title="">
						<div class="filmImg"><img src="<?php echo $site_adres; ?>/img.php?src=<?php echo $site_adres; ?>/files/images/series/covers/<?php echo $dizi_cek["seo"]; ?>-kapak.jpg&w=170&h=250" width="170" height="250" alt="<?php echo $dizi_cek["adi"]; ?> Full Torrent İndir" /></div>
						<div class="filmQuality" title="<?php echo ucwords($dizi_cek["adi"].' '.FilmKalite($dizi_cek["kalite"])); ?>  Torrent İndir"><?php FilmKaliteResim($dizi_cek["adi"],$dizi_cek["kalite"],$site_icon_adres); ?></div>
						<div class="filmName"><?php echo ucwords($dizi_cek["adi"].' '.FilmKalite($dizi_cek["kalite"])); ?>  Torrent İndir</div>
					</a>
					</div>
					<?php $sonucsay++; }}
					
					function DiziTurYaz2($id){
						$idler = explode(',',$id);
						$i=0;
						global $site_adres;
						foreach($idler as $nID){
							preg_match("@'(.*?)'@si",$nID,$de1);
							$nID = $de1[1];
							$sql = mysql_query("select adi,seo from dizi_turleri where id='$nID' limit 3");
							$cek = mysql_fetch_array($sql);
							if($i != 0) echo ' | ';
							echo '<a href="'.$site_adres.'/torrent-dizi/'.$cek["seo"].'/" title="'.$cek["adi"].' Dizileri Torrent İndir">'.$cek["adi"].' </a>';
							$i++;
						}
					}
					
					$sql = mysql_query("select adi,seo,imdb,turu,icerik from diziler where durum='1' and ($araAdi or $araIcrk) order by id desc limit 8");
					$say = mysql_num_rows($sql);
					if($say > 0){
					echo '<div class="temizle"></div>
					<h2 style="float:left; margin-top:10px;" class="H2Class"> Bulunan Diziler </h2>
					<div class="temizle"></div>
					';
					while($dizi_cek = mysql_fetch_array($sql)){ ?>
					<div class="series">
						<a href="<?php echo $site_adres;?>/dizi/<?php echo $dizi_cek["seo"];?>/" title="<?php echo $dizi_cek["adi"];?> Sezon & Bölümlerini Görüntüle">
						<div class="serieIMG"><img src="<?php echo $site_adres;?>/img.php?src=<?php echo $site_adres;?>/files/images/series/covers/<?php echo $dizi_cek["seo"]; ?>-kapak.jpg&w=150&h=230" width="150" height="230" alt="" /></div>
						<div class="filmImdb"><?php echo IMDBRenk2($dizi_cek["imdb"]); ?></div></a>
						<div class="serieTitle"><a href="<?php echo $site_adres; ?>/dizi/<?php echo $dizi_cek["seo"]; ?>/"><?php echo $dizi_cek["adi"]; ?></a></div>
						<div class="serieCategory"><?php echo DiziTurYaz2($dizi_cek["turu"]); ?></div>
						<div class="serieMean"><?php echo kisalt($dizi_cek["icerik"], 210, $son="[..]");?></div>
						<div class="serieDown"><a href="<?php echo $site_adres;?>/dizi/<?php echo $dizi_cek["seo"];?>/" title="<?php echo $dizi_cek["adi"];?> Sezon & Bölümlerini Görüntüle"><img src="<?php echo $site_adres; ?>/files/images/style/goruntule.png" width="88" height="45" /></a></div>
					</div>
					
					<?php $sonucsay++; }}BaglantiKapat();
					if($sonucsay < 1) echo '<p>Girmiş olduğunuz arama kelimesini sitemizde film, oyun, program, dizi ve bölümlerinde aradık ancak bulamadık. Sağda menüden ne aradıysanız menüden filtre seçerek deneyin.</p>';
				}
			
		?>
		<div class="temizle"></div>
			<div id="sayfalama">
				<?php Sayfala('/torrent-ara/',$say,$sayfa,$sayfa_sayisi); ?>
			</div>
		</div>
		</div>
	</div>
	<div id="RightSide">
		<?php include "files/includes/sidebar.php"; ?>
	</div>
	<div class="temizle"></div>
	<?php include "files/includes/footer.php"; ?>
</div>

</div>
</div>
</body>
</html>
<?php ob_end_flush(); } ?>