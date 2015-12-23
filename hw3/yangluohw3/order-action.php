<?php
session_start();
include_once('connect.php');
include_once('common.php');
?>
<?php
if ($_POST) 
{
	$pubtime = time();
	$shipment = antisqlin($_POST['shipment']);
	
	$address = array();
	foreach ($_POST['ship'] as $k => $v) 
	{
		$val = antisqlin($v);
		$address[] = $k . ': ' . $val;
	}
	$products = $_POST['products'];
	$nums = $_POST['nums'];
	$price = $_POST['price'];
	$address = implode("\n", $address);
	$_SESSION['produ']=$_POST['products'];
	$_SESSION['nums'] = $_POST['nums'];
 	$sql = "
			INSERT INTO  orders 
			SET
			products = '$products',
			prodnum = '$nums',
			price = '$price',
			address = '$address',
			shipment = '$shipment',
			pubtime = '{$pubtime}',
			member_id = '{$_SESSION['member']['id']}'
			";
	$a = mysql_query($sql);
	$oid = mysql_insert_id();
	
    $productid = explode(",",$products);
    $productqty = explode(",",$nums);
    
    for ($i=0;$i<count($productid);$i++)
    { 
      $productsid = $productid[$i];
      $productquanty = $productqty[$i];
    
      $sql1 = "
		SELECT * 
		FROM products
		WHERE id ='$productsid'
		";
       $res1 = mysql_query($sql1);
       $row1 = mysql_fetch_array($res1);
       $productprice = $row1['price'];
       $productname = $row1['title'];
       $category = $row1['pcid'];
       $special = $row1['is_spsale'];
       $oldprice = $row1['oldprice'];
      $sql2 = "
		SELECT * 
		FROM categoryinfo
		WHERE cid ='$category'
		";
       $res2 = mysql_query($sql2);
       $row2 = mysql_fetch_array($res2);
       $pcategory = $row2['cname'];
       $date=date('Y-m-d',$pubtime); 

      $sql3 = "
			INSERT INTO orderdetail
			SET
			productid = '$productsid',
			productqty = '$productquanty',
			productprice = '$productprice',
			productname= '$productname',
			category = '$pcategory',
			special = ' $special',
			oldprice = '$oldprice',
			time = '$date',
			orderid = '$oid'
			";
			
	$c = mysql_query($sql3);
    }
    
	if($a){setcookie("shopcartinfo",time()-300);}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Come2Us</TITLE>
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>
<div class="title">Order</div>


<?php
if ($a&&$c) 
{
?>
Operation is successful,Please select your payment.
<?php
$url = "payment.php?id=$oid";
echo "<meta http-equiv=\"refresh\" content=\"1;url=".$url."\">\n";
       exit;
}
?>


</div>
</body>
</html>
