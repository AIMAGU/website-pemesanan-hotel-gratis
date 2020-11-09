      <!-- tempat untuk menampung foto yang besar -->
      <div id="image_wrap">

	     <!-- background untuk foto berupa gambar blank.gif -->
	     <img src="img/blank.gif" width="300"  />
      </div>

      <!-- aksi untuk halaman sebelumnya -->
      <a class="prevPage browse left"></a>

      <!-- elemen untuk scrollable -->
      <div class="scrollable">	
	
	     <!-- elemen untuk items -->
	     <div class="items">
  	    
			<?php $info= mysql_query("SELECT *FROM info");
			while($cetak=mysql_fetch_array($info)){
			echo "<img src='admin/".$cetak['gambar']."' width='460' height='250' title='".$cetak['judul']."'>";}
			?>
      </div>	
    </div>

    <!-- aksi untuk halaman selanjutnya -->
    <a class="nextPage browse right"></a>
    
    <br clear="all"><br>