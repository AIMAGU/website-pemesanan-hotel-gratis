<link rel="stylesheet" href="pelanggan/val.css" type="text/css" />

  <script type="text/javascript" src="pelanggan/js/jquery-1.4.js"></script>
  <script type="text/javascript" src="pelanggan/js/jquery.validate.js"></script>
  <script type="text/javascript">
		$(document).ready(function() {
			$("#form1").validate({
				rules: {
				  nama: "required",
				  tlp: {
				  required: true,
					   number: true
					},
					noid: {
					required: true,
					   number: true
					},
					jenisid: {
					required: true,
					   minlength:1
					},
					username: "required",
					password: {
					required: true,
					   minlength: 4
					},		
					cpassword:
					{
				      required: true,
				      equalTo: "#password"
					},
					email: {				
						required: true,
						email: true
					}
					},
			
      	messages: { 
			    nama: {
				    required: '. Nama harus di isi'
			    },
				tlp: {
				    required: '. Phone harus di isi',
				    number  : '. Hanya boleh di isi Angka ya'
			    },
				noid: {
				    required: '. No Identitas harus di isi',
				    number  : '. Hanya boleh di isi Angka'
			    },
				jenisid: {
				    required: '. Jenis Identitas harus di pilih',
				    minlength: '. Masih Kosong!'
			    },
				  username: {
				    required: '. Username harus di isi'
			    },
			    password: {
				    required : '. Password harus di isi',
				    minlength: '. Password minimal 4 karakter'
			    },
			    cpassword: {
				    required: '. Ulangi Password harus di isi',
				    equalTo : '. Isinya harus sama dengan Password'
			    },
			    email: {
				    required: '. Email harus di isi',
				    email   : '. Email harus valid'
			    }
			   },
         
         success: function(label) {
            label.text('OK!').addClass('valid');
         }
			});
		});
</script>
<script> 
var ocim, kata, x; 
function cekusername(){ 
    kata = document.getElementById("username").value; 
    if(kata.length>2){ 
        document.getElementById("teks").innerHTML = "Mengecek..."; 
		ocim = buatajax(); 
        var url="pelanggan/cekusername.php"; 
        url=url+"?q="+kata; 
        url=url+"&sid="+Math.random(); 
        ocim.onreadystatechange=stateChanged; 
        ocim.open("GET",url,true); 
        ocim.send(null); 
    }else{ 
        fokus(); 
 
    } 
} 
 
function buatajax(){ 
    if (window.XMLHttpRequest){ 
    return new XMLHttpRequest(); 
    } 
    if (window.ActiveXObject){ 
        return new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    return null; 
} 
 
function stateChanged(){ 
	var data; 
    if (ocim.readyState==4){ 
        data=ocim.responseText; 
        document.getElementById("teks").innerHTML = data; 
    } 
} 
 
function fokus(){ 
    document.getElementById("username").focus(); 
} 
</script>
<?php
// mengolah data hidden
$hasiltran=mysql_query("SELECT
MAX(transaksi.idtransaksi) as idbaru from transaksi");
$cetaktran=mysql_fetch_array($hasiltran);
$cet=$cetaktran[0];
$absen=substr($cet,5,1)+1;
$cet2=substr($cet,0,5);

//cetak status combobox
$hasil=mysql_query("SELECT * FROM user
GROUP BY user.status");
?>
<h3>FORM PENDAFTARAN RESERVASI</h3><hr>
<div class="form-div">
<form method="POST" action="index.php?link=daftaruser" id="form1">
<input type="hidden" name="status" value="customer" >
<input type="hidden" name="idtransaksi" value="<?php echo $cet2.$absen ?>" >
<pre>
<div class="form-row">Nama Lengkap* 	<input type="text" name="nama" id="nama"></div>
<div class="form-row">Email*		<input type="text" name="email" id="email"></div>
<div class="form-row">Jenis Id*	<select name="jenisid" id="jenisid">
				<option value="ktp">KTP</option>
				<option value="sim">SIM</option>
				<option value="pasport">Pasport</option>
			</select></div>
<div class="form-row">No Identitas*	<input type="text" name="noid" id="noid"></div>
<div class="form-row">Phone/ HP* 	<input type="text" name="tlp" id="tlp"></div>
<div class="form-row">Username*   	<input type="text" name="pembeli" id="username" onblur="cekusername()"><span id="teks" style="color:YellowGreen;font-size:8pt"></span></div>
<div class="form-row">Password*	<input type="password" name="password" id="password"></div>
<div class="form-row">Ulangi Password*	<input type="password" name="cpassword" id="cpassword"></div>
</pre>
<input type="submit" value="Daftar" class="submit"><input type="reset" value="Ulangi" class="reset">
</form>
</div>
<p align="right">* Wajib di isi.</p>