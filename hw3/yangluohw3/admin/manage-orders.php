<?php
include_once('../connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
<style>
  body{
    background: #FDF5E6;
  }
</style>
</head>

<body>
<div class="wrap">
<?php
include "manage-header.php";
?>

<div style="margin-top:10px;">
  <p style="text-align:center;font-size:25px;margin-bottom:20px;">Orders</p>
</div>


<div style="font-size:15px;
 font-weight:bold; 
 margin-bottom:15px;
 text-align:center;width:100%;float:left">
<table border="2"width="100%" style="margin:0 auto" bordercolor="7FB802">
<tr>
<th style="background-image: url(../images/main_09.gif);"width="10%">nickname</th>
<th style="background-image: url(../images/main_09.gif);"width="10%">Number</th>
<th style="background-image: url(../images/main_09.gif);"width="15%">Total Price</th>
<th style="background-image: url(../images/main_09.gif);"width="15%">Payment</th>
<th style="background-image: url(../images/main_09.gif);"width="15%">Status</th>
<th style="background-image: url(../images/main_09.gif);"width="15%">Time</th>
<th style="background-image: url(../images/main_09.gif);"width="20%">Operation</th>

</tr>
<?php
$perNum= 18;
if (empty($_GET['page'])) 
{
	$_GET['page'] = 1;
}
$offset = ($_GET['page']-1) * $perNum;
	$sql = "
			SELECT orders.id,orders.products,orders.prodnum,orders.price,orders.pubtime,orders.member_id,orders.status,members.nickname  
			FROM orders
			INNER JOIN members
            ON members.id = orders.member_id
			ORDER BY orders.id DESC
			LIMIT {$offset}, {$perNum}
			";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
		$oid = $row['id'];
$handel_p = mysql_query("SELECT id,orderid,payment FROM payment WHERE orderid='$oid'");		
$row_p = mysql_fetch_array($handel_p);
?>
<tr>
<td align="center"><?php echo $row['nickname']; ?></td>
<td align="center">#<?php echo $row['id'];?></td>
<td align="center">$<?php echo $row['price'];?></td>
<td align="center"><?php  echo $row_p['payment']; ?></td>
<td align="center"><?php  
switch($row['status'])
{
	case 0:
	echo "Non-payment";
	break;
	case 1:
	echo "Paid-up";
	break;
	case 2:
	echo "Shipped";
	break;
	case 3:
	echo "Received";
	break;
	} 
 ?>
</td>
<td align="center"><?php echo date('F j, Y, g:i a', $row['pubtime']);?></td>
<td><a href="inorder.php?id=<?php echo $row['id'];?>">View</a> 
	&nbsp;&nbsp; <?php  if($row['status']==1){ ?> 
	<a href="operate.php?id=<?php echo $row['id']; ?>">Set as delivering</a>  <?php } ?>
</td>

</tr>
<?php
	}?>
</table>
<center>(Total:<?php
$sql = "
		SELECT COUNT(*)
		FROM orders
	
		";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

$total = ceil($row[0] / $perNum);
echo $total;
?>)    
<?php
for ($i = 1; $i <= $total; $i++) {
	echo "&nbsp;&nbsp;<a href=\"?page={$i}\">{$i}</a>";
}
?></center>
</div>
</body>
</html>
