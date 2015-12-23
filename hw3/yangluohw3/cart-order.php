<?php
include_once('connect.php');
if (empty($_SESSION['member'])) {
  header('location: login.php');
  exit();
}
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
<div class="title">My Cart</div>
<form action="order-action.php" method="POST">
<table width="100%" style="margin:0 auto" border="2">
  <tr>
    <th width="34%">Picture</th>
    <th width="38%">Title</th>
    <th width="9%">QTY.</th>
    <th width="19%">Price</th>
  </tr>
  <?php
 if(!get_magic_quotes_gpc()){ 
	 $cur_cart_array=unserialize($_COOKIE['shopcartinfo']); 
	 
	 }else{ 
	 $cur_cart_array = unserialize(stripslashes($_COOKIE['shopcartinfo'])); 
	  
	  }
 if(!$cur_cart_array){
  ?>
  <tr>
    <td colspan="5">Your cart is empty!</td>
  </tr>
  
  <?php
  } else {
  	
 $i=0; $j=0; foreach($cur_cart_array as $pid=>$pnum) {   
  
  $sql="select * from products where id='$pid'";
  $handel=mysql_query($sql);
  
  if($row = mysql_fetch_array($handel)){ 
  $count +=1;
  if($count==1){
	$ids .= $pid; 
	$nums .= $pnum; 
	  }else{
	$ids .= ",$pid";	  
	$nums .= ",$pnum";
		  }
  $total +=  ($row['price']*$pnum);
  ?>
  <tr>
    <td align="center"><img height="60" width="100"src="upload/products/<?php echo $row['thumb'];?>" /></td>
    <td align="center"><?php echo $row['title'];?></td>
    <td align="center"><?php echo $pnum; ?></TD>
    <td align="center">$<?php echo $row['price']*$pnum;?></td>
  </tr>
 <?php 
 
 }}}?>
 
 <tr>
    <td>&nbsp;</td>
    <td></td>
    <td colspan="2" align="right">Shipment:<select name="shipment">

<option value="2 Day Shipping" >2 Day Shipping</option>
<option value="FedEx" >FedEx</option>
<option value="UPS" >UPS</option>

</select>  $5</TD>
    </tr>
</table>
<div style="text-align:right">Total: $<?php echo $total += 5;?></div>
<div class="title">Enter a shipping address</div>
<style>
  .order th {line-height:25px; padding-right:5px;}
  </style>

<div class="order" style="margin-left:200px;margin-top:30px">
<table width="600" border="2">
<tr>
<th align="right">Full Name:</th>
<td><input type="text" name="fullname"   id="fullname" onblur="checkname()" style="width:300px;" /></td>
</tr>
<tr>
<th align="right">Address Line1:</th>
<td><input type="text" name="ship[address1]" id="address1"  onblur="checkad1()" style="width:300px;" /></td>
</tr>
<tr>
<th align="right">Address Line2:</th>
<td><input type="text" name="ship[address2]" id="address2" onblur="checkad2()" style="width:300px;" /></td>
</tr>

<tr>
<th align="right">City:</th>
<td><input type="text" name="ship[city]" id="city" onblur="checkCity()" style="width:200px;" /></td>
</tr>
<tr>
<th align="right">State/Province/Region:</th>
<td><input type="text" name="ship[state]"  id="state" onblur="checkState()" style="width:200px;" /></td>
</tr>
<tr>
<th align="right">ZIP:</th>
<td><input type="text" name="ship[zip]" id="zip" onblur="checkZip()" style="width:100px;" /></td>
</tr>
<tr>
<th align="right">Phone Number:</th>
<td><input type="text" name="ship[phone]"  id="phone" onblur="checkTelephone()"  style="width:300px;" /></td>
</tr>

<tr>
<th align="right">&nbsp;</th>
<td></td>
</tr>


<tr>
<th align="right">&nbsp;</th>
<td><input type="hidden" name="products" value="<?php echo $ids;?>" />
  <input  type="hidden"  name="nums" value="<?php echo $nums;?>" />
  <input type="hidden" name="price" value="<?php echo $total;?>" />
  <p style="text-align:center">
    <input  type="submit" value="Submit"onclick="return order();"/></p>
</td>
</tr>

</table>
</form>
</div>

<div class="clr">&nbsp;</div>

</div>

<script language="javascript">

function checkTelephone(){
  var telephone=document.getElementById("phone").value;
  if(telephone!=""){
  var validation=/\d{10}$/;
  if(!validation.test(telephone)){
    window.alert("Please enter a right telephone number.");
    return false;
    }else return true;
  }
}

function checkZip(){
  var zip=document.getElementById("zip").value;
  if(zip!=""){
  var validation=/\d{5}$/;
  if(!validation.test(zip)){
    window.alert("Please enter a 5 number Zip code.");
    return false;
    }else return true;
  }
}

function checkState(){
  var state=document.getElementById("state").value;
  if(state!=""){
  var validation=/^[A-Za-z]+$/;
  if(!validation.test(state)){
    window.alert("Please enter a right State.");
    return false;
    }else return true;
  }
}

function checkCity(){
  var state=document.getElementById("city").value;
  if(state!=""){
  var validation=/^[A-Za-z]+$/;
  if(!validation.test(state)){
    window.alert("Please enter a right City.");
    return false;
    }else return true;
  }
}

function checkad1(){
  var state=document.getElementById("address1").value;
  if(state!=""){
  var validation=/^[A-Za-z0-9]+$/;
  if(!validation.test(state)){
    window.alert("Please enter a right Address.");
    return false;
    }else return true;
  }
}

function checkad2(){
  var state=document.getElementById("address2").value;
  if(state!=""){
  var validation=/^[A-Za-z0-9]+$/;
  if(!validation.test(state)){
    window.alert("Please enter a right Address.");
    return false;
    }else return true;
  }
}

function checkname(){
  var state=document.form2.fullname.value;
  if(state!=""){
  var validation=/^[A-Za-z]+$/;
  if(!validation.test(state)){
    window.alert("Please enter a right Name.");
    return false;
    }else return true;
  }
}

</script>

</body>
</html>
