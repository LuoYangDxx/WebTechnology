<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url(); ?>assets/css/1.css" rel="stylesheet" type="text/css" media="screen" />
<TITLE>Yangluo</TITLE>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>

<body>
<div class="wrap">
<?php
include "header.php";
foreach ($order as $rowf){$order=$rowf;}
$nums = $order['prodnum'];
$pieces = explode(",",$nums);
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
    <td align="center"><img width="100" height="40" src="<?php echo base_url(); ?>assets/img/<?php echo $row['thumb'];?>" /></td>
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
<div class="order">
<pre>
<?php echo $order['address'];?>
</pre>
</div>
<div class="clr">&nbsp;</div>
<input type="button" onclick="window.location.href='<?php echo base_url('myorder/vieworder');?>'"value="Back to Orders"/>
<div style="margin-top:100px;
            height:100px;width:100%;
            background-repeat:repeat-x;">
<img class="bottom" width="100%" height="100%"src="<?php echo base_url(); ?>assets/img/header.jpg"/>
</div>
</div>
</body>
</html>
