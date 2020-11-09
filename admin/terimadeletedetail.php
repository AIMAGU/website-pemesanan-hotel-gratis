<?php
$iddetail=$_POST['iddetail'];
$idtransaksi=$_POST['idtransaksi'];
include ('koneksi.php');
$hasil = mysql_query("
DELETE FROM detailtransaksi WHERE detailtransaksi.iddetail = '$iddetail'
");
if ($hasil==1){echo "Data berhasil di Hapus";}
else {echo "Data gagal di Hapus";}
echo "<a href=\"javascript:history.back()\">kembali</a>";
?>