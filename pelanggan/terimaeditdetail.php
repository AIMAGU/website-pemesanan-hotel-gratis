<?php
$idtransaksi=$_POST['idtransaksi'];
$idkamar=$_POST['idkamar'];
$tglmasuk=strip_tags($_POST['tglmasuk']);
$tglkeluar=strip_tags($_POST['tglkeluar']);
$iddetaillama=$_POST['iddetaillama'];
$tahun=date("Y");
$bulan=date("m");
$hari=date("d");
// dari tanggal pertama
$pecah1 = explode("-", $tglmasuk);
$date1 = $pecah1[2];
$month1 = $pecah1[1];
$year1 = $pecah1[0];
 
// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
// dari tanggal kedua
$pecah2 = explode("-", $tglkeluar);
$date2 = $pecah2[2];
$month2 = $pecah2[1];
$year2 =  $pecah2[0];
 
// menghitung JDN dari masing-masing tanggal
$jd1 = GregorianToJD($month1, $date1, $year1);
$jd2 = GregorianToJD($month2, $date2, $year2);
 
// hitung selisih hari kedua tanggal
$lama = $jd2 - $jd1;
if ($lama>0){
if (($year1>=$hari && $month1>=$bulan && $date1>=$hari) && ($year2>=$hari && $month2>=$bulan && $date2>=$hari) && ($year2>=$year1)){
if ($tglmasuk!="" && $tglkeluar!=""){
$hasil = mysql_query("
UPDATE detailtransaksi SET 
iddetail= '$iddetaillama',
idtransaksi = '$idtransaksi',
idkamar = '$idkamar',
tglmasuk= '$tglmasuk',
tglkeluar= '$tglkeluar',
lama= '$lama'
WHERE iddetail = '$iddetaillama';
");}}}
if ($hasil==1){echo "<script type='text/javascript'>
				alert('Data berhasil diubah');
				window.location = 'index.php?link=cetakdetail'
				</script>";}
else {echo "<script type='text/javascript'>
				alert('Masih ada data yang salah,periksa kembali!');
				window.location = 'index.php?link=homeuser'
				</script>";}
?>