<?php
	//unset($_SESSION['username']);
    //unset($_SESSION['status']);
	session_destroy();
    echo "<script language='javascript'>
			alert('Anda telah keluar, terima kasih');
			window.location = 'index.php';
		  </script>";
?>