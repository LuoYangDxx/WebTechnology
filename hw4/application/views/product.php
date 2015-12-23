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
/*
$did=$id;
$sql = "
		SELECT *
		FROM products
		WHERE
		id = '$id'
		";
$query = mysql_query($sql);
$row = mysql_fetch_array($query, MYSQL_ASSOC);
*/
foreach ($specials as $rowf){$row=$rowf;}
$did=$row['id'];
?>
<div>
<table style="margin:20px auto" border="0" width="500">
<form name="frm" method="POST" action="<?php echo base_url('mycart/cartaction');?>">
  <tr>
    <td width="200">
    <img src="<?php echo base_url(); ?>assets/img/<?php echo $row['thumb'];?>"width="160" height="180" border="0" /></td>
    <td>
 <p style="font-size:20px;margin-bottom:25px;"><?php echo $row['title'];?></p>
 <div class="oldprice">
 	<?php if($row['is_spsale']){ ?> 
<div style="margin-top:6px;text-decoration:line-through;font-size:15px;" >Old Price: $<?php echo $row['oldprice']?>
</div>
<?php } ?>
</div>
<div class="price" style="font-size:15px;">Price: $<?php echo $row['price'];?></div> 
<div style="margin-top:6px;font-size:15px;">Quanty. 
<input type="text" name="num" id="num"  value="1" style="width:30px; height:14px"/> 
<input type="hidden" name="add" id="add" value="<?php echo $row['id'];?>"/>
</div>
<?php  if($row['is_spsale']==1){ ?>    
<div style="margin-top:6px;font-size:15px;">Start Date:<?php echo $row['startdate']; ?>
<br>
End Date: <?php echo $row['enddate']; ?></div>
<?php   } ?>   
<div>&nbsp;</div> 
    <input type="submit" onclick="return CheckReg();" value="Add to cart" style="background:#AFAF61;height:30px;width:120px;"> 
 </td>
  </tr>
  </form>
</table>
</div>

<br />
<br />
<div class="title">Product Description</div>
<?php echo str_replace("\n", '<br />', $row['content']);?>
<div class="clr">&nbsp;</div>
<div class="products">
<div class="title">People who bought this product also purchased</div>
<ul>
<?php
   $count=0;
   $series_id =0;
   $handel_s = mysql_query("SELECT products FROM orders WHERE products LIKE '%$did%'"); 
   while($row_s = mysql_fetch_array($handel_s)){
	   $count +=1;
	   if($count !=1){
	   $series_id .= ",".$row_s['products'];
	   }else{
	   $series_id = $row_s['products'];     
		   }
	   }
if(trim($series_id)){   
$sql = "SELECT * FROM products WHERE id IN ($series_id) AND id <> '$did' ORDER BY id desc LIMIT 0, 6";
$query = mysql_query($sql); while ($row = mysql_fetch_array($query)) {
if ($row['is_spsale']==1   &&  (strtotime($row['enddate'])<=time()  || time()<=strtotime($row['startdate']) ) ){continue;}?>
<li style="float:left;margin-left:20px">
<a href="<?php echo base_url();?>mycart/viewproduct/<?php echo $row['id']?>">
	<img src="<?php echo base_url(); ?>assets/img/<?php echo $row['thumb']?>" width="120" height="120" border="0" />
<br />
<p style="font-size:18px;"><?php echo $row['title'];?></p>
</a>
<p>
<?php  if($row['is_spsale']){ ?>
<span style="font-size:12px;text-decoration:line-through">$<?php echo $row['oldprice']?></span>
<?php } ?>
<span style="font-size:12px;color:red">$<?php echo $row['price']?></span>
</p>
</li>
<?php } } ?>
</ul>
</div>
</div>
<script language="javascript">

function CheckReg(){
	var num = $("#num").val();
	var search_num= /^[A-Za-z0-9\s?]{1,40}$/;
    if(num==''||num==0){
    alert("Quanty cannot be none or zero!");
    $("#num").focus();
    return false;
    }
    if(!search_num.test(num)){
    alert("Quanty is not correct.");
    $("#num").val("");
    $("#num").focus();
    return false;
   }
   return true;
  }

</script>
</body>
</html>
