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
$idkamar=$_GET['idkamar'];
echo "<fieldset><legend>KONFIRMASI : Apakah anda yakin akan menghapus data ini?</legend>";
?>
<?php
include('koneksi.php');
$hasil2=mysql_query("SELECT kamar.*, kategori.*
FROM kamar inner join kategori
WHERE (kamar.idkategorikamar=kategori.idkategorikamar 
and kamar.idkamar='$idkamar')");
echo "<table class=tabtab border=1>
		<tr>
			<th>Id kamar</th>
            <th>Nama kamar</th>
			<th>Harga</th>
            <th>Kategori</th>
        </tr>";
while($cetak2=mysql_fetch_array($hasil2)){
echo "<tr>
        <td>".$cetak2['idkamar']."</td>
		<td>".$cetak2['namakamar']."</td>
		<td>".$cetak2['harga']."</td>
		<td>".$cetak2['namakategori']."</td>
      </tr>";}
echo "</table>";
?>
<form method='post' action='terimahapuskamar.php'>
<input type='hidden' name='idkamar' value=<?php echo "'$idkamar'";?>>
<input type='submit' value='Ya'>
<?php echo "<a href=\"javascript:history.back()\">Tidak</a>
</form>
</fieldset>
</fieldset>";
include('bawah.php');
?>