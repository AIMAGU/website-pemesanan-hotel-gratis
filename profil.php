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
	<link rel="stylesheet" type="text/css" href="profil/css/scrollable-horizontal.css">
    <link rel="stylesheet" type="text/css" href="profil/css/scrollable-buttons.css">
    <script type="text/javascript" src="profil/jquery.tools.min.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
      	$("div.scrollable").scrollable();

        $(".items img").click(function() {

	         // hilangkan _t dibelakang nama file foto untuk foto yang besar
	         // misal foto kecil (air_t.jpg) dihilangkan _t untuk foto besar menjadi (air.jpg)
	         var url = $(this).attr("src").replace("_t", "");

	         // untuk area gambar besar diberikan efek fade (semi transparan)
	         var wrap = $("#image_wrap").fadeTo("medium", 0.5);

	         // load foto
           var img = new Image();
              img.onload = function() {
              wrap.fadeTo("fast", 1);
              wrap.find("img").attr("src", url);
	         };
	         img.src = url;
        }).filter(":first").click();
	    });
	  </script>
    <style>
        /* style untuk image wrapper (preview image)  */
        #image_wrap {
	         width:430px;
	         margin:15px 0 15px 40px;
	         padding:15px 0;
	         text-align:center;
	         background-color:#efefef;
	         border:2px solid #fff;
	         outline:1px solid #ddd;
	         -moz-ouline-radius:4px;
        }
    </style>
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
					<li><a href='berita.php'>Berita</a></li>
					<li class='active'><a href='profil.php'>Profil</a></li>
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
						<?php 	
						include('profil/profil3.php');
						include('profil/profil2.php');
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