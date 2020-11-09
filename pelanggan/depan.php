<link rel="stylesheet" type="text/css" href="slider/engine1/style_slide.css" media="screen" />
<script type="text/javascript" src="slider/engine1/jquery.js"></script>
<h2>SELAMAT DATANG<span> LIO ROOM RESERVATION</span></h2><br>
	<div id="wowslider-container1">
	<div class="ws_images"> 
	<?php 
	$info= mysql_query("SELECT *FROM info");
	$i=0;
		while($cetak=mysql_fetch_array($info)){
		$i++;
		echo "<a href=''><img src='admin/".$cetak['gambar']."' width='460' height='250' title='".$cetak['judul']."' id='wows$i'/></a>";}
	?>
	</div>
	</div>
<script type="text/javascript" src="slider/engine1/script.js"></script><br><hr>
<p align="justify"><font color="GreenYellow">Lio Room Reservation</font> Solo was established in 2012 by PT.Linda Ocim, which constitutes to be the Owning Company of Lio Room Reservation Solo. It has the form of Limited Liability Company.

Lio Room Reservation Solo offer not only offering lodging service, starting 2012, to improve service to the guests, the Management provide supporting facilities, such us Coffee Shop, Meeting Room, Music Room, Fitness Center, and Japanese Restaurant.

Lio Room Reservation Solo, located at west gate of Surakarta, 4 km from Mangkunegaran Palace, 5 km from the Sunan's Palace or Kraton, 5 km from Goverment Center, 5 km from the famous shopping area of Pasar Klewer. It's only 15 munites from Adi Sumarmo International Airport and 6 minutes from Balapan Train Station by Taxi.

Lio Room Reservation Solo offers a whole range of international standard facilities to business and pleasure travelers.It's business facilities, conference and bangueting service are organized with full attention and "extra care". Total number of room are 128, consisting of 11 Mawar Superior, 14 Anggrek rooms and 103 Melati rooms.
<br><center>***</center></p><hr>
  