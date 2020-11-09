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
?>
<?php include('atas.php'); ?>
<fieldset>
<?php echo "<legend>Welcome ".$_SESSION['username']."</legend>";
include('menu.php');?>
Selamat Datang dihalaman Administrator, Kelolalah dengan bijak halaman ini.<br>
<a href="form.php"><img src="images/addkat.png" width="50" title="Tambah kategori kamar"></a>
<a href="formkamar.php"><img src="images/addkamar.png" width="50" title="Tambah kamar"></a>
<a href="formtransaksi.php"><img src="images/addtransaksi.png" width="50" title="Tambah Reservasi Kamar"></a>
<a href="formuser.php"><img src="images/adduser.png" width="50" title="Tambah User"></a>
<a href="info.php"><img src="images/berita.png" width="50" title="Tambah Berita"></a>
<a href="backup.php"><img src="images/backup.png" width="50" title="Backup Transaksi"></a>
<a href="log.php?op=out"><img src="images/login.png" width="50" title="Keluar"></a>
</fieldset>
<?php include('bawah.php'); ?>