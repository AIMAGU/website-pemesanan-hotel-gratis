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
$idkamar=$_GET['idkamar'];
$hasilkamar=mysql_query("SELECT *FROM kamar where idkamar='$idkamar'");
$cetakkamar=mysql_fetch_array($hasilkamar);
?>
<fieldset><legend>EDIT DATA KAMAR</legend>
<form method="POST" action="terimaeditkamar.php">
<input type="hidden" name="idkamarlama" value=
<?php echo"'$idkamar'";?>>
<pre>
ID kamar   <input type="text" name="idkamar" value=<?php echo "'".$cetakkamar['idkamar']."'"; ?>>
Nama kamar <input type="text" name="namakamar" value=<?php echo "'".$cetakkamar['namakamar']."'"; ?>>
Harga 	   <input type="text" name="harga" value=<?php echo "'".$cetakkamar['harga']."'"; ?>>
Kategori   <select name="idkategorikamar" >
<?php 
$hasil=mysql_query("SELECT kategori.*FROM kategori");
while($cetak=mysql_fetch_array($hasil)){
			echo "<option value='".$cetak['idkategorikamar']."'";
			if($cetak['idkategorikamar']==$cetakkamar['idkategorikamar']){echo "selected";}
			echo">".$cetak['namakategori']."</option>";}
			?>
		   </select>
</pre>
<input type="submit" value="Edit">
<?php echo "<a href=\"javascript:history.back()\">Batal</a>
</form>
</fieldset>
</fieldset>";
include('bawah.php');
?>