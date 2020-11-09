<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","poll_vote.php?vote="+int,true);
xmlhttp.send();
}
</script>

<div id="poll">
<h3>POLLING <span>LIO</span></h3>
<font color="GreenYellow" size="1"><b>Bagaimana pelayanan kami?</b>
<form>
<input type="radio" name="vote" value="0" onclick="getVote(this.value)" />Bagus
<br />
<input type="radio" name="vote" value="1" onclick="getVote(this.value)" />Cukup
<br />
<input type="radio" name="vote" value="2" onclick="getVote(this.value)" />Kurang
</font>
</form>
</div>