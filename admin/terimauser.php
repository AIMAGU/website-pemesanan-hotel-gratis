<?php
$idtransaksi=$_POST['idtransaksi'];
$password2=strip_tags($_POST['password']);
$password=md5($password2);
$pembeli=strip_tags($_POST['pembeli']);
$status=$_POST['status'];
$tanggal=date("Y-m-d");
$nama=strip_tags($_POST['nama']);
$email=strip_tags($_POST['email']);
$jenisid=strip_tags($_POST['jenisid']);
$noid=strip_tags($_POST['noid']);
$tlp=strip_tags($_POST['tlp']);
include ('koneksi.php');
if($password!="" && $pembeli!="" && $nama!="" && $noid!=="" && $jenisid!=""){
$user= mysql_query("INSERT INTO user (username, password, status) VALUES ('$pembeli', '$password', '$status')");
$transaksi = mysql_query("INSERT INTO transaksi (idtransaksi, pembeli, tanggal) VALUES ('$idtransaksi', '$pembeli', '$tanggal')");
$akun = mysql_query("INSERT INTO akun (nama, email, username, jenisid, noid, tlp) VALUES ('$nama', '$email', '$pembeli', '$jenisid', '$noid', '$tlp')");
}
if ($transaksi==1 && $user==1 && $akun==1){echo "<script type='text/javascript'>
				alert('Proses pendaftaran berhasil!');
				window.location = 'cetakuser.php'
				</script>";}
else {echo "<script type='text/javascript'>
				alert('Proses pendaftaran gagal, silahkan periksa kembali data anda!');
				window.location = 'formuser.php'
				</script>";}
echo "<br><a href='cetakuser.php'>Lihat Daftar User</a>";
?>