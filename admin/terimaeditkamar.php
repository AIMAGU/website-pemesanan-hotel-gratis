<?php
$idkamarlama=$_POST['idkamarlama'];
$idkamar=$_POST['idkamar'];
$namakamar=$_POST['namakamar'];
$harga=$_POST['harga'];
$idkategorikamar=$_POST['idkategorikamar'];
include ('koneksi.php');
$hasil = mysql_query("
UPDATE kamar SET 
idkamar= '$idkamar',
namakamar = '$namakamar',
harga = '$harga',
idkategorikamar= '$idkategorikamar'
WHERE idkamar = '$idkamarlama';
");
if ($hasil==1){echo "Data berhasil di edit";}
else {echo "Data gagal di edit";}
echo "<br><a href='cetakkamar.php'>Lihat Hasil</a>";
?>