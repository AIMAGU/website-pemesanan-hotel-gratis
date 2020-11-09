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
$idkategorikamar=$_GET['idkategorikamar'];
$hasilkategori=mysql_query("SELECT *FROM kategori where idkategorikamar='$idkategorikamar'");
$cetakkategori=mysql_fetch_array($hasilkategori);
?>
<fieldset><legend>EDIT KATEGORI KAMAR</legend>
<form method="POST" action="terimaeditkategori.php">
<input type="hidden" name="idkategorilama" value=
<?php echo"'$idkategorikamar'";?>>
<pre>
ID Kategori   <input type="text" name="idkategorikamar" value=<?php echo "'".$cetakkategori['idkategorikamar']."'"; ?>>
Nama Kategori <input type="text" name="namakategori" value=<?php echo "'".$cetakkategori['namakategori']."'"; ?>>
</pre>
<input type="submit" value="Edit"> | 
<?php echo "<a href=\"javascript:history.back()\">Batal</a>
</form>
</fieldset>
</fieldset>";
include('bawah.php'); 
?>