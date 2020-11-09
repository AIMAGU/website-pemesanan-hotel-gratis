<?php
$iddetail=$_POST['iddetail'];
$idtransaksi=$_POST['idtransaksi'];
$hasil = mysql_query("
DELETE FROM detailtransaksi WHERE detailtransaksi.iddetail = '$iddetail'
");
if ($hasil==1){echo "Data berhasil di batalkan ";}
else {echo "Data gagal di Hapus";}
echo "<a href='index.php?link=homeuser'>kembali</a>";
?>