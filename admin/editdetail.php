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

$iddetail=$_GET['iddetail'];
$hasildetail=mysql_query("SELECT *FROM kamar, detailtransaksi where iddetail='$iddetail'");
$cetakdetail=mysql_fetch_array($hasildetail);
?>
<fieldset>
<legend>EDIT DATA TRANSAKSI</legend>
<form method="POST" action="terimaeditdetail.php">
<input type="hidden" name="iddetaillama" value=<?php echo"'$iddetail'";?>>
<pre>
ID Transaksi   	<input type="text" name="idtransaksi" value="<?php echo "".$cetakdetail['idtransaksi'].""; ?>" >
Nama kamar   	<select name="idkamar">
			<?php $hasil=mysql_query("SELECT *FROM kamar");
			while($cetak=mysql_fetch_array($hasil)){
			echo "<option value='".$cetak['idkamar']."'"; if($cetak['idkamar']==$cetakdetail['idkamar']){echo "selected";} 
			echo ">".$cetak['namakamar']."</option>";}
			?>
			</select>
Tanggal Masuk	<input type="text" name="tglmasuk" value="<?php echo "".$cetakdetail['tglmasuk'].""; ?>" >
Tanggal Keluar 	<input type="text" name="tglkeluar" value="<?php echo "".$cetakdetail['tglkeluar'].""; ?>" >
</pre>
<input type="submit" value="Edit">
<?php echo "<a href=\"javascript:history.back()\">Batal</a>
</form>
</fieldset>
</fieldset>";
include('bawah.php'); 
?>