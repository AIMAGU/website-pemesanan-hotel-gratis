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
$hasil=mysql_query("SELECT * FROM akun, user WHERE akun.username=user.username;");
echo "<fieldset><legend>Daftar Akun User</legend>
		<a href='formuser.php'><img src=images/adduser.png width=40 title=Tambah_User ></a>
		<div id=batastabel><table class='tabtab' border=1>
		<tr>
            <th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Status</th>
            <th>Nama</th>
			<th>Email</th>
			<th>Jenis Id</th>
            <th>No Identitas</th>
			<th>Phone</th>
			<th>Edit</th>
			<th>Del</th>
        </tr>";
$i=0;
while($cetak=mysql_fetch_array($hasil)){
$i++;
echo "<tr>
		<td>$i</td>
        <td>".$cetak['username']."</td>
		<td>".$cetak['password']."</td>
		<td>".$cetak['status']."</td>
		<td>".$cetak['nama']."</td>
		<td>".$cetak['email']."</td>
		<td>".$cetak['jenisid']."</td>
		<td>".$cetak['noid']."</td>
		<td>".$cetak['tlp']."</td>
		<td><a href='edituser.php?username=".$cetak['username']."'><img src=images/edit.png width=20></a></td>
		<td><a href='hapususer.php?username=".$cetak['username']."'><img src=images/del.png width=20></a></td>
	  </tr>";}
echo "</table></div>";
?>
</fieldset>
</fieldset>
<?php include('bawah.php'); ?>