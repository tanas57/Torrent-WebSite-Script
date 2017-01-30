<div id="comments">
	<div id="commentList">
		 
		<?php
		BaglantiAc();
		$yorum_sql = mysql_query("select * from yorumlar where tur='$yorumTur' and durum!='0' and turID='$yorumTID' order by eklenme asc");
		$say	   = mysql_num_rows($yorum_sql);
		if($say > 0){
			echo '<h3>'.$say.' YORUM</h3>';
			$yorum_sql = mysql_query("select * from yorumlar where tur='$yorumTur' and durum!='0' and turID='$yorumTID' and cevap='0' order by eklenme asc");
			while($yorum_cek = mysql_fetch_array($yorum_sql)){
				$Dwidth = 450;
				$Rwidth = 30;
				$yd_id = $yorum_cek["id"];
				// buraya 0 olanları listele
				echo '
				<div id="comment-'.$yorum_cek["id"].'" class="comment">
					<div class="commentIMG"><img src="http://www.gravatar.com/avatar.php?gravatar_id='.md5($yorum_cek["mail"]).'&amp;size=70" width="70" height="70" /></div>
					<div class="commentDesc">
							<div class="commentAut">'.$yorum_cek["yapan"].'</div>
					'.$yorum_cek["icerik"].'
					</div>
					<div class="commendRight">
								<div class="commentDate"><a rel="nofollow" href="'.$yorumLink.'#comment-'.$yorum_cek["id"].'">'.timeTR($yorum_cek["eklenme"]).'</a></div>
					</div>
					<div class="temizle"></div>
					<!--<div class="commentResp"><a rel="nofollow,noindex" href="'.$yorumLink.'/'.$yorum_cek["id"].'/#commentSubmit" title=""> Cevapla </a></div>-->
				</div>
				<div class="temizle"></div>
				';
				
					$yorum_sql2  = mysql_query("select * from yorumlar where tur='$yorumTur' and durum!='0' and turID='$yorumTID' and cevap='$yd_id' order by eklenme asc");
					while($yorum_cek = mysql_fetch_array($yorum_sql2)){
					// buraya yukarıdaki id deki yorumun altında cevapları listele kardeşşş xD
					if($yorum_cek["durum"]==2){
					echo '
						<div id="comment-'.$yorum_cek["id"].'" class="comment">
						<div class="commentIMG" style="margin-left:'.$Rwidth.';"><img src="http://www.gravatar.com/avatar.php?gravatar_id='.md5($yorum_cek["mail"]).'&amp;size=70" width="70" height="70" /></div>
						<div class="commentDesc" style="width:'.$Dwidth.';">
								<div class="commentAut" style="color:#18319d;">'.$yorum_cek["yapan"].' <i style="color:#c00707;"> [ Yönetici ] </i></div>
						'.$yorum_cek["icerik"].'
						</div>
						<div class="commendRight">
									<div class="commentDate"><a rel="nofollow" href="'.$yorumLink.'#comment-'.$yorum_cek["id"].'">'.timeTR($yorum_cek["eklenme"]).'</a></div>
						</div>
						<div class="temizle"></div>
						<!--<div class="commentResp"><a rel="nofollow,noindex" href="'.$yorumLink.'/'.$yd_id.'/#commentSubmit" title=""> Cevapla </a></div>-->
					</div>
					<div class="temizle"></div>
					';	
					}
					else{
					echo '
						<div id="comment-'.$yorum_cek["id"].'" class="comment">
						<div class="commentIMG" style="margin-left:'.$Rwidth.';"><img src="http://www.gravatar.com/avatar.php?gravatar_id='.md5($yorum_cek["mail"]).'&amp;size=70" width="70" height="70" /></div>
						<div class="commentDesc" style="width:'.$Dwidth.';">
								<div class="commentAut">'.$yorum_cek["yapan"].'</div>
						'.$yorum_cek["icerik"].'
						</div>
						<div class="commendRight">
									<div class="commentDate"><a rel="nofollow" href="'.$yorumLink.'#comment-'.$yorum_cek["id"].'">'.timeTR($yorum_cek["eklenme"]).'</a></div>
						</div>
						<div class="temizle"></div>
						<!--<div class="commentResp"><a rel="nofollow,noindex" href="'.$yorumLink.'/'.$yd_id.'/#commentSubmit" title=""> Cevapla </a></div>-->
					</div>
					<div class="temizle"></div>
					';	
					}
					
					$Dwidth = $Dwidth-30;
					$Rwidth = $Rwidth+30;
					}
				
				}
				// aha buraya cevaba göre değişsin.. 
				if( @$_GET["respond"] != "" ){
				echo '
			<h3> Yorum Yapın  /  <a href="'.$yorumLink.'#commentSubmit"> Cevabı iptal et</a></h3>
			<div id="commentSubmit">
			<form action="'.TarayiciAdres().'#commentSubmit" method="post">
				<div class="commentSubList"><span> Ad ve Soyad <i>(Gerekli)</i></span> <input placeholder="Adınızı giriniz" class="br5" type="text" name="commentName" id="commentName" maxlength="50" required />
				</div>
				<div class="commentSubList"><span> E-Posta <i>(Gerekli)</i> </span> <input placeholder="E-Postanızı giriniz"class="br5" type="text" name="commentMail" id="commentMail" maxlength="50" required />
				</div>
				<div class="commentSubList"><span> <strong>fulltorrentler</strong> yazınız <i>(Gerekli)</i> <input placeholder="fulltorrentler yazın..."class="br5" type="text" name="commentDGR" id="commentDGR" maxlength="14" required />
				</div>
				<div class="commentSubList" style="width:400px;"><span> Yorumunuz <i>(Gerekli)</i> </span> <textarea class="br5" rows="5" cols="10" name="commentDe" id="commentDe"></textarea>
				</div>
				<div class="commentSubList"><span></span> <input style="width:100px; height:50px;" type="submit" name="commentSub" id="commentSub" /></div>
			</form>
		</div>
		';
			}
			else{
				echo '
			<h3> Yorum Yapın </h3>
			<div id="commentSubmit">
			<form action="'.TarayiciAdres().'#commentSubmit" method="post">
				<div class="commentSubList"><span> Ad ve Soyad <i>(Gerekli)</i></span> <input placeholder="Adınızı giriniz" class="br5" type="text" name="commentName" id="commentName" maxlength="50" required />
				</div>
				<div class="commentSubList"><span> E-Posta <i>(Gerekli)</i> </span> <input placeholder="E-Postanızı giriniz"class="br5" type="text" name="commentMail" id="commentMail" maxlength="50" required />
				</div>
				<div class="commentSubList"><span> <strong>fulltorrentler</strong> yazınız <i>(Gerekli)</i> <input placeholder="fulltorrentler yazın..."class="br5" type="text" name="commentDGR" id="commentDGR" maxlength="14" required />
				</div>
				<div class="commentSubList" style="width:400px;"><span> Yorumunuz <i>(Gerekli)</i> </span> <textarea class="br5" rows="5" cols="10" name="commentDe" id="commentDe"></textarea>
				</div>
				<div class="commentSubList"><span></span> <input style="width:100px; height:50px;" type="submit" name="commentSub" id="commentSub" /></div>
			</form>
		</div>
		';
			}
			}
			else {
			// yorum hiç yapılmamış yapıştır direkt bir yorum gönderi.
			echo '<h3> BİR YORUM BIRAKIN </h3>
		<div id="commentSubmit">
			<form action="'.TarayiciAdres().'#commentSubmit" method="post">
				<div class="commentSubList"><span> Ad ve Soyad <i>(Gerekli)</i></span> <input placeholder="Adınızı giriniz" class="br5" type="text" name="commentName" id="commentName" maxlength="50" required />
				</div>
				<div class="commentSubList"><span> E-Posta <i>(Gerekli)</i> </span> <input placeholder="E-Postanızı giriniz"class="br5" type="text" name="commentMail" id="commentMail" maxlength="50" required />
				</div>
				<div class="commentSubList"><span> <strong>fulltorrentler</strong> yazınız <i>(Gerekli)</i> <input placeholder="fulltorrentler yazın..."class="br5" type="text" name="commentDGR" id="commentDGR" maxlength="14" required />
				</div>
				<div class="commentSubList" style="width:400px;"><span> Yorumunuz <i>(Gerekli)</i> </span> <textarea class="br5" rows="5" cols="10" name="commentDe" id="commentDe"></textarea>
				</div>
				<div class="commentSubList"><span></span> <input style="width:100px; height:50px;" type="submit" name="commentSub" id="commentSub" /></div>
			</form>
		</div>
		';
			}
		
		if($_POST == TRUE){
				$adi 		= mysql_real_escape_string($_POST["commentName"]);
				$mail 		= mysql_real_escape_string($_POST["commentMail"]);
				$dogrulama 	= mysql_real_escape_string($_POST["commentDGR"]);
				$icerik		= mysql_real_escape_string($_POST["commentDe"]);
				if($dogrulama == "fulltorrentler"){
					$adi = ucwords($adi);
					if(epostakontrol($mail)==1){
						$cevap 	= @$_GET["respond"];
						
						if($cevap == "") $cevap = "0";
						
						$tarih 	= date("Y-m-d H:i:s");
						$ip		=$_SERVER['REMOTE_ADDR'];
						$ekle = mysql_query("insert into yorumlar(yapan,mail,eklenme,ip,icerik,durum,tur,turID,cevap) values ('$adi','$mail','$tarih','$ip','$icerik','0','$yorumTur','$yorumTID','$cevap')");
						if($ekle) echo '<div class="temizle"></div><h1 class="br5" id="commentH1"> Yorumunuz alınmıştır. TEŞEKKÜRLER !</h1>';
						else echo '<div class="temizle"></div><h1 class="br5" id="commentH12"> Yorum yapılamadı. Hata : '.mysql_error().' </h1>';
					}
					else{
						echo '<div class="temizle"></div><h1 class="br5" id="commentH12"> Geçerli bir E-Posta hesabı girmelisiniz. </h1>';
					}
				}
				else{
					echo '<div class="temizle"></div><h1 class="br5" id="commentH12"> Doğrulama olarak "fulltorrentler" girmelisiniz. </h1>';
				}
			}
		
		
		
		BaglantiKapat();
		?>
		
	</div>
</div>