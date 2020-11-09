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
include('koneksi.php');
$username=$_GET['username'];
$hasiluser=mysql_query("SELECT * FROM user WHERE username='$username'");
$cetakuser=mysql_fetch_array($hasiluser);
$hasilakun=mysql_query("SELECT * FROM akun WHERE username='$username'");
$cetakakun=mysql_fetch_array($hasilakun);
?>
<fieldset><legend>EDIT DATA USER</legend>
<form method="POST" action="terimaedituser.php">
<input type="hidden" name="usernamelama" value=<?php echo"'$username'";?>>
<pre>
Nama Lengkap* 	<input type="text" name="nama" value=<?php echo "'".$cetakakun['nama']."'"; ?>>
Email		<input type="text" name="email" value=<?php echo "'".$cetakakun['email']."'"; ?>>
Jenis Id	<select name="jenisid">
				<?php 
$hasilakun2=mysql_query("SELECT *FROM akun GROUP BY akun.jenisid");
while($cetak2=mysql_fetch_array($hasilakun2)){
			echo "<option value='".$cetak2['jenisid']."'";
			if($cetakakun['jenisid']==$cetak2['jenisid']){echo "selected";}
			echo">".$cetak2['jenisid']."</option>";}
			?>
			</select>
No Identitas	<input type="text" name="noid" value=<?php echo "'".$cetakakun['noid']."'"; ?>>
Phone/ HP 	<input type="text" name="tlp" value=<?php echo "'".$cetakakun['tlp']."'"; ?>>
Username   	<input type="text" name="username" value=<?php echo "'".$cetakuser['username']."'"; ?>>
Password   	<input type="password" name="password" value=<?php echo "'".$cetakuser['password']."'"; ?>>
Status     	<select name="status" >
<?php 
$hasil=mysql_query("SELECT *FROM user GROUP BY user.status");
while($cetak=mysql_fetch_array($hasil)){
			echo "<option value='".$cetak['status']."'";
			if($cetakuser['status']==$cetak['status']){echo "selected";}
			echo">".$cetak['status']."</option>";}
			?>
		   </select>
</pre>
<input type="submit" value="Edit">
<?php echo "<a href=\"javascript:history.back()\">Batal</a>
</form>
</fieldset>
</fieldset>";
include('bawah.php'); 
?>