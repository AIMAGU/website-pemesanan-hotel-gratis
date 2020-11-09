<?php
include ('koneksi.php');
$id=$_GET['id'];
$hapus = "select * from kontak where id='$id'";  
$hasil2 = mysql_query($hapus);
if(mysql_num_rows($hasil2) > 0 ){  
        $data = mysql_fetch_array($hasil2); 
		$hasil = mysql_query("DELETE FROM kontak WHERE id='$id'");}
if ($hasil==1){echo "<script type='text/javascript'>
				alert('Kontak berhasil dihapus!');
				window.location = 'cetakkontak.php'
				</script>";}
else {echo "<script type='text/javascript'>
				alert('Kontak gagal dihapus!');
				window.location = 'cetakkontak.php'
				</script>";}
?>