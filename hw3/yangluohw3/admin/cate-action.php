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

if ($_POST) {
	
	
	$sql = "
			INSERT INTO  categoryinfo 
			SET
			fid = '{$_POST['fid']}',
			cname = '{$_POST['cname']}'
			";
	$a = mysql_query($sql);
}
if ($a) {
     echo "<script language=\"javascript\">";
     echo "alert(\"Operation is successful!!\");";
     echo "location.href=\"cate-add.php\"";
     echo "</script>";
}
?>
</div>
</body>
</html>
