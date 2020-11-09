<?php
session_start();
$alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
// menghasilkan kode random sebanyak 5 karakter dari $alphanum
$rand = substr(str_shuffle($alphanum), 0, 5);
// mengenkripsi kode random yang dihasilkan dan digunakan sebagai
// session
$_SESSION['image_random_value'] = md5($rand);
// membuat image 60 x 30 pixel
$image = imagecreate(60, 30);
// memberi warna kuning RGB(255,255,0) pada background
$bgColor = imagecolorallocate ($image, 0, 255, 0);
// memberi warna text hitam RGB(0,0,0)
$textColor = imagecolorallocate ($image, 0, 0, 0);
// meletakkan kode random ke dalam image
imagestring ($image, 5, 5, 8, $rand, $textColor);
// beberapa perintah header untuk mencegah image disimpan di cache
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
// mime untuk menyatakan image berformat JPEG
header('Content-type: image/jpeg');
// menampilkan image ke browser
imagejpeg($image);
imagedestroy($image);
?>