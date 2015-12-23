<?php
include_once('connect.php');
if (empty($_SESSION['member'])) {
	header('location: login.php');
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>

<div style="width:60%;float:left">
<div style="margin-top:30px;">
  <p style="font-size:25px;margin-bottom:20px;">Orders</p>
</div>
<table border="2" width="100%" style="margin:0 auto" bordercolor="7FB802">
<tr>
<th style="background-image: url(../images/tab_14.gif);"width="20%">Number</th>
<th style="background-image: url(../images/tab_14.gif);"width="20%">Price</th>
<th style="background-image: url(../images/tab_14.gif);"width="25%">Time</th>
<th style="background-image: url(../images/tab_14.gif);"width="15%">State</th>
<th style="background-image: url(../images/tab_14.gif);"width="10%">&nbsp;</th>
<th style="background-image: url(../images/tab_14.gif);"width="10%">&nbsp;</th>
</tr>
<?php
	$sql = "
			SELECT * 
			FROM orders
			WHERE member_id = '{$_SESSION['member']['id']}'
			ORDER BY id desc
			";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
?>
<tr>
<td align="center">#<?php echo $row['id'];?></td>
<td align="center">$<?php echo $row['price'];?></td>
<td align="center"><?php echo date('F j, Y, g:i a', $row['pubtime']);?></td>
<td align="center"><?php switch($row['status']){ 
case '0': echo "waiting process";break;
case '1': echo "Payment has been made"; break; 
case '2': echo "delivering";   break;

} ?></td>
<td align="center"><a href="order.php?id=<?php echo $row['id'];?>">View</a></td>
<td align="center"><a href="refund.php?id=<?php echo $row['id'];?>">Refund</a></td>
</tr>
<?php
	}?>
</table>
</div>


<div style="width:40%;float:right">
<div class="inner1">
  <div class="inner4"></div>
  <br>
 <p style="text-align:center;font-size:20px;">Hello! Welcome!</p><br>
 <p style="text-align:center;font-size:20px;">Los Angeles</p><br><br>
<img style="margin-left:60px;width:60%" height="140"src="images/2.jpg">
</div>
</div>


</div>
</body>
</html>
