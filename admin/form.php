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
?>
<fieldset><legend>INPUT KATEGORI KAMAR</legend>
<form method="POST" action="terimakat.php">
<pre>
ID Kategori kamar   <input type="text" name="idkategorikamar">
Nama Kategori kamar <input type="text" name="namakategori">
</pre>
<input type="submit" value="Input">
</form>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>