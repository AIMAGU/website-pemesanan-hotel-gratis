<?php
session_start();

$username = strip_tags($_POST['username']);
$password = strip_tags(md5($_POST['sandi']));
$op = $_GET['op'];

if($op=="in"){
	include('koneksi.php');
    $cek = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);
        $_SESSION['username'] = $c['username'];
        $_SESSION['status'] = $c['status'];
        if($c['status']=="admin"){
            echo "<script type='text/javascript'>
				alert('Login Sukses!');
				window.location = 'homeadmin.php'
				</script>";
        }
		}else{
			die("<script type='text/javascript'>
				alert('Password salah, silahkan ulangi!');
				window.location = 'index.php'
				</script>");
		}
}else if($op=="out"){
    unset($_SESSION['username']);
    unset($_SESSION['status']);
    echo "<script type='text/javascript'>
				alert('Anda sudah keluar. Terima Kasih!');
				window.location = 'index.php'
				</script>";
}
?>
