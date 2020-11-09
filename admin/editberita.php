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
include ('koneksi.php');
$idberita=$_GET['idberita'];
$hasilberita=mysql_query("SELECT * FROM info WHERE idberita='$idberita'");
$cetakberita=mysql_fetch_array($hasilberita);
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
@unlink($cetakberita['gambar']);
$info= mysql_query("UPDATE info SET 
idberita= $idberita,
judul = '$judul',
gambar = '$uploadfile',
berita = '$berita'
WHERE idberita = '$idberita';");
if ($info==1){echo "<script type='text/javascript'>
				alert('Berita berhasil diubah!');
				window.location = 'cetakberita.php'
				</script>";}
else {echo "<script type='text/javascript'>
				alert('Berita gagal diubah!');
				window.location = 'editberita.php?idberita=$idberita'
				</script>";}
	}
else {echo "<blink>Berita Gagal diubah!</blink>";}
}else
{echo "<blink>Ekstensi file harus [JPEG, GIF, BMP, PNG] </blink>";}
}
else {echo "<blink>Isilah judul dan berita dengan benar!</blink>";}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
Judul Berita :<br>
<input name="judul" type="text" size="30" maxlength="30" value=<?php echo "'".$cetakberita['judul']."'"; ?>>
<br>
Gambar Berita :<br>
<img src="<?php echo $cetakberita['gambar'];?>" width="100"/><br>
<input type="hidden" name="MAX_FILE_SIZE" value="50000"><input type="file" size="30" name="unggahfile"><br>
Isi berita : <br>
<textarea name="berita" rows="10" style="width: 400px" maxlength="2000"><?php echo "".$cetakberita['berita'].""; ?></textarea><br>
<input type="submit" name="Submit" value="Update Berita">
<input type="reset" name="reset" value="Bersihkan" >
</form>
</fieldset>
<?php include('bawah.php'); ?>