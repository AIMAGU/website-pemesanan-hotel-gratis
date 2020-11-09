<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "datapol.txt";
$content = file($filename);

//put content in array
$array = explode("|", $content[0]);
$bagus = $array[0];
$cukup = $array[1];
$kurang = $array[2];
$jumlah = ($bagus+$cukup+$kurang);
if ($vote == 0)
  {
  $bagus = $bagus + 1;
  }
if ($vote == 1)
  {
  $cukup = $cukup + 1;
  }
if ($vote == 2)
  {
  $kurang = $kurang + 1;
  }

//insert votes to txt file
$insertvote = $bagus."|".$cukup."|".$kurang;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>
<h3>POLLING <span>LIO</span></h3>
<strong>Hasil: </strong>
<table>
<tr>
<td>Bagus</td>
<td>
<img src="poll.gif" width="<?php echo(100*round($bagus/($cukup+$bagus+$kurang),2)); ?>" height="10">
<?php echo(100*round($bagus/($cukup+$bagus+$kurang),2)); ?>%
</td>
</tr>
<tr>
<td>Cukup</td>
<td>
<img src="poll.gif" width="<?php echo(100*round($cukup/($cukup+$bagus+$kurang),2)); ?>" height="10">
<?php echo(100*round($cukup/($cukup+$bagus+$kurang),2)); ?>%
</td>
</tr>
<tr>
<td>Kurang</td>
<td>
<img src="poll.gif" width="<?php echo(100*round($kurang/($cukup+$bagus+$kurang),2)); ?>" height="10">
<?php echo(100*round($kurang/($cukup+$bagus+$kurang),2)); ?>%
</td>
</tr>
</table>
<?php echo "<hr>Pemilih: $jumlah orang"; ?>