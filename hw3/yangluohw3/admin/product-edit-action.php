<?php
include_once('../connect.php');
if ($_POST) {
	//echo $_POST['thumb'];
	//echo "<P>";
	if (!empty($_FILES['thumb2']["name"])) {
		$newname = time() . $_FILES['thumb2']['name'];
		$uploadfile = '../upload/products/' . $newname; 
		move_uploaded_file($_FILES['thumb2']['tmp_name'], $uploadfile);
		$_POST['thumb'] = $newname;
		}
	//	echo $_POST['thumb'];
    	if (!get_magic_quotes_gpc()) 
		{ 
		$_POST['content'] = addslashes($_POST['content']);
		
		}		
		
	$sql = "
			UPDATE  products 
			SET
			pcid = '{$_POST['cid']}',
			title = '{$_POST['title']}',
			price = '{$_POST['price']}',
			content = '{$_POST['content']}',
			thumb = '{$_POST['thumb']}',
			is_spsale = '{$_POST['sp']}',
			oldprice = '{$_POST['oprice']}',
			startdate = '{$_POST['sdate']}',
			enddate = '{$_POST['edate']}'
			WHERE id = {$_GET['id']}
			";
	$a = mysql_query($sql);
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
<style>
  body{
    background: #FDF5E6;
  }
</style>
</head>
<body>
<div class="wrap">
<?php
include "manage-header.php";

if ($a) {
echo "<script language=\"javascript\">";
	    echo "alert(\"Operation is successful!!\");";
	    echo "location.href=\"index.php\"";
	    echo "</script>";

}
?>



</div>
</body>
</html>
