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
?>
<div class="products">
<div class="title">
	<p class="ptitle">All Products</p>
</div>
<ul>
<?php
function antisqlin($pcon){
 $sqlindb = array('cast', 'set', 'exec', 'insert', 'select', 'delete', 'update', 'execute', 'from', 'declare', 'varchar', 'script', 'iframe');
 foreach($sqlindb as $invalue){
    $pcon = str_ireplace($invalue,"",$pcon);
 }
 return $pcon;
}
$perNum= 18;
if (empty($_GET['page'])) {
	$page = 1;
}elseif(preg_match('/\d+/',$_GET['page'],$matches)){
 	
 $page = $matches[0];
}else{
$page =1;	
}
foreach ($products as $row){
?>
<li class="li3">
<a href="<?php echo base_url();?>mycart/viewproduct/<?php echo $row['id']?>">
	<img class="img3"src="<?php echo base_url(); ?>assets/img/<?php echo $row['thumb']?>"/>
<br/>
<p style="font-size:15px;margin-left:15px;"><?php echo $row['title'];?></p>
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
</div>
<div class="bottom">
<img class="bottom" width="100%" height="100%"src="<?php echo base_url(); ?>assets/img/header.jpg"/>
</div>
</div>

</body>
</html>
