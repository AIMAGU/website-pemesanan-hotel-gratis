<?php
include ('cek.php');
//olah datauser
$hasiltransaksi=mysql_query("SELECT *FROM transaksi where pembeli='$username'");
$cetakdetail=mysql_fetch_array($hasiltransaksi);
$detailtabel=mysql_query("SELECT kamar.*, detailtransaksi.*, transaksi.*
,(kamar.harga*detailtransaksi.lama) as total
FROM kamar, detailtransaksi, transaksi
WHERE ((kamar.idkamar=detailtransaksi.idkamar) AND (detailtransaksi.idtransaksi=transaksi.idtransaksi)
AND (transaksi.pembeli='$username'))
");
//untuk input hidden
$hidden=mysql_query("SELECT kamar.*, detailtransaksi.*, transaksi.*
,(kamar.harga*detailtransaksi.lama) as total
FROM kamar, detailtransaksi, transaksi
WHERE ((kamar.idkamar=detailtransaksi.idkamar) AND (detailtransaksi.idtransaksi=transaksi.idtransaksi)
AND (transaksi.pembeli='$username'))
");
$cetakh=mysql_fetch_array($hidden);
echo "<fieldset><legend>DETAIL TRANSAKSI</legend>
<pre>
Nomor Transaksi		".$cetakdetail['idtransaksi']."
Pembeli 		".$cetakdetail['pembeli']."
Tanggal 	   	".$cetakdetail['tanggal']."
</pre>";
echo "<table class=tabtab border=1>
		<tr>
            <th>No</th>
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
		<td>".$cetak['namakamar']."</td>
		<td>Rp ".$cetak['harga']."</td>
		<td>".$cetak['tglmasuk']."</td>
		<td>".$cetak['tglkeluar']."</td>
		<td>".$cetak['lama']." hari</td>
		<td>Rp ".$cetak['total']."</td>
		<td><form method='post' action='index.php?link=editdetail'><input type='hidden' name='iddetail' value='".$cetak['iddetail']."'><input type='submit' value='e'></form></td>
		<td><form method='post' action='index.php?link=deletedetail'><input type='hidden' name='iddetail' value='".$cetak['iddetail']."'><input type='submit' value='b'></form></td>
      </tr>";}
echo "<tr>
            <td colspan=6 align=center bgcolor=green><b>Total Bayar</b></td>
			<td colspan=4>Rp $totalbayar</td>
      </tr>
</table>
<p><blink>Klik Selesai reservasi untuk mencetak bukti reservasi.</blink></p>
<form method='post' action='pelanggan/cetakstruk.php'>
<input type='hidden' name='idtransaksi' value='".$cetakdetail['idtransaksi']."'>
<input type='hidden' name='pembeli' value='".$cetakdetail['pembeli']."'>
<input type='hidden' name='tanggal' value='".$cetakdetail['tanggal']."'>
<input type='hidden' name='namakamar' value='".$cetakh['namakamar']."'>
<input type='hidden' name='harga' value='".$cetakh['harga']."'>
<input type='hidden' name='tglmasuk' value='".$cetakh['tglmasuk']."'>
<input type='hidden' name='tglkeluar' value='".$cetakh['tglkeluar']."'>
<input type='hidden' name='lama' value='".$cetakh['lama']."'>
<input type='hidden' name='total' value='".$cetakh['total']."'>
<input type='hidden' name='totalbayar' value='$totalbayar'>
<input type='hidden' name='iddetail' value='".$cetakh['iddetail']."'>
<input class='submit' type='submit' value='Selesai Reservasi' />
</form>";
?>
</fieldset>
</fieldset>