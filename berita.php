<?php
error_reporting(0);
session_start();
//untuk menghindari hacking
session_regenerate_id();
include('koneksi.php');
$username=$_SESSION['username'];
$status=$_SESSION['status'];
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
	<style>
#halaman {width:520px;}
.pagination {list-style:none; margin:10px 0px 0px 0px; padding:0px; clear:both;}
.pagination li{float:left; margin:3px;}
.pagination li a{display:block; padding:3px 5px; color:#fff; background-color:#DAA520; text-decoration:none;}
.pagination li a.active {border:1px solid #FF8C00; color:#FF8C00; background-color:#fff;}
.pagination li a.inactive {background-color:#eee; color:#777; border:1px solid #ccc;}
</style>
<script src="jquery.js"></script>
<script src="jPaginate.js"></script>
<script>
$(document).ready(function(){
    $("#halaman").jPaginate();                       
});
</script>
</head>
<body>
	<div id="page">
		<div id="header">
			<div class="background">
				<h1><a href="index.php">Lio Room Reservation</a></h1>
				<ul>
					<li><a href="index.php">Depan</a></li>
					<?php if ($username!="" && $status=="customer"){echo"
					<li><a href='index.php?link=formtransaksi'>Reservasi</a></li>
					<li><a href='kontak.php'>Kontak Kami</a></li>
					<li><a href='index.php?link=keluar'>Keluar</a></li>";}
					else {echo"
					<li class='active'><a href='berita.php'>Berita</a></li>
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
						<div id="halaman">
						<?php
						$waktu = date("l, d F Y");
						$info= mysql_query("SELECT *FROM info ORDER BY idberita DESC");
						$i=0;
						while($cetak=mysql_fetch_array($info)){
						$i++;
						echo "<table width=520 border=0 cellspacing=2 cellpadding=2>
								<tr>
								<td bgcolor=#2E8B57><font color=GreenYellow size=3>[".$cetak['idberita']."] <strong>".$cetak['judul']."</strong></font></td>
								</tr>
								<tr>
								<td><img src='admin/".$cetak['gambar']."' width=160 style=float:left; ><p align=justify>".$cetak['berita']."</p></td>
								</tr>
								<tr><td bgcolor=#9ACD32 align=right><font color=white>$waktu</font></td></tr>
							  </table>";}
						?>
						</div>
					</div>
					<div class="block-bottom"></div>
				</div>
			</div>
			<div id="rightcol">
				<div class="block">
					<div class="block-top"></div>
					<div class="block-content">
						<?php if ($username!="" && $status=="customer"){echo "<h3>LOGIN <span>USER</span></h3><fieldset><legend>Status  | <a href='index.php?link=homeuser'>Akun</a> | <a href='index.php?link=keluar'>Keluar</a></legend>Anda Login sebagai <font color=red>$username</font>
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