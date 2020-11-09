<?php
$pembeli=$_POST['pembeli'];
$tanggal=$_POST['tanggal'];
$namakamar=$_POST['namakamar'];
$harga=$_POST['harga'];
$tglmasuk=$_POST['tglmasuk'];
$tglkeluar=$_POST['tglkeluar'];
$lama=$_POST['lama'];
$total=$_POST['total'];
$totalbayar=$_POST['totalbayar'];
$iddetail=$_POST['iddetail'];
$idtransaksi=$_POST['idtransaksi'];
include ('koneksi.php');
$hasil = mysql_query("DELETE FROM detailtransaksi WHERE detailtransaksi.iddetail = '$iddetail'");
if ($hasil==1){echo "Reservasi Sukses";}
else {echo "Reservasi Gagal";}
echo "<fieldset><legend>STRUK RESERVASI LIO ROOM RESERVATION</legend>
<pre>
Nomor Transaksi		$idtransaksi
Pembeli 		$pembeli
Tanggal 	   	$tanggal
</pre>";
echo "<table border=1>
		<tr>
            <th>No</th>
			<th>Nama kamar</th>
			<th>Harga (@)</th>
			<th>Masuk</th>
			<th>Keluar</th>
            <th>Lama</th>
			<th>Total</th>
        </tr>";
$no=0; $totalbayar=0;
$no++; $totalbayar+=$total;
echo "<tr>
		<td>$no</td>
		<td>$namakamar</td>
		<td>Rp $harga</td>
		<td>$tglmasuk</td>
		<td>$tglkeluar</td>
		<td>$lama hari</td>
		<td>Rp $total</td>
	  </tr>";
echo "<tr>
            <td colspan=6 align=center bgcolor=green><b>Total Bayar</b></td>
			<td colspan=4>Rp $totalbayar</td>
      </tr>
</table>
<input type='submit' onClick='javascript:print()' href='javascript:void(0)' value='CETAK'>";
?>
</fieldset>
</fieldset>
<p>Pembayaran Tagihan dikirim melalui Rekening Bank BNI : 0246947086 (Nur Rochim). Terima Kasih</p>