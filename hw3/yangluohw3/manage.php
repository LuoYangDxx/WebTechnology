<?php
include_once('connect.php');
include_once('login-check-manage.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "manage-header.php";
?>
<div class="title">Products</div>
<table width="100%" border="0">
  
  <tr>
    <th>Thumbnail</th>
    <th>Title</th>
    <th>Price</th>
    <th>Edit</th>
  </tr>
  <?php
$perNum= 10;
if (empty($_GET['page'])) {
	$_GET['page'] = 1;
}
$offset = ($_GET['page']-1) * $perNum;
	$sql = "
			SELECT * 
			FROM products
			LIMIT {$offset}, {$perNum}
			";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
?>
	
  <tr>
    <td><img src="upload/products/<?php echo $row['thumb'];?>" /></td>  
    <td><?php echo $row['title'];?></td>  
    <td>$<?php echo $row['price'];?></td>  
    <td><a href="product-edit.php?id=<?php echo $row['id'];?>">Edit</a></td>  
    <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
  </tr>
	<?php
	}
	
	?>
	
 
</table>
<center>(Total:<?php
$sql = "
		SELECT COUNT(*)
		FROM products";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

$total = ceil($row[0] / $perNum);
echo $total;
?>)    
<?php
for ($i = 1; $i <= $total; $i++) {
	echo "&nbsp;&nbsp;<a href=\"?page={$i}\">{$i}</a>";
}
?>
</center>


</div>
</body>
</html>
