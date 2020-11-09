<?php
include('koneksi.php');
//nama tabel yang ingin dibackup
$tabel = 'transaksi';
//letak file disimpan
$backupocim = 'D:\lio_transaksi.sql';
$ocim = "LOAD DATA INFILE '$backupocim' INTO TABLE $tabel";
$verifikasi = mysql_query($ocim);
if ($verifikasi) echo "<script type='text/javascript'>
				alert('Selamat, restore berhasil');
				window.location = 'homeadmin.php'
				</script>";
else echo "<script type='text/javascript'>
				alert('Maaf, restore gagal!');
				window.location = 'homeadmin.php'
				</script>";
?>