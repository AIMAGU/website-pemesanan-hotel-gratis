<link type="text/css" href="pelanggan/js/base/ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="pelanggan/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="pelanggan/js/ui/ui.core.js"></script>
<script type="text/javascript" src="pelanggan/js/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="pelanggan/js/ui/ui.datepicker-id.js"></script>
<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true					
        });
      });
</script>
<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal2").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true					
        });
      });
</script>
<?php
include('cek.php');

// mengolah data hidden
$namacus=$_SESSION['username'];
$hasil=mysql_query("SELECT *FROM transaksi where pembeli='$namacus'");
$idnama=mysql_fetch_array($hasil);
$cet=$idnama['idtransaksi'];

$hasil=mysql_query("SELECT * FROM kamar");
?>
<fieldset>
<legend>FORM TRANSAKSI</legend>
<form method="POST" action="index.php?link=terimatransaksi">
<input type="hidden" name="idtransaksi" value="<?php echo $cet ?>" >
<input type="hidden" name="pembeli" value=<?php echo "".$_SESSION['username']."" ?>>
<pre>
Nama kamar   	<select name="idkamar">
<?php while($cetak=mysql_fetch_array($hasil)){
			echo "<option value=".$cetak['idkamar'].">".$cetak['namakamar']."</option>";}
?>
			</select>
Tanggal Masuk	<input id="tanggal" type="text" name="tglmasuk" value="yyyy-mm-dd">
Tanggal Keluar 	<input id="tanggal2" type="text" name="tglkeluar" value="yyyy-mm-dd">
</pre>
<input type="submit" value="Reservasi">
</form>
</fieldset>
</fieldset>