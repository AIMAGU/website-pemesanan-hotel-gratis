<?php
session_start();

//cek apakah sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek status
if($_SESSION['status']!="admin"){
    die("Anda bukan admin");//jika bukan admin jangan lanjut
}
include('atas.php');
echo "<fieldset><legend>Welcome ".$_SESSION['username']."</legend>";
include('menu.php');
$username=$_GET['username'];
echo "<fieldset><legend>KONFIRMASI : Apakah anda yakin akan menghapus data ini?</legend>";
?>
<?php
include('koneksi.php');
$hasil2=mysql_query("SELECT *FROM user where username='$username'");
echo "<table class=tabtab border=1>
		<tr>
			<th>Username</th>
            <th>Password</th>
        </tr>";
while($cetak2=mysql_fetch_array($hasil2)){
echo "<tr>
        <td>".$cetak2['username']."</td>
		<td>".$cetak2['password']."</td>
      </tr>";}
echo "</table>";
?>
<form method='post' action='terimahapususer.php'>
<input type="hidden" name="userhapus" value=<?php echo "'$username'";?>>
<input type='submit' value='Ya'>
<?php echo "<a href=\"javascript:history.back()\">Tidak</a>
</form>
</fieldset>
</fieldset>";
include('bawah.php');
?>