<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="<?php echo base_url(); ?>assets/css/1.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<TITLE>Yangluo</TITLE>
</head>
<body>
<div class="wrap">
<?php
include "header.php";
?>
<div class="products">
<div class="title">
<p class="hp1">
<span style='font-size:1.3em;color:red;font-style:italic'>Special</span>Sales</p>
<ul>
<?php foreach ($product as $row) {
	?>
<li class="li1"style="margin-top:1em">
<a href="<?php echo base_url();?>mycart/viewproduct/<?php echo $row['id']?>">
<img src="<?php echo base_url(); ?>assets/img/<?php echo $row['thumb']?>" class="img1"/>
<br/>
<p style="font-size:1.4em;"><?php echo substr($row['title'], 0 ,20);?></p>
</a>
<p>
<span style="font-size:1.3em;text-decoration:line-through">$<?php echo $row['oldprice']?></span>
<span style="font-size:1.3em;color:red;">$<?php echo $row['price']?></span></p>
</li>
<?php } ?>
</ul>
</div>
<div class="insert">
<p style="font-size:1.5em;padding:0.6em;">Special Sales By Category</p>
</div>

<?php foreach ($special as $row_f){$arr_f[$row_f['cid']] = $row_f['cname'];}
foreach ($cspecial as $row_c){
  ?>
<div class="title">
	<p class="bigp"><?php echo $arr_f[$row_c['fid']] ."--".$row_c['cname'] ; ?></p>
</div>
<ul>
<?php 
$sql = "select * from products where is_spsale = 1 and pcid = '{$row_c['cid']}'order by id desc";
$query = mysql_query($sql); while ($row = mysql_fetch_array($query)) {?>
<li class="li2">
<a href="<?php echo base_url();?>mycart/viewproduct/<?php echo $row['id']?>">
	<img src="<?php echo base_url(); ?>assets/img/<?php echo $row['thumb']?>" class="img2"/>
<br />
<p style="font-size:1em;"><?php echo substr($row['title'], 0 ,37);?></p></a>

<p><span style="font-size:1em;text-decoration:line-through">$<?php echo $row['oldprice']?></span>
<span style="font-size:1em;color:red">$<?php echo $row['price']?></span></p>
</li>
<?php
	}
	?>
</ul>
<?php  } ?>
<div class="bottom">
<img class="bottom" width="100%" height="100%"src="<?php echo base_url(); ?>assets/img/header.jpg"/>
</div>
</div>
</body>
</html>
