<?php
$idkategorikamar=$_POST['idkategorikamar'];
include ('koneksi.php');
$hasil = mysql_query("
DELETE FROM kategori WHERE kategori.idkategorikamar = '$idkategorikamar'
");
if ($hasil==1){echo "Data berhasil di Hapus";}
else {echo "Data gagal di Hapus";}
echo "<br><a href='cetakkat.php'>Lihat Hasil</a>";
?>