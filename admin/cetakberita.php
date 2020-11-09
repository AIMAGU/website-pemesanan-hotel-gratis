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
echo "<fieldset><legend>Daftar Berita</legend>
<a href='info.php'><img src=images/berita.png width=40 title=Tambah_User ></a>";
$hasil = mysql_query("SELECT *FROM info ORDER BY  idberita DESC");
echo "<table class=tabtab border=1 cellspacing=2 cellpadding=2>
		<tr>
            <th>No</th>
			<th>Judul</th>
			<th>Gambar</th>
			<th width=350>Berita</th>
			<th>Edit</th>
			<th>Del</th>
        </tr>";
while($cetak=mysql_fetch_array($hasil)){
echo "  <tr>
            <td>".$cetak['idberita']."</td>
			<td>".$cetak['judul']."</td>
			<td>".$cetak['gambar']."</td>
			<td width=350>".$cetak['berita']."</td>
			<td><a href='editberita.php?idberita=".$cetak['idberita']."'><img src=images/edit.png width=20></a></td>
			<td><a href='hapusberita.php?idberita=".$cetak['idberita']."' ><img src=images/del.png width=20></a></td>
        </tr>";}
echo "</table>
</fieldset>
</fieldset>";
include('bawah.php'); 
?>