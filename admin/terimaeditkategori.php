<?php
$idkategorilama=$_POST['idkategorilama'];
$idkategorikamar=$_POST['idkategorikamar'];
$namakategori=$_POST['namakategori'];
include ('koneksi.php');
$hasil = mysql_query("
UPDATE kategori SET 
idkategorikamar= '$idkategorikamar',
namakategori = '$namakategori'
WHERE idkategorikamar = '$idkategorilama';
");
if ($hasil==1){echo "Data berhasil di edit";}
else {echo "Data gagal di edit";}
echo "<br><a href='cetakkat.php'>Lihat Hasil</a>";
?>