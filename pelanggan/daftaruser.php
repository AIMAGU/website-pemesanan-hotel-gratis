<?php
$idtransaksi=$_POST['idtransaksi'];
$password2=strip_tags($_POST['password']);
$password=md5($password2);
$pembeli=strip_tags($_POST['pembeli']);
$nama=strip_tags($_POST['nama']);
$email=strip_tags($_POST['email']);
$jenisid=strip_tags($_POST['jenisid']);
$noid=strip_tags($_POST['noid']);
$tlp=strip_tags($_POST['tlp']);
$status=$_POST['status'];
$tanggal=date("Y-m-d");

if($password!="" && $pembeli!="" && $nama!="" && $noid!=="" && $jenisid!=""){
$user= mysql_query("INSERT INTO user (username, password, status) VALUES ('$pembeli', '$password', '$status')");
$transaksi = mysql_query("INSERT INTO transaksi (idtransaksi, pembeli, tanggal) VALUES ('$idtransaksi', '$pembeli', '$tanggal')");
$akun = mysql_query("INSERT INTO akun (nama, email, username, jenisid, noid, tlp) VALUES ('$nama', '$email', '$pembeli', '$jenisid', '$noid', '$tlp')");
}
//kirim data ke email pendaftar
if ($transaksi==1 || $user==1 || $akun==1){
				mail('$email', 'LIO ROOM RESERVATION', 'Selamat, $nama telah terdaftar sebagai pelanggan LIO ROOM RESERVATION. \n Nama: $pembeli
				\n Password: $password2 \n Tanggal: $tanggal');
				echo "<script type='text/javascript'>
				alert('Proses pendaftaran berhasil! Silahkan login!');
				window.location = 'index.php'
				</script>";}
else {echo "<script type='text/javascript'>
				alert('Proses pendaftaran gagal, periksa kembali data yang anda isikan.$username');
				window.location = 'index.php?link=daftar'
				</script>";}

?>