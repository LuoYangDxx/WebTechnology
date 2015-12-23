<?php
include_once('connect.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>

<div class="products">
<div class="title">Special Sales</div>
<ul>
<?php
	$offset = ($page-1) * $perNum;
	$sql = "
			SELECT * 
			FROM products
			WHERE is_spsale = 1
			ORDER BY id desc
			";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
			if ($row['is_spsale']==1   &&  (strtotime($row['enddate'])<=time()  || time()<=strtotime($row['startdate']) ) ){
				continue;
			}
?>
<li>
<a href="product.php?id=<?php echo $row['id'];?>"><img src="upload/products/<?php echo $row['thumb']?>" width="156" height="156"  border="0"  />
<br />
<?php echo substr($row['title'], 0 ,37);?>... </a>
<div style="text-decoration:line-through"  >$<?php echo $row['oldprice']?></div>
<div class="price" >$<?php echo $row['price']?></div>

</li>
<?php
	}
	
	?>


</ul>
<div class="clr"></div>
</div>

</div>
</body>
</html>
