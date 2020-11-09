<h2>KONTAK<span> KAMI</span></h2>
<script defer type="text/javascript" src="pngfix.js"></script>
	<style>
#lembar {width:520px;}
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
    $("#lembar").jPaginate();                       
});
</script>
<?php
include "koneksi.php";
$query = "SELECT * FROM kontak ORDER BY id DESC";
$result = mysql_query($query) or die('Database tidak bisa diakses');
// menampilkan data
echo "<div id='lembar'>";
while($data = mysql_fetch_array($result))
{
echo "<table border='0' cellspacing='2' cellpadding='2'>
		<tr><td>.</td><td></td><td></td></tr>
		<tr><td><font color=YellowGreen><strong>".$data['nama']."</strong></font></td><td></td><td><font color=YellowGreen><i>".$data['tanggal']."</i></font></td></tr>
		<tr><td>Alamat</td><td>:</td><td>".$data['alamat']."</td></tr>
		<tr><td>Email</td><td>:</td><td>".$data['email']."</td></tr>
		<tr><td>Komentar</td><td>:</td><td>".$data['komentar']."</td></tr>
	  </table>";
}
echo "</div><a href='kontak.php?link=tulis'>Buat Komentar</a>";
mysql_close($conn);
?>