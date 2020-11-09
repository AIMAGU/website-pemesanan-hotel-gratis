<?php
$idtransaksi=$_POST['idtransaksi'];
$idkamar=$_POST['idkamar'];
$pembeli=$_POST['pembeli'];
$tglmasuk=strip_tags($_POST['tglmasuk']);
$tglkeluar=strip_tags($_POST['tglkeluar']);
$tanggal=date("Y-m-d");
$tahun=date("Y");
$bulan=date("m");
$hari=date("d");
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
if ($lama>0){
if (($year1>=$hari && $month1>=$bulan && $date1>=$hari) && ($year2>=$hari && $month2>=$bulan && $date2>=$hari) && ($year2>=$year1)){
if ($tglmasuk!="yyyy-mm-dd" && $tglkeluar!="yyyy-mm-dd" || ($tglmasuk!="" && $tglkeluar!="" && $tanggal != $tanggal)){
$hasil2= mysql_query("INSERT INTO detailtransaksi (iddetail, idtransaksi, idkamar, tglmasuk, tglkeluar, lama) VALUES (null, '$idtransaksi', '$idkamar', '$tglmasuk', '$tglkeluar', '$lama')");
$hasil = mysql_query("INSERT INTO transaksi (idtransaksi, pembeli, tanggal) VALUES ('$idtransaksi', '$pembeli', '$tanggal');");
}}}
if ($hasil==1 || $hasil2==1){echo "<script type='text/javascript'>
				alert('Reservasi sukses!');
				window.location = 'index.php?link=cetakdetail'
				</script>";}
else {echo "<script type='text/javascript'>
				alert('Maaf masih ada data yang tidak benar. Periksa kembali data anda!');
				window.location = 'index.php?link=formtransaksi'
				</script>";}
?>