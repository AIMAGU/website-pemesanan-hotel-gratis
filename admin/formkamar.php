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
?>
<fieldset><legend>INPUT KAMAR</legend>
<form method="POST" action="terimakamar.php">
<pre>
ID kamar   <input type="text" name="idkamar">
Nama kamar <input type="text" name="namakamar">
Harga 	   <input type="text" name="harga">
Kategori   <select name="idkategorikamar">
<?php while($cetak=mysql_fetch_array($hasil)){
			echo "<option value=".$cetak['idkategorikamar'].">".$cetak['namakategori']."</option>";}
			?>
		   </select>
</pre>
<input type="submit" value="Input">
</form>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>