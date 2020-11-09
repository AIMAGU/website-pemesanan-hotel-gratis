<?php
session_start();

//cek apakah sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek status
if($_SESSION['status']!="admin"){
    die("Anda bukan admin");//jika bukan admin dan customer jangan lanjut
}
include('atas.php');
echo "<fieldset><legend>Welcome ".$_SESSION['username']."</legend>";
include('koneksi.php');
$status=$_SESSION['username'];
if($status=="admin"){
include('menu.php');} else if($status=="customer"){include('menucus.php');}
else {echo "<hr>|<a href=\"javascript:history.back()\">Kembali</a>|<hr>";}
$idtransaksi=$_GET['idtransaksi'];
$hasiltransaksi=mysql_query("SELECT *FROM transaksi where idtransaksi='$idtransaksi'");
$cetakdetail=mysql_fetch_array($hasiltransaksi);
$detailtabel=mysql_query("SELECT kamar.*, detailtransaksi.*, transaksi.*
,(kamar.harga*detailtransaksi.lama) as total
FROM kamar, detailtransaksi, transaksi
WHERE ((kamar.idkamar=detailtransaksi.idkamar) AND (detailtransaksi.idtransaksi=transaksi.idtransaksi)
AND (transaksi.idtransaksi='$idtransaksi'))
");
echo "<fieldset><legend>DETAIL TRANSAKSI</legend>
<pre>
Nomor Transaksi		".$cetakdetail['idtransaksi']."
Pembeli 		".$cetakdetail['pembeli']."
Tanggal 	   	".$cetakdetail['tanggal']."
</pre>";
echo "<table class=tabtab border=1>
		<tr>
            <th>No</th>
			<th>id kamar</th>
			<th>Nama kamar</th>
			<th>Harga (@)</th>
			<th>Masuk</th>
			<th>Keluar</th>
            <th>Lama</th>
			<th>Total</th>
			<th>Edit</th>
			<th>Batal</th>
        </tr>";
$no=0; $totalbayar=0;
while($cetak=mysql_fetch_array($detailtabel)){
$no++; $totalbayar+=$cetak['total'];
echo "<tr>
		<td>$no</td>
        <td>".$cetak['idkamar']."</td>
		<td>".$cetak['namakamar']."</td>
		<td>Rp ".$cetak['harga']."</td>
		<td>".$cetak['tglmasuk']."</td>
		<td>".$cetak['tglkeluar']."</td>
		<td>".$cetak['lama']." hari</td>
		<td>Rp ".$cetak['total']."</td>
		<td><a href='editdetail.php?iddetail=".$cetak['iddetail']."'><img src=images/edit.png width=20></td>
		<td><a href='deletedetail.php?iddetail=".$cetak['iddetail']."'><img src=images/del.png width=20></td>
      </tr>";}
echo "<tr>
            <td colspan=7 align=center bgcolor=green><b>Total Bayar</b></td>
			<td colspan=3>Rp $totalbayar</td>
      </tr>
</table>";
?>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>