<?php
//cek apakah sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek status
if($_SESSION['status']!="customer"){
    die("Anda bukan pelanggan kami");//jika bukan customer jangan lanjut
}

echo "<fieldset><legend>Welcome ".$_SESSION['username']."</legend>";

//menu custemor
$status=$_SESSION['status'];
if($status=="customer"){include('menucus.php');}
?>