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
include('menu.php');} else {echo "|<a href=homeuser.php>Home</a>|
|<a href=formtransaksi.php>Reservasi Kamar</a>|
|<a href=log.php?op=out>Keluar</a>|";}

$iddetail=$_GET['iddetail'];
echo "<fieldset><legend>KONFIRMASI : Apakah anda yakin akan menghapus data ini?</legend>";
$hasil2=mysql_query("SELECT detailtransaksi.*, kamar.*
,(kamar.harga*detailtransaksi.lama) as total
FROM kamar inner join detailtransaksi
WHERE (kamar.idkamar=detailtransaksi.idkamar 
and detailtransaksi.iddetail='$iddetail')");
echo "<table class=tabtab border=1>
		<tr>
			<th>Nama kamar</th>
            <th>Harga(@)</th>
			<th>Tgl Masuk</th>
            <th>Tgl Keluar</th>
			<th>Lama</th>
            <th>Total</th>
        </tr>";
while($cetak2=mysql_fetch_array($hasil2)){
echo "<tr>
        <td>".$cetak2['namakamar']."</td>
		<td>".$cetak2['harga']."</td>
		<td>".$cetak2['tglmasuk']."</td>
		<td>".$cetak2['tglkeluar']."</td>
		<td>".$cetak2['lama']."</td>
		<td>".$cetak2['total']."</td>
      </tr>";}
echo "</table>";
?>
<form method='post' action='terimadeletedetail.php'>
<input type='hidden' name='iddetail' value=<?php echo "'$iddetail'";?>>
<input type='submit' value='Ya'> |
<?php echo "<a href=\"javascript:history.back()\">Tidak</a>" ?>
</form>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>