<?php
include_once('../connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style>
  body{
    background: #FDF5E6;
  }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "manage-header.php";

?>

<div class="title">Delete</div>

<?php
$sql = "
		delete
		FROM products
		WHERE
		id = '{$_GET['id']}'
		";
$query = mysql_query($sql);
if($query){
echo "Delete successful.";
}else{
echo "Delete error";	
}
?>
<a href="index.php">Go back</a>

<div class="clr"></div>

</div>
</body>
</html>
