<?php
$idkamar=$_POST['idkamar'];
include ('koneksi.php');
$hasil = mysql_query("
DELETE FROM kamar WHERE kamar.idkamar = '$idkamar'
");
if ($hasil==1){echo "Data berhasil di Hapus";}
else {echo "Data gagal di Hapus";}
echo "<br><a href='cetakkamar.php'>Lihat Hasil</a>";
?>