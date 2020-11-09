<?php 
include('koneksi.php');
 $id = $_GET['q']; 
 $query = mysql_query("select username from user where username='$id'"); 
 
if(mysql_num_rows($query)==0){ 
    echo "$id bisa digunakan"; 
}else{ 
    echo "$id tidak bisa digunakan!"; 
} 
?>