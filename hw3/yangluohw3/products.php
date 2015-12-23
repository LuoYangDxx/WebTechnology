<?php
include_once('connect.php');
include_once('common.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Yangluo</TITLE>
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>

<div class="products">
<div class="title"style="margin-top:5px"><p style="font-size:20px;text-align:center;margin-bottom:5px">All Products</p></div>
<ul>
<?php
$perNum= 18;
if (empty($_GET['page'])) {
	$page = 1;
}elseif(preg_match('/\d+/',$_GET['page'],$matches)){
 	
 $page = $matches[0];
}else{
$page =1;	
}
//echo $_GET['page'];
//echo "<br>";
//echo $page;
if (isset($_GET['key'])) {
if(preg_match('/^[a-zA-Z0-9_\s]+$/',$_GET['key'])){	
$key =  antisqlin($_GET['key']);

$search = ' WHERE title LIKE "%'.$key.'%" ';
}else{
	echo "<script language=\"javascript\">";
	echo "alert(\"Keywords are not correct\");";
	echo "location.href=\"products.php\"";
	echo "</script>";
	}
} else {
$search = '';
}
$offset = ($page-1) * $perNum;
	$sql = "
			SELECT * 
			FROM products
			{$search}
			LIMIT {$offset}, {$perNum}
			";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
		if ($row['is_spsale']==1   &&  (strtotime($row['enddate'])<=time()  || time()<=strtotime($row['startdate']) ) ){
				continue;
			}
?>
<li class="li3">
<a href="product.php?id=<?php echo $row['id'];?>">
	<img src="upload/products/<?php echo $row['thumb']?>" width="100" height="100" border="0" />
<br />
<p style="font-size:15px;margin-left:20px;"><?php echo $row['title'];?></p>
</a>
<p style="margin-left:20px;">
<?php  if($row['is_spsale']){ ?>
<span style="font-size:12px;text-decoration:line-through">$<?php echo $row['oldprice']?></span>
<?php } ?>
<span style="font-size:12px;color:red">$<?php echo $row['price']?></span>
</p>
</li>
<?php
	}
	?>
</ul>
<div class="clr"></div>
<center>(Total:<?php
$sql = "
		SELECT COUNT(*)
		FROM products
		{$search}";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

$total = ceil($row[0] / $perNum);
echo $total;
?>)    
<?php
for ($i = 1; $i <= $total; $i++) {
	echo "&nbsp;&nbsp;<a href=\"?page={$i}\">{$i}</a>";
}
?></center>
</div>
<div style="margin-top:20px;margin-bottom:20px;height:100px;width:100%;background-image:url(images/header.jpg);background-repeat:repeat-x;">
</div>
</div>

</body>
</html>
