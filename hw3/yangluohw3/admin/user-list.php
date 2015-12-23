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
  <p style="text-align:center;font-size:25px;margin-bottom:20px;">Users list</p>
</div>
<table border="2" width="100%" style="margin:0 auto" bordercolor="7FB802">
<tr>
<th style="background-image: url(../images/tab_14.gif);"width="16%">member id</th>
<th style="background-image: url(../images/tab_14.gif);"width="16%">nickname</th>
<th style="background-image: url(../images/tab_14.gif);"width="16%">email</th>
<th style="background-image: url(../images/tab_14.gif);"width="17%">password</th>
<th style="background-image: url(../images/tab_14.gif);"width="18%">address</th>
<th style="background-image: url(../images/tab_14.gif);"width="17%">city</th>
</tr>
<?php
$perNum= 15;
if (empty($_GET['page'])) {
	$_GET['page'] = 1;
}
$offset = ($_GET['page']-1) * $perNum;
	$sql = "
			SELECT *  
			FROM members
			WHERE id<>0
			ORDER BY id DESC
			LIMIT {$offset}, {$perNum}
			";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
		
?>
<tr>
<td align="center"><?php echo $row['id'];?></td>
<td align="center"><?php echo $row['nickname']; ?></td>
<td align="center"><?php echo $row['email'];?></td>
<td align="center"><?php echo $row['pwd'];?></td>
<td align="center"><?php echo $row['address'];?></td>
<td align="center"><?php echo $row['city'];?></td>
</tr>
<?php
	}?>
</table>
<center>(Total:<?php
$sql = "
		SELECT COUNT(*)
		FROM members
	
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
