<?php
session_start();

//cek apakah sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek status
if($_SESSION['status']!="admin"){
    die("Anda bukan admin");//jika bukan admin jangan lanjut
}
include('atas.php');
echo "<fieldset><legend>Welcome ".$_SESSION['username']."</legend>";
include('menu.php');
include('koneksi.php');
$hasil2=mysql_query("SELECT kamar.*, kategori.*
FROM kamar inner join kategori
WHERE (kamar.idkategorikamar=kategori.idkategorikamar)");

echo "<fieldset><legend>Daftar Kamar</legend>
		<a href='formkamar.php'><img src=images/addkamar.png width=40 title=Tambah_kamar></a>
		<table class=tabtab border=1>
		<tr>
            <th>No</th>
			<th>id kamar</th>
            <th>Nama kamar</th>
			<th>Harga</th>
            <th>Kategori</th>
			<th>Edit</th>
			<th>Del</th>
        </tr>";
$no=0;
while($cetak2=mysql_fetch_array($hasil2)){
$no++;
echo "<tr>
		<td>$no</td>
        <td>".$cetak2['idkamar']."</td>
		<td>".$cetak2['namakamar']."</td>
		<td>".$cetak2['harga']."</td>
		<td>".$cetak2['namakategori']."</td>
		<td><a href='editkamar.php?idkamar=".$cetak2['idkamar']."'><img src=images/edit.png width=20></a></td>
		<td><a href='hapuskamar.php?idkamar=".$cetak2['idkamar']."'><img src=images/del.png width=20></a></td>
      </tr>";}
echo "</table>";
?>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>