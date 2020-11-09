<?php
session_start();

//cek apakah sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek status
if($_SESSION['status']!="admin" && $_SESSION['status']!="customer"){
    die("Anda bukan customer kami");//jika bukan admin dan customer jangan lanjut
}
include('atas.php');
echo "<fieldset><legend>Welcome ".$_SESSION['username']."</legend>";
include('koneksi.php');

//menu admin atau custemor
$status=$_SESSION['status'];
if($status=="admin"){
include('menu.php');} else {include('menucus.php');}

// mengolah data hidden
$namacus=$_SESSION['username'];
$hasil=mysql_query("SELECT *FROM transaksi where pembeli='$namacus'");
$idnama=mysql_fetch_array($hasil);
$cet=$idnama['idtransaksi'];

$hasil=mysql_query("SELECT * FROM kamar");
?>
<fieldset>
<legend>FORM TRANSAKSI</legend>
<form method="POST" action="terimatransaksi.php">
<input type="hidden" name="idtransaksi" value="<?php echo $cet ?>" >
<input type="hidden" name="pembeli" value=<?php echo "".$_SESSION['username']."" ?>>
<pre>
Nama kamar   	<select name="idkamar">
<?php while($cetak=mysql_fetch_array($hasil)){
			echo "<option value=".$cetak['idkamar'].">".$cetak['namakamar']."</option>";}
?>
			</select>
Tanggal Masuk	<input type="text" name="tglmasuk" value="yyyy-mm-dd">
Tanggal Keluar 	<input type="text" name="tglkeluar" value="yyyy-mm-dd">
</pre>
<input type="submit" value="Reservasi">
</form>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>