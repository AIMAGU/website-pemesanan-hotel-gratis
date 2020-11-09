<?php
include('cek.php');

$iddetail=$_POST['iddetail'];
echo "<fieldset><legend>KONFIRMASI : Apakah anda yakin akan membatalkan data ini?</legend>";
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
<form method='post' action='index.php?link=terimadeletedetail'>
<input type='hidden' name='iddetail' value=<?php echo "'$iddetail'";?>>
<input type='submit' value='Ya'> |
<?php echo "<a href=\"javascript:history.back()\">Tidak</a>" ?>
</form>

</fieldset>
</fieldset>