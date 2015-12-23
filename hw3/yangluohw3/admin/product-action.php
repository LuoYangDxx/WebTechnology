<?php
include_once('../connect.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
<style>
	body{
		background: #FDF5E6;
    height: 100%;
	}
</style>
</head>

<body>
<div class="wrap">
<?php
include "manage-header.php";
?>
<div class="title">Add Product</div>
<?php

if ($_POST) {
	$newname = time() . $_FILES['thumb']['name'];
	$uploadfile = '../upload/products/' .$newname ; 
	move_uploaded_file($_FILES['thumb']['tmp_name'], $uploadfile);
	if (!get_magic_quotes_gpc()) 
		{ 
		$_POST['content'] = addslashes($_POST['content']);
		}		
	
	$sql = "
			INSERT INTO  products 
			SET
			pcid  = '{$_POST['cid']}',
			title = '{$_POST['title']}',
			price = '{$_POST['price']}',
			content = '{$_POST['content']}',
			thumb = '{$newname}',
			is_spsale = '{$_POST['sp']}',
			oldprice = '{$_POST['oprice']}',
			startdate = '{$_POST['sdate']}',
			enddate = '{$_POST['edate']}'
			";
	$a = mysql_query($sql);
}
if ($a) {
      echo "<script language=\"javascript\">";
	  echo "alert(\"Operation is successful！\");";
	  echo "location.href=\"product-add.php\"";
	  echo "</script>";
}
?>



</div>
</body>
</html>
