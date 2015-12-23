<?php
include_once('../connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Come2Us</TITLE>
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
  <p style="font-size:25px;margin-bottom:20px;">Category List</p>
</div>
<div style="font-size:15px;
 font-weight:bold; 
 margin-bottom:15px;
 text-align:center;width:60%;float:left">

<table border="2"width="100%" style="margin:0 auto" bordercolor="7FB802">
<tr>
<th width="123">Father Category </th>
<th width="142">Sub-category</th>
<th width="216">Operation</th>

</tr>
<?php

	$sql = "SELECT * FROM categoryinfo WHERE fid=0 ORDER BY cid DESC";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
	$fatherid = $row['cid'];
	$handel_s = mysql_query("SELECT * FROM categoryinfo WHERE fid='$fatherid' ORDER BY cid DESC "); 	
?>
<tr>
<td align="center"><?php echo $row['cname'];?>:</td>
<td align="center"></td>
<td align="center"><a href="del_cate.php?id=<?php echo $row['cid']; ?>&f=1">Delete</a> </td>

</tr>
<?php
while($row_s = mysql_fetch_array($handel_s)){
	?>
 <tr>
<td align="center"></td>
<td align="center"><?php echo $row_s['cname'];?></td>

<td align="center"><a href="del_cate.php?id=<?php echo $row_s['cid']; ?>">Delete</a> </td>

</tr>   
	<?php
	}

	}?>
</table>
<center>
</center>
</div>

<div style="width:40%;float:right">
<div class="inner1" style="margin-left:55px;
  width:80%; 
  height:380px;
  border:1px solid #009966;
  background: #FFF4C1;">
  <div class="inner4" style="width:100%; 
  height:25px;
  background: #8C8C00;text-align:center;"></div>
  <br>
 <p style="text-align:center;font-size:20px;">Hello! Welcome!</p><br>
 <p style="text-align:center;font-size:20px;">Our Store:</p><br><br>
 <ul style="float:left;margin-left:100px;width:45%">
  <li style="font-size:18px;color:#FF4500">Los Angeles</li><br>
  <li style="font-size:18px;color:#FF4500">Hong Kong</li><br>
  <li style="font-size:18px;color:#FF4500">New York</li><br>
   <li style="font-size:18px;color:#FF4500">Sanfrancisco</li>
</ul>
</div>
</div>

</div>
</body>
</html>
