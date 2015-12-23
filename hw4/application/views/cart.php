<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?php echo base_url(); ?>assets/css/1.css" rel="stylesheet" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="wrap">
<?php
include "header.php";
?>
<div class="cart1">
  <br>
  <div class="title">
  <p class="pcart1" >My Cart</p>
</div>
<form  id="cfrm" action="<?php echo base_url('mycart/change');?>" method="post"  >
<table width="100%" style="margin:0 auto" border="2" bordercolor="7FB802">

  <tr style="height:28px">
    <th style="background-image: url(images/tab_14.gif);"width="25%">ItemImage</th>
    <th style="background-image: url(images/tab_14.gif);"width="25%">ProductName</th>
    <th style="background-image: url(images/tab_14.gif);"width="15%">QTY.</th>
    <th style="background-image: url(images/tab_14.gif);"width="10%">Price</th>
    <th style="background-image: url(images/tab_14.gif);"width="20%">Operate</th>
  </tr>

<?php
$userid=$this->session->userdata('user');
foreach ($cart as $row) {
?>
<tr>
<td align="center">
<img src="<?php echo base_url(); ?>assets/img/<?php echo $row['image']?>" width="30%" height="30%"/></td>
<td align="center"><?php echo $row['product'];?></td>
<td align="center"><input type="text" name="num[]" style="width:40%"value="<?php echo $row['number'];?>"/>
<input type="hidden" name="pid[]"  value="<?php echo $row['pid']; ?>" /> 
</td>
<td align="center"><?php echo $row['price'];?></td>
<td align="center">
<input type="button" onClick="window.location.href='<?php echo base_url();?>mycart/viewproduct/<?php echo $row['pid'];?>'" value="View"/>
<input type="button" onclick="window.location.href='<?php echo base_url();?>mycart/deleteproduct/<?php echo $row['pid'];?>'" value="Delete"/>
</td>
</tr>
<?php } ?>
</table>

<br>
<div style="text-align:center">
  <input type ="submit" value="SaveEdit"/>
</div>
</form>
<div style="text-align:center">
<br>
<span style="color:red">Maybe you want:</span>
<button class="cartbutton"style="width: 20%;background-image:url(<?php echo base_url(); ?>assets/img/tab_14.gif)" onClick="window.location.href='<?php echo base_url('welcome/product');?>'">GoShopping</button> 
<button class="cartbutton"style="width: 20%;background-image:url(<?php echo base_url(); ?>assets/img/tab_14.gif)" onClick="window.location.href='<?php echo base_url();?>mycart/delete/<?php echo $userid ?>'">EmptyCart</button> 
<button class="cartbutton"style="width: 20%;background-image:url(<?php echo base_url(); ?>assets/img/tab_14.gif)" onClick="window.location.href='<?php echo base_url('myorder/cartorder');?>'">CheckOut</button>
</div>
</div>
<div class="logindiv">
<div class="inner1">
  <div class="inner4"></div>
  <br>
 <p class="cartfont">Hello! Welcome!</p><br>
 <p class="cartfont">Our Store:</p><br><br>
 <ul class="cartul">
  <li class="cartli">Los Angeles</li><br>
  <li class="cartli">Hong Kong</li><br>
  <li class="cartli">New York</li><br>
   <li class="cartli">Beijing</li>
</ul>
<img class="img4"src="<?php echo base_url(); ?>assets/img/1.jpg">
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
