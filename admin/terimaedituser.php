<?php
$username=$_POST['username'];
$usernamelama=$_POST['usernamelama'];
$status=$_POST['status'];
$password2=strip_tags($_POST['password']);
$password=md5($password2);
$nama=strip_tags($_POST['nama']);
$email=strip_tags($_POST['email']);
$jenisid=strip_tags($_POST['jenisid']);
$noid=strip_tags($_POST['noid']);
$tlp=strip_tags($_POST['tlp']);
include ('koneksi.php');
$hasil = mysql_query("
UPDATE user SET 
username= '$username',
password = '$password',
status = '$status'
WHERE username = '$usernamelama';
");
$hasil2 = mysql_query("
UPDATE akun SET 
nama= '$nama',
email = '$email',
username = '$username',
jenisid = '$jenisid',
noid = '$noid',
tlp = '$tlp'
WHERE username = '$usernamelama';
");
if ($hasil==1){echo "Data berhasil di edit";}
else {echo "Data gagal di edit";}
echo "<br><a href='cetakuser.php'>Lihat Hasil</a>";
?>