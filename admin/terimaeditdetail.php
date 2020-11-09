<?php
$idtransaksi=$_POST['idtransaksi'];
$idkamar=$_POST['idkamar'];
$tglmasuk=strip_tags($_POST['tglmasuk']);
$tglkeluar=strip_tags($_POST['tglkeluar']);
$iddetaillama=$_POST['iddetaillama'];
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
include ('koneksi.php');
$hasil = mysql_query("
UPDATE detailtransaksi SET 
iddetail= '$iddetaillama',
idtransaksi = '$idtransaksi',
idkamar = '$idkamar',
tglmasuk= '$tglmasuk',
tglkeluar= '$tglkeluar',
lama= '$lama'
WHERE iddetail = '$iddetaillama';
");
if ($hasil==1){echo "Data berhasil di edit";}
else {echo "Data gagal di edit";}
echo "<br><a href='cetakdetail.php?idtransaksi=$idtransaksi'>Lihat Hasil</a>";
?>