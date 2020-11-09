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
$hasil=mysql_query("SELECT kategori.*
FROM kategori");
echo "<fieldset><legend>Daftar Kategori Kamar</legend>
		<a href='form.php'><img src=images/addkat.png width=40 title=Tambah_kategori_kamar></a>
		<table class=tabtab border=1>
		<tr>
            <th>No</th>
			<th>id Kategori kamar</th>
            <th>Nama Kategori</th>
			<th>Edit</th>
			<th>Del</th>
        </tr>";
$i=0;
while($cetak=mysql_fetch_array($hasil)){
$i++;
echo "<tr>
		<td>$i</td>
        <td>".$cetak['idkategorikamar']."</td>
		<td>".$cetak['namakategori']."</td>
		<td><a href='editkategori.php?idkategorikamar=".$cetak['idkategorikamar']."'><img src=images/edit.png width=20></a></td>
		<td><a href='hapuskategori.php?idkategorikamar=".$cetak['idkategorikamar']."' ><img src=images/del.png width=20></a></td>
      </tr>";}
echo "</table>";
?>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>