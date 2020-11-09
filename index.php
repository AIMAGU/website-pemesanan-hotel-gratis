<?php
//error_reporting(0);
session_start();
//untuk menghindari hacking
session_regenerate_id();
include('koneksi.php');
if(!empty($_SESSION['username']) && !empty($_SESSION['status'])){
	$username=$_SESSION['username'];
	$status=$_SESSION['status'];	
}else{
	$username=null;
	$status=null;
}
$link=$_GET['link'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>.: LIO ROOM RESERVATION :.</title>
	<link rel="icon" href="img/fav.ico" type="image/x-icon"/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<style media="all" type="text/css">@import "css/all.css";</style>
	<!--[if lt IE 7]><style media="screen" type="text/css">@import "css/ie6.css";</style><![endif]-->
    <script defer type="text/javascript" src="pngfix.js"></script>
</head>
<body>
	<div id="page">
		<div id="header">
			<div class="background">
				<h1><a href="index.php">Lio Room Reservation</a></h1>
				<ul>
					<li class="active"><a href="index.php">Depan</a></li>
					<?php if ($username!="" && $status=="customer"){echo"
					<li><a href='index.php?link=formtransaksi'>Reservasi</a></li>
					<li><a href='kontak.php'>Kontak Kami</a></li>
					<li><a href='index.php?link=keluar'>Keluar</a></li>";}
					else {echo"
					<li><a href='berita.php'>Berita</a></li>
					<li><a href='profil.php'>Profil</a></li>
					<li><a href='kontak.php'>Kontak Kami</a></li>";}
					?>
				</ul>
			</div>
		</div>
		<div id="content">
			<div id="leftcol">
				<div class="block">
					<div class="block-top"></div>
					<div class="block-content">
						<?php 	if($link==''){include('pelanggan/depan.php');} else
						if($link=='cek'){include('pelanggan/log.php');}else
						if($link=='homeuser'){include('pelanggan/homeuser.php');}else
						if($link=='formtransaksi'){include('pelanggan/formtransaksi.php');}else
						if($link=='terimatransaksi'){include('pelanggan/terimatransaksi.php');}else
						if($link=='cetakdetail'){include('pelanggan/checkout.php');}else
						if($link=='daftar'){include('pelanggan/daftar.php');}else
						if($link=='daftaruser'){include('pelanggan/daftaruser.php');}else
						if($link=='deletedetail'){include('pelanggan/deletedetail.php');}else
						if($link=='terimadeletedetail'){include('pelanggan/terimadeletedetail.php');}else
						if($link=='editdetail'){include('pelanggan/editdetail.php');}else
						if($link=='terimaeditdetail'){include('pelanggan/terimaeditdetail.php');}else
						if($link=='keluar'){include('pelanggan/keluar.php');}else
						if($link=='homeadmin'){include('admin/homeadmin.php');}else
						{include('pelanggan/depan.php');}
						?>
					</div>
					<div class="block-bottom"></div>
				</div>
			</div>
			<div id="rightcol">
				<div class="block">
					<div class="block-top"></div>
					<div class="block-content">
						<?php if ($username!="" && $status=="customer"){echo "<h3>LOGIN <span>USER</span></h3><fieldset><legend>Status | <a href='index.php?link=homeuser'>Akun</a> | <a href='index.php?link=keluar'>Keluar</a></legend>Anda Login sebagai <font color=red>$username</font>
						</fieldset>";}
						else {echo "<h3>RESER<span>VATION</span></h3><a href='index.php?link=daftar'><img src='img/reservation.gif' alt='reservation' width='168'/></a>";}
						?>
						<!--<a class="yellow-button"><span>See Menu</span></a>-->
					</div>
					<div class="block-bottom"></div>
				</div>
				<div class="block">
					<div class="block-top"></div>
					<div class="block-content">
							<?php if ($username!="" && $status=="customer"){echo "<h3>RESER<span>VATION</span></h3><a href='index.php?link=formtransaksi'><img src='img/reservation.gif' alt='langsung' width='168' class='border-right-bottom'/></a>";}
							else {echo "<h3>LOGIN <span>USER</span></h3>
							<form id='signup-form' action='index.php?link=cek' method='post'>
							<label>Username</label>
							<input type='text' name='username' />
							<label>Password</label>
							<input type='password' name='sandi' />
							<input class='submit' type='submit' value='Login' />
							</form><a href='index.php?link=daftar'>Daftar</a>";}
							?>
					</div>
					<div class="block-bottom"></div>
				</div>
				<div class="block">
					<div class="block-top"></div>
					<div class="block-content">
						<?php include ('pol.php'); ?>
					</div>
					<div class="block-bottom"></div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p><font color="GreenYellow">©<?php $th=date("Y"); echo $th;?> LIO ROOM RESERVATION.</font> Design by Dellustrations & Ocim</p>
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php if ($username!=""){echo"
					<li><a href='index.php?link=formtransaksi'>Reservasi</a></li>
					<li><a href='kontak.php'>Kontak Kami</a></li>
					<li><a href='index.php?link=keluar'>Keluar</a></li>";}
					else {echo"
					<li><a href='berita.php'>Berita</a></li>
					<li><a href='profil.php'>Profil</a></li>
					<li><a href='kontak.php'>Kontak Kami</a></li>";}
				?>
			</ul>
		</div>
	</div>
</body>
</html>