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
//proses
$judul=$_POST['judul'];
$unggahfile=$_POST['unggahfile'];
$berita=$_POST['berita'];
$uploaddir = 'gambar/';
$uploadfile= $uploaddir . $_FILES['unggahfile']['name'];
if ($judul!="" && $berita!=""){
if($_FILES['unggahfile']['type']=='')
{echo "<blink>Maaf data kosong / kebesaran file gambar [<50 kb]</blink>";} else
if($_FILES['unggahfile']['type']=='image/jpeg' || $_FILES['unggahfile']['type']=='image/png' || $_FILES['unggahfile']['type']=='image/gif' || $_FILES['unggahfile']['type']=='image/bmp')
{
if(move_uploaded_file($_FILES['unggahfile']['tmp_name'],$uploadfile)){
echo "<blink>Berita berhasil ditambahkan. Terima kasih </blink>";
include ('koneksi.php');
$info= mysql_query("INSERT INTO  info (idberita, judul, gambar, berita) VALUES (NULL,'$judul', '$uploadfile', '$berita');");
if ($info==1){echo "<script type='text/javascript'>
				alert('Berita berhasil ditambahkan!');
				window.location = 'cetakberita.php'
				</script>";}
else {echo "<script type='text/javascript'>
				alert('Berita gagal ditambahkan!');
				window.location = 'info.php?link=daftar'
				</script>";}
echo "<a href=index.php?link=terima6>Lihat Berita Terbaru</a>";
	}
else {echo "<blink>Berita Gagal ditambahkan!</blink>";}
}else
{echo "<blink>Ekstensi file harus [JPEG, GIF, BMP, PNG] </blink>";}
}
else {echo "<blink>Isilah judul dan berita dengan benar!</blink>";}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
Judul Berita :<br>
<input name="judul" type="text" size="60" maxlength="40" >
<br>
Gambar Berita :<br>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000"><input type="file" size="45" name="unggahfile"><br>
Isi berita : <br>
<textarea name="berita" rows="10" style="width: 400px" maxlength="2000" ></textarea><br>
<input type="submit" name="Submit" value="Tambahkan Berita">
<input type="reset" name="reset" value="Bersihkan" >
</form>
</fieldset>
<?php include ('bawah.php');?>