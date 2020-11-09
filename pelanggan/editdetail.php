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

$iddetail=$_POST['iddetail'];
$hasildetail=mysql_query("SELECT *FROM kamar, detailtransaksi where iddetail='$iddetail'");
$cetakdetail=mysql_fetch_array($hasildetail);
?>
<fieldset>
<legend>EDIT DATA TRANSAKSI</legend>
<form method="POST" action="index.php?link=terimaeditdetail">
<input type="hidden" name="iddetaillama" value=<?php echo"'$iddetail'";?>>
<input type="hidden" name="idtransaksi" value="<?php echo "".$cetakdetail['idtransaksi'].""; ?>" >
<pre>
Nama kamar   	<select name="idkamar">
			<?php $hasil=mysql_query("SELECT *FROM kamar");
			while($cetak=mysql_fetch_array($hasil)){
			echo "<option value='".$cetak['idkamar']."'"; if($cetak['idkamar']==$cetakdetail['idkamar']){echo "selected";} 
			echo ">".$cetak['namakamar']."</option>";}
			?>
			</select>
Tanggal Masuk	<input id="tanggal" type="text" name="tglmasuk" value="<?php echo "".$cetakdetail['tglmasuk'].""; ?>" >
Tanggal Keluar 	<input id="tanggal2" type="text" name="tglkeluar" value="<?php echo "".$cetakdetail['tglkeluar'].""; ?>" >
</pre>
<input type="submit" value="Edit">
<?php echo "<a href=\"javascript:history.back()\">Batal</a>" ?>
</form>
</fieldset>
</fieldset>