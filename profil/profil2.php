<?php

include('koneksi.php');
$hasil2=mysql_query("SELECT kamar.*, kategori.*
FROM kamar inner join kategori
WHERE (kamar.idkategorikamar=kategori.idkategorikamar)");

echo "<center><table class=tabtab border=1 width=430>
		<tr>
            <th>No</th>
            <th>Nama kamar</th>
			<th>Harga</th>
            <th>Kategori</th>
        </tr>";
$no=0;
while($cetak2=mysql_fetch_array($hasil2)){
$no++;
echo "<tr>
		<td>$no</td>
		<td>".$cetak2['namakamar']."</td>
		<td>Rp ".$cetak2['harga'].",-</td>
		<td>".$cetak2['namakategori']."</td>
      </tr>";}
echo "</table></center>";
?>