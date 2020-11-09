<?php
session_start();
?>
<script> 
var ocim, kata, x; 
function cekusername(){ 
    kata = document.getElementById("username").value; 
    if(kata.length>2){ 
        document.getElementById("teks").innerHTML = "Mengecek..."; 
		ocim = buatajax(); 
        var url="cekusername.php"; 
        url=url+"?q="+kata; 
        url=url+"&sid="+Math.random(); 
        ocim.onreadystatechange=stateChanged; 
        ocim.open("GET",url,true); 
        ocim.send(null); 
    }else{ 
        fokus(); 
 
    } 
} 
 
function buatajax(){ 
    if (window.XMLHttpRequest){ 
    return new XMLHttpRequest(); 
    } 
    if (window.ActiveXObject){ 
        return new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    return null; 
} 
 
function stateChanged(){ 
	var data; 
    if (ocim.readyState==4){ 
        data=ocim.responseText; 
        document.getElementById("teks").innerHTML = data; 
    } 
} 
 
function fokus(){ 
    document.getElementById("username").focus(); 
} 
</script>
<?php
//cek apakah sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek status
if($_SESSION['status']!="admin" && $_SESSION['status']!="customer"){
    die("Anda bukan customer kami");//jika bukan admin dan customer jangan lanjut
}
include('atas.php');
echo "<fieldset><legend>Welcome ".$_SESSION['username']."</legend>";
include('koneksi.php');

//menu admin atau custemor
$status=$_SESSION['status'];
if($status=="admin"){
include('menu.php');} else {include('menucus.php');}

// mengolah data hidden
$hasiltran=mysql_query("SELECT
MAX(transaksi.idtransaksi) as idbaru from transaksi");
$cetaktran=mysql_fetch_array($hasiltran);
$cet=$cetaktran[0];
$absen=substr($cet,5,1)+1;
$cet2=substr($cet,0,5);

//cetak status combobox
$hasil=mysql_query("SELECT * FROM user
GROUP BY user.status");
?>
<fieldset><legend>FORM USER</legend>
<form method="POST" action="terimauser.php">
<input type="hidden" name="idtransaksi" value="<?php echo $cet2.$absen ?>" >
<pre>
Nama Lengkap* 	<input type="text" name="nama">
Email		<input type="text" name="email">
Jenis Id	<select name="jenisid">
				<option value="ktp">KTP</option>
				<option value="sim">SIM</option>
				<option value="pasport">Pasport</option>
			</select>
No Identitas	<input type="text" name="noid">
Phone/ HP 	<input type="text" name="tlp">
Username*  	<input type="text" name="pembeli" id="username" onblur="cekusername()"><span id="teks" style="color:red;font-size:8pt"></span>
Password*	<input type="password" name="password">
Status*		<select name="status">
			<option value="admin">Admin</option>
			<option value="customer">Customer</option>
			</select>
</pre>
<input type="submit" value="Daftar">
</form>
</fieldset>
</fieldset>
<?php include('bawah.php') ?>