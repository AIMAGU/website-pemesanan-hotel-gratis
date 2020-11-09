<?php
$idtransaksi=$_POST['idtransaksi'];
$idkamar=$_POST['idkamar'];
$pembeli=$_POST['pembeli'];
$tglmasuk=strip_tags($_POST['tglmasuk']);
$tglkeluar=strip_tags($_POST['tglkeluar']);
$tanggal=date("Y-m-d");
// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
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
$hasil2= mysql_query("INSERT INTO detailtransaksi (iddetail, idtransaksi, idkamar, tglmasuk, tglkeluar, lama) VALUES (null, '$idtransaksi', '$idkamar', '$tglmasuk', '$tglkeluar', '$lama')");
$hasil = mysql_query("INSERT INTO transaksi (idtransaksi, pembeli, tanggal) VALUES ('$idtransaksi', '$pembeli', '$tanggal');");
if ($hasil==1 || $hasil2==1){echo "Data berhasil di input";}
else {echo "Data gagal di input";}
echo "<br><a href='cetakdetail.php?idtransaksi=$idtransaksi'>Lihat Hasil</a>";
?>