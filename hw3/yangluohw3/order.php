<?php
include_once('connect.php');
$sql1 = "
		SELECT *
		FROM orders
		WHERE
		id = '{$_GET['id']}'
		";
$query1 = mysql_query($sql1);
$order = mysql_fetch_array($query1,MYSQL_ASSOC);
$nums = $order['prodnum'];
$pieces = explode(",",$nums);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div class="title">Order: #<?php echo $order['id'];?></div>
<table width="100%" style="margin:0 auto" border="2">
  <tr>
    <th width="36%">Thumbnail</th>
    <th width="34%">Title</th>
    <th width="15%">QTY.</th>
    <th width="15%">Price</th>
  </tr>
  <?php

  $sql = "
		SELECT * 
		FROM products
		WHERE id IN ({$order['products']})
		";
$query = mysql_query($sql);
$total = 0;
$sum=0;
while ($row = mysql_fetch_array($query)) {
	$total += $row['price']*$pieces[$sum];
  ?>
  <tr>
    <td align="center"><img width="100" height="40" src="upload/products/<?php echo $row['thumb'];?>" /></td>
    <td align="center"><?php echo $row['title'];?></td>
    <td align="center"><?php echo $pieces[$sum];?></td>
    <td align="center">$<?php echo $row['price'];?></td>
  </tr>
 <?php $sum+=1; }?>
</table>
<div style="text-align:right">Total: $<?php echo $total;?></div>
<div class="title">Shipping address</div>
<style>
  .order th {line-height:25px; padding-right:5px;}
  </style>
<form action="order-action.php" method="POST">
<div class="order">
<pre>
<?php echo $order['address'];?>
</pre>
</div>
</form>
<div class="clr">&nbsp;</div>
<a href="orders.php">Back</a>
</div>
</body>
</html>
