<?php

 if(!$_SESSION['admname']){
	echo "<script>";
	echo "alert('Please login in first！');
	location.href='manage-login.php';";
	echo "</script>";
 }
?>
