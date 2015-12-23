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
<div class="title">My Cart</div>
<form action="<?php echo base_url('myorder/setorder');?>" method="POST">
<table width="80%" style="margin:0 auto" border="2">
  <tr>
    <th width="30%">Picture</th>
    <th width="20%">Title</th>
    <th width="10%">QTY.</th>
    <th width="20%">TotalPrice</th>
  </tr>
  <?php
  $ids="";
  $nums="";
  $total=0;
  $count="";
  $user=$this->session->userdata('user');
  foreach ($cartorder as $row){
      $count +=1;
      if($count==1)
      {
	    $ids .= $row['pid']; 
	    $nums .= $row['number'];  
	    }else
        {
         $pid=$row['pid'];
         $pnum=$row['number'];
	       $ids .= ",$pid";	  
	       $nums .= ",$pnum";
		    }
  $total +=  ($row['price']*$row['number']);
  ?>
  <tr>
    <td align="center">
    <img height="40" width="100"src="<?php echo base_url(); ?>assets/img/<?php echo $row['image'];?>" /></td>
    <td align="center"><?php echo $row['product'];?></td>
    <td align="center"><?php echo $row['number'];?></TD>
    <td align="center">$<?php echo $row['price']*$row['number'];?></td>
  </tr>
 <?php 
 }
 ?>
 <tr>
    <td>&nbsp;</td>
    <td></td>
    <td colspan="2" align="right">Shipment:
    <select name="shipment">
    <option value="2 Day Shipping" >2 Day Shipping</option>
    <option value="FedEx" >FedEx</option>
    <option value="UPS" >UPS</option>
    </select> $5</TD>
    </tr>
</table>
<div style="text-align:right">Total: $<?php echo $total += 5;?></div>
<div class="title">Enter a shipping Information</div>
<style>
  .order th {line-height:25px; padding-right:5px;}
  </style>


<div class="order" style="height:60%">
<div style="float:left;width:55%">
<table width="100%" border="2">
<tr>
<th align="right" style="width:40%;">Full Name:</th>
<td><input type="text" name="fullname"   id="fullname" style="width:70%;" /></td>
</tr>
<tr>
<th align="right">Address Line1:</th>
<td><input type="text" name="ship[address1]" id="address1"  style="width:70%;" /></td>
</tr>
<tr>
<th align="right">Address Line2:</th>
<td><input type="text" name="ship[address2]" id="address2"  style="width:70%;" /></td>
</tr>
<tr>
<th align="right">City:</th>
<td><input type="text" name="ship[city]" id="city"  style="width:70%;" /></td>
</tr>
<tr>
<th align="right">State/Province/Region:</th>
<td><input type="text" name="ship[state]"  id="state"  style="width:70%;" /></td>
</tr>
<tr>
<th align="right">ZIP:</th>
<td><input type="text" name="ship[zip]" id="zip"  style="width:70%;" /></td>
</tr>
<tr>
<th align="right">Phone Number:</th>
<td><input type="text" name="ship[phone]"  id="phone"  style="width:70%;" /></td>
</tr>
<tr>
<th align="right">&nbsp;</th>
<td>
  <input type="hidden" name="products" value="<?php echo $ids;?>" />
  <input  type="hidden"  name="nums" value="<?php echo $nums;?>" />
  <input type="hidden" name="price" value="<?php echo $total;?>" />
</td>
</tr>
</table>
</div>

<div style="float:right;height:60%;width:40%;background:#FFD1A4">
  <div style="text-align:center;margin-top:5%">
  <img src="<?php echo base_url();?>assets/img/card1.jpg" width="25%" height="8%" border="0"/>
   <img src="<?php echo base_url();?>assets/img/card2.jpg" width="25%" height="8%" border="0"/>
  <img src="<?php echo base_url();?>assets/img/card3.jpg" width="25%" height="8%" border="0"/>
  <br>
  <select name="payment" id="payment">
    <option>Visa Credit</option>
    <option>Visa Debit</option>
    <option>Other Card</option>
  </select>
  <br><br>
  Please Input Card Number!!
  <input type="text" name="cardno" id="cardno" value="" />
  <br><br>
  </div>
<p style="text-align:center;"><input type="submit" onclick="return CheckReg();" value="CheckOut" style="width:50%;text-align:center;height:15%;background-image:url(<?php echo base_url();?>assets/img/tab_14.gif)" onclick="return order();"/></p>
<br>
</div>
</div>
</form>
</div>

<script language="javascript">

function CheckReg(){

var fullname=document.getElementById("fullname").value;
  if(fullname!=""){
  var validation=/^[A-Za-z0-9\s?]{2,20}$/;
  if(!validation.test(fullname))
    {
    window.alert("Please enter a right Name.");
    return false;
    }
  }else{window.alert("Input Name");
        return false;}

  var address1=document.getElementById("address1").value;
  if(address1!=""){
  var validation=/^[A-Za-z0-9\s?]{2,20}$/;
  if(!validation.test(address1)){
    window.alert("Please enter a right Address.");
    return false;
    }
  }else{window.alert("Input Address1");
        return false;}

  var address2=document.getElementById("address2").value;
  if(address2!=""){
  var validation=/^[A-Za-z0-9\s?]{2,20}$/;
  if(!validation.test(address2)){
    window.alert("Please enter a right Address.");
    return false;
    }
  }else{window.alert("Input Address2");
        return false;}


 var state=document.getElementById("city").value;
  if(state!=""){
  var validation=/^[A-Za-z0-9\s?]{2,20}$/;
  if(!validation.test(state)){
    window.alert("Please enter a right City.");
    return false;
    }
  }else{window.alert("Input City");
        return false;}


 var state=document.getElementById("state").value;
  if(state!=""){
  var validation=/^[A-Za-z0-9\s?]{2,20}$/;
  if(!validation.test(state)){
    window.alert("Please enter a right State.");
    return false;
    }
  }else{window.alert("Input State");
        return false;}

  var zip=document.getElementById("zip").value;
  if(zip!=""){
  var validation=/\d{5}$/;
  if(!validation.test(zip)){
    window.alert("Please enter a 5 number Zip code.");
    return false;
    }
  }else{window.alert("Input zip code");
        return false;}

 var telephone=document.getElementById("phone").value;
  if(telephone!=""){
  var validation=/\d{10}$/;
  if(!validation.test(telephone)){
    window.alert("Please enter a right telephone number.");
    return false;
    }
  }else{window.alert("Input telephone number");
        return false;}

 var cardno=document.getElementById("cardno").value;
  if(cardno!=""){
  var validation=/\d{16}$/;
  if(!validation.test(cardno)){
    window.alert("Please enter a right cardno number.");
    return false;
    }
  }else{window.alert("Input cardno number");
        return false;}
  return true;
} 
</script>
</body>
</html>
