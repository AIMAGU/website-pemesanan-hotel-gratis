<?php
$username = strip_tags($_POST['username']);
$password = strip_tags(md5($_POST['sandi']));

if($username!="" && $password!=""){
    $cek = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);
        $_SESSION['username'] = $c['username'];
        $_SESSION['status'] = $c['status'];
		if($c['status']=="customer"){
            echo "<script type='text/javascript'>
				alert('Login Sukses!');
				window.location = 'index.php?link=homeuser'
				</script>";}
    }
	else{echo "<script type='text/javascript'>
				alert('Maaf, password anda salah!');
				window.location = 'index.php'
				</script>";
    }
}
else {echo "<script type='text/javascript'>
				alert('Maaf, anda bukan pelanggan kami!');
				window.location = 'index.php'
				</script>";}
?>
