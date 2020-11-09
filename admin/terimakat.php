<?php
$idkat=$_POST['idkategorikamar'];
$namakat=$_POST['namakategori'];
include ('koneksi.php');
$hasil = mysql_query("INSERT INTO kategori (idkategorikamar, namakategori) VALUES ('$idkat', '$namakat');");
if ($hasil==1){echo "Data berhasil di input";}
else {echo "Data gagal di input";}
echo "<br><a href='cetakkat.php'>Lihat Hasil</a>";
?>