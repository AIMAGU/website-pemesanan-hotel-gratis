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
$idkategorikamar=$_GET['idkategorikamar'];
echo "<fieldset><legend>KONFIRMASI : Apakah anda yakin akan menghapus data ini?</legend>";
?>
<?php
include('koneksi.php');
$hasil=mysql_query("SELECT kategori.*
FROM kategori
where (kategori.idkategorikamar='$idkategorikamar')");
echo "<table class=tabtab border=1>
		<tr>
			<th>id Kategori kamar</th>
            <th>Nama Kategori</th>
        </tr>";
while($cetak=mysql_fetch_array($hasil)){
echo "<tr>
        <td>".$cetak['idkategorikamar']."</td>
		<td>".$cetak['namakategori']."</td>
      </tr>";}
echo "</table><br>";
?>
<form method='post' action='terimahapuskategori.php'>
<input type='hidden' name='idkategorikamar' value=<?php echo "'$idkategorikamar'";?>>
<input type='submit' value='Ya'>
<?php echo "<a href=\"javascript:history.back()\">Tidak</a>
</form>
</fieldset>
</fieldset>"; 
include('bawah.php');
?>