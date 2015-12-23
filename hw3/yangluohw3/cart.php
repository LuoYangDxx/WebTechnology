<?php
error_reporting(0);
include_once('connect.php');
if(isset($_GET['num'])){
if(!is_numeric($_GET['num']) || $_GET['num']<=0){ 
?>
<script language="javascript">
alert("Qty is not correct");
location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
</script>
<?php 	return; }}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="js/user.js"></script>

<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>

<div style="width:60%;float:left">
  <div class="title" style="margin-top:30px;">
  <p style="text-align:center;font-size:25px;margin-bottom:10px;">My Cart</p>
</div>
<form  id="cfrm" action="action_cart.php" method="post"  >
<input type="hidden" name="save"  id="save" value="1"  />

<table width="100%" style="margin:0 auto" border="2" bordercolor="7FB802">

  <tr style="height:28px">
    <th style="background-image: url(images/tab_14.gif);"width="25%">ItemImage</th>
    <th style="background-image: url(images/tab_14.gif);"width="25%">ProductName</th>
    <th style="background-image: url(images/tab_14.gif);"width="15%">QTY.</th>
    <th style="background-image: url(images/tab_14.gif);"width="10%">Price</th>
    <th style="background-image: url(images/tab_14.gif);"width="20%">Operate</th>
  </tr>

<?php
 if(!get_magic_quotes_gpc()){ 
	 $cur_cart_array=unserialize($_COOKIE['shopcartinfo']); 
	 
	 }else{ 
	 $cur_cart_array = unserialize(stripslashes($_COOKIE['shopcartinfo'])); 
	  
	  }
 if($cur_cart_array){ $i=0; $j=0; foreach($cur_cart_array as $pid=>$pnum) {   
  
  $sql="select * from products where id='$pid'";
  $handel=mysql_query($sql);
  
  if($row = mysql_fetch_array($handel)){  ?>
			
  <tr style="height:45px">
    <td align="center"><img height="60" width="80"src="upload/products/<?php echo $row['thumb'];?>" /></td>
    <td align="center"><?php echo $row['title'];?></td>
    <td align="center"><input type="text" value="<?php echo $pnum; ?>"   style="width:30px"   name="num[]"     />  <input type="hidden" name="pid[]"  value="<?php echo $pid; ?>"  />   </td>
    <td align="center"><?php echo $row['price'];?></td>
    <td align="center">
      <a href="product.php?id=<?php echo $row['id'];?>">View</a> 
      <a href="action_cart.php?del=<?php echo $row['id'];?>">Delete</a></td>
  </tr>      
               <?php  }}}   ?>
</table>
</form>
<br>
<div style="text-align:center">
  <button style="background-image:url(images/tab_14.gif)" onClick="window.location.href='index.php'">Continue Shopping</button> 
  <button style="background-image:url(images/tab_14.gif)" onclick="submit_form();" >Save Cart</button>   
  <button style="background-image:url(images/tab_14.gif)" onClick="window.location.href='action_cart.php?empty=1'">Empty Cart</button> 
  <button style="background-image:url(images/tab_14.gif)" onClick="window.location.href='cart-order.php'">Order</button>
</div>
</div>

<div style="width:40%;float:right">
<div class="inner1">
  <div class="inner4"></div>
  <br>
 <p style="text-align:center;font-size:20px;">Hello! Welcome!</p><br>
 <p style="text-align:center;font-size:20px;">Our Store:</p><br><br>
 <ul style="float:left;margin-left:15px;width:45%">
  <li style="font-size:18px;color:#FF4500">Los Angeles</li><br>
  <li style="font-size:18px;color:#FF4500">Hong Kong</li><br>
  <li style="font-size:18px;color:#FF4500">New York</li><br>
   <li style="font-size:18px;color:#FF4500">Sanfrancisco</li>
</ul>
<img style="float:right;margin-right:10px;width:45%" height="140"src="images/1.jpg">
</div>
</div>


</div>
</body>
</html>
