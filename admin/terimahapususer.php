<?php
include ('koneksi.php');
$username=$_POST['userhapus'];
$hasil = mysql_query("DELETE FROM user WHERE username='$username'");
$hasil2 = mysql_query("DELETE FROM akun WHERE username='$username'");
$hasil3 = mysql_query("DELETE FROM transaksi WHERE pembeli='$username'");
if ($hasil==1 && $hasil2==1 && $hasil3==1){echo "Data berhasil di Hapus";}
else {echo "Data gagal di Hapus";}
echo "<br><a href='cetakuser.php'>Lihat Hasil</a>";
?>