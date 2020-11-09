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
$hasil2=mysql_query("SELECT transaksi.*
, SUM(kamar.harga*detailtransaksi.lama) as total
, COUNT(kamar.idkamar) as jenis
FROM kamar, detailtransaksi, transaksi
WHERE ((kamar.idkamar=detailtransaksi.idkamar) AND (detailtransaksi.idtransaksi=transaksi.idtransaksi))
GROUP BY transaksi.idtransaksi
ORDER BY transaksi.idtransaksi DESC
");
echo "<fieldset><legend>Daftar Transaksi</legend>
		<a href='formtransaksi.php'><img src=images/addtransaksi.png width=40 title=Tambah_kamar></a>
		<a href='backup.php'><img src=images/backup.png width=40 title=Backup_Transaksi></a>
		<a href='restore.php'><img src=images/restore.png width=40 title=Restore></a>
		<table class=tabtab border=1>
		<tr>
            <th>No</th>
			<th>id Transaksi</th>
            <th>Nama Pembeli</th>
			<th>Tanggal</th>
            <th>Banyak Jenis</th>
			<th>Total</th>
			<th>Detail</th>
        </tr>";
$no=0;
while($cetak=mysql_fetch_array($hasil2)){
$no++;
echo "<tr>
		<td>$no</td>
        <td>".$cetak['idtransaksi']."</td>
		<td>".$cetak['pembeli']."</td>
		<td>".$cetak['tanggal']."</td>
		<td>".$cetak['jenis']."</td>
		<td>".$cetak['total']."</td>
		<td><a href='cetakdetail.php?idtransaksi=".$cetak['idtransaksi']."'><img src=images/detail.png width=20></td>
      </tr>";}
echo "</table>";
?>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>