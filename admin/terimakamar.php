<?php
$idkamar=$_POST['idkamar'];
$namakamar=$_POST['namakamar'];
$harga=$_POST['harga'];
$idkategorikamar=$_POST['idkategorikamar'];
include ('koneksi.php');
$hasil = mysql_query("INSERT INTO kamar (idkamar, namakamar, harga, idkategorikamar) VALUES ('$idkamar', '$namakamar', '$harga', '$idkategorikamar');");
if ($hasil==1){echo "Data berhasil di input";}
else {echo "Data gagal di input";}
echo "<br><a href='cetakkamar.php'>Lihat Hasil</a>";
?>