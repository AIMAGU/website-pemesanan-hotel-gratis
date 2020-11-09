<?php
//cek apakah login
if(!isset($_SESSION['username'])){
    die("<script type='text/javascript'>
				alert('Maaf, anda belum login! ".$_SESSION['username']."');
				window.location = 'index.php'
				</script>");//jika belum login jangan lanjut..
}

//cek status customer
if($_SESSION['status']!="customer"){
    die("<script type='text/javascript'>
				alert('Maaf, anda bukan pelanggan kami!');
				window.location = 'index.php'
				</script>");//jika bukan customer jangan lanjut
}
?>

<html>
<head><title>Halaman Pelanggan</title></head>
<body>
<fieldset>
<?php echo "<legend><h2>Selamat Datang <span>".$_SESSION['username']."</span></h2></legend>";
$username=$_SESSION['username'];
$hasiluser=mysql_query("SELECT *FROM transaksi where pembeli='$username'");
$cetakuser=mysql_fetch_array($hasiluser);
$idtransaksi=$cetakuser['idtransaksi'];
include('menucus.php');
?>
<?php echo "<h4>Assalamualaikum ".$_SESSION['username']."! Gunakan tombol dibawah ini untuk reservasi kamar penginapan kami.</h4>" ?> 
<a href="index.php?link=formtransaksi"><img src="pelanggan/images/addtransaksi.png" width="80" title="Reservasi Kamar"></a>
<a href="kontak.php?link=tulis"><img src="pelanggan/images/kontak.png" width="80" title="Kontak_Kami"></a>
<a href="index.php?link=cetakdetail"><img src="pelanggan/images/detail.png" width="80" title="Detail Reservasi Kamar"></a>
</fieldset>
</body>
</html>
