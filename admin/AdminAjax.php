<?php include "../files/includes/functions.php"; ?>

<?php
BaglantiAc();
$keli = $_GET["giden"];
$sql = mysql_query("select * from film_seri where adi like '%$keli%' order by id asc");
while($cek = mysql_fetch_array($sql)){
	echo '<option value="'.$cek["id"].'">'.$cek["adi"].'</option>';
}
BaglantiKapat();

?>