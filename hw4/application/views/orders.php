<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url(); ?>assets/css/1.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>

<div class="ordertable">
<div style="margin-top:30px;">
  <p style="font-size:25px;margin-bottom:20px;">Orders</p>
</div>
<table border="2" width="100%" style="margin:0 auto" bordercolor="7FB802">
<tr>
<th style="background-image: url(<?php echo base_url(); ?>assets/img/tab_14.gif);"width="20%">Number</th>
<th style="background-image: url(<?php echo base_url(); ?>assets/img/tab_14.gif);"width="20%">Total</th>
<th style="background-image: url(<?php echo base_url(); ?>assets/img/tab_14.gif);"width="25%">Time</th>
<th style="background-image: url(<?php echo base_url(); ?>assets/img/tab_14.gif);"width="15%">Payment</th>
<th style="background-image: url(<?php echo base_url(); ?>assets/img/tab_14.gif);"width="10%">&nbsp;</th>
<th style="background-image: url(<?php echo base_url(); ?>assets/img/tab_14.gif);"width="10%">&nbsp;</th>
</tr>
<?php foreach ($orders as $row) {
	?>
<tr>
<td align="center">#<?php echo $row['id'];?></td>
<td align="center">$<?php echo $row['price'];?></td>
<td align="center"><?php echo date('F j, Y, g:i a', $row['pubtime']);?></td>
<td align="center"><?php echo $row['payment'];?></td>
<td align="center"><a href="<?php echo base_url();?>myorder/orderdetail/<?php echo $row['id']?>">View</a></td>
<td align="center"><a href="<?php echo base_url();?>myorder/deleteorder/<?php echo $row['id']?>">Refund</a></td>
</tr>
<?php
	}?>
</table>
</div>
<div class="logindiv">
<div class="inner1">
  <div class="inner4"></div>
  <br>
 <p style="text-align:center;font-size:20px;">This is a beacutiful city!</p><br>
 <p style="text-align:center;font-size:20px;">Los Angeles!</p><br>
<img style="margin-left:20%;width:60%" height="140"src="<?php echo base_url(); ?>assets/img/2.jpg">
</div>
</div>
<div style="margin-top:500px;
            height:100px;width:100%;
            background-repeat:repeat-x;">
<img class="bottom" width="100%" height="100%"src="<?php echo base_url(); ?>assets/img/header.jpg"/>
</div>
</div>
</body>
</html>
