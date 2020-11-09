<?php
include('koneksi.php');
//nama tabel yang ingin dibackup
$tabel = 'transaksi';
//letak file disimpan
$backupocim = 'D:\lio_transaksi.sql';
$ocim = "SELECT * INTO OUTFILE '$backupocim' FROM $tabel";
$verifikasi = mysql_query($ocim);
if ($verifikasi) echo "<script type='text/javascript'>
				alert('Selamat, backup berhasil');
				window.location = 'homeadmin.php'
				</script>";
else echo "<script type='text/javascript'>
				alert('Maaf, backup gagal!');
				window.location = 'homeadmin.php'
				</script>";
?>