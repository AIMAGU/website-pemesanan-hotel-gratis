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
echo "<fieldset><legend>Daftar Kontak Kami</legend>";
$hasil = mysql_query("SELECT *FROM kontak ORDER BY  id DESC");
echo "<table class=tabtab border=1 cellspacing=2 cellpadding=2>
		<tr>
            <th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Email</th>
			<th>Tanggal</th>
			<th>Komentar</th>
			<th>Del</th>
        </tr>";
while($cetak=mysql_fetch_array($hasil)){
echo "  <tr>
            <td>".$cetak['id']."</td>
			<td>".$cetak['nama']."</td>
			<td>".$cetak['alamat']."</td>
			<td>".$cetak['email']."</td>
			<td>".$cetak['tanggal']."</td>
			<td>".$cetak['komentar']."</td>
			<td><a href='hapuskontak.php?id=".$cetak['id']."' ><img src=images/del.png width=20></a></td>
        </tr>";}
echo "</table>
</fieldset>
</fieldset>";
?>
<?php include('bawah.php'); ?>