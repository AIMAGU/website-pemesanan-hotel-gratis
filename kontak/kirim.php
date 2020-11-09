<?php
//session_start();
//membaca kode verifikasi dari form
$random = $_POST['kode'];
// cek kode verifikasi terenkripsi dengan kode session
if (md5($random) == $_SESSION['image_random_value'])
{
// membaca data isian form + mencegah XSS dengan htmlentities()
$namaPengisi = strtoupper(htmlentities($_POST['nama']));
$alamatPengisi = htmlentities($_POST['alamat']);
$emailPengisi = htmlentities($_POST['email']);
$komentarPengisi = htmlentities($_POST['komentar']);
// cek validitas data isian (tidak boleh ada data yang kosong)
if (!empty($namaPengisi) && !empty($alamatPengisi) &&
!empty($emailPengisi) && !empty($komentarPengisi))
{
// koneksi ke mysql
include "koneksi.php";
// membaca tanggal ketika data dikirim
$tanggal = date("d/m/Y G:i:s");
// simpan data ke mysql
$query = "INSERT INTO kontak(nama, alamat, email,
tanggal, komentar) VALUES('$namaPengisi',
'$alamatPengisi','$emailPengisi','$tanggal',
'$komentarPengisi')";
$hasil = mysql_query($query);
// konfirmasi pengiriman
if ($hasil) echo "<script type='text/javascript'>
				alert('Komentar Berhasil dikirim');
				window.location = 'kontak.php?link=lihat'
				</script>";
else echo "<script type='text/javascript'>
				alert('Maaf, komentar gagal dikirim');
				window.location = 'kontak.php?link=tulis'
				</script>";
// menutup koneksi ke mysql
mysql_close($conn);
}
else echo "<script type='text/javascript'>
				alert('Maaf, isilah data diatas dengan lengkap!');
				window.location = 'kontak.php?link=tulis'
				</script>";
}
else echo "<script type='text/javascript'>
				alert('Maaf, kode verifikasi yang anda masukkan salah !!');
				window.location = 'kontak.php?link=tulis'
				</script>";
?>