<?php
include_once('../connect.php');
include_once('../filter.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
FilterGetIn($_GET['id']);
?>
<?php
if($_GET['f']==1){
$handel_s = mysql_query("SELECT * FROM categoryinfo WHERE fid='{$_GET['id']}'");

if(mysql_num_rows($handel_s)){
	?>
<script>
alert("Subcategories exist under the current classification!");
location.href="<?php  echo $_SERVER['HTTP_REFERER']; ?>";
</script>
    
<?php	
return ;	
}

$sql = "
		delete
		FROM categoryinfo
		WHERE
		cid = '{$_GET['id']}'
		";
$query = mysql_query($sql);
if($query){

echo "<script language=\"javascript\">";
	  echo "alert(\"Delete successful.\");";
	  echo "location.href=\"cate-list.php\"";
	  echo "</script>";
	  exit;
}else{

echo "<script language=\"javascript\">";
	  echo "alert(\"Delete error.\");";
	  echo "location.href=\"cate-list.php\"";
	  echo "</script>";	
	  exit;
}

	
	
}else{

$handel_s = mysql_query("SELECT * FROM products WHERE pcid='{$_GET['id']}'");

if(mysql_num_rows($handel_s)){
	?>
<script>
alert("Existence of the goods under the current classification,can not be deleted!");
location.href="<?php  echo $_SERVER['HTTP_REFERER']; ?>";
</script>
    
<?php	
return ;	
	}
}
$sql = "
		delete
		FROM categoryinfo
		WHERE
		cid = '{$_GET['id']}'
		";
$query = mysql_query($sql);
if($query){
echo "<script language=\"javascript\">";
	  echo "alert(\"Delete successful.\");";
	  echo "location.href=\"cate-list.php\"";
	  echo "</script>";
	  exit;
}else{
echo "<script language=\"javascript\">";
	  echo "alert(\"Delete error.\");";
	  echo "location.href=\"cate-list.php\"";
	  echo "</script>";	
}
	
?>
<a href="cate-list.php">Go back</a>

<div class="clr"></div>

</div>
</body>
</html>
