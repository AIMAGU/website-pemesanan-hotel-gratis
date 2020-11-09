<?php
include ('koneksi.php');
$idberita=$_GET['idberita'];
$hapus = "select * from info where idberita='$idberita'";  
$hasil2 = mysql_query($hapus);
if(mysql_num_rows($hasil2) > 0 ){  
        $data = mysql_fetch_array($hasil2);  
        //hapus file  
        @unlink($data['gambar']);
		$hasil = mysql_query("DELETE FROM info WHERE idberita='$idberita'");}
if ($hasil==1){echo "<script type='text/javascript'>
				alert('Berita berhasil dihapus!');
				window.location = 'cetakberita.php'
				</script>";}
else {echo "<script type='text/javascript'>
				alert('Berita gagal dihapus!');
				window.location = 'cetakberita.php'
				</script>";}
?>