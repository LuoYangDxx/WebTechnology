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
<div style="width:50%;float:left; margin-top: 40px;border:2px solid #DAA520;">
  <div style="margin-top:15px;">
  <p style="text-align:center;font-size:20px;margin-bottom:10px;">Add Category</p>
</div>
<form action="cate-add2.php" method="POST" enctype="multipart/form-data">
<table width="100%" style="margin-left:100px"border="0" >
  <tr>
    <th width="20%">Category Type</th>
    <td width="80%">
    <select name="type">
    <option value="father">Father of Classification</option>
    <option value="son">Sub-category</option>
    </select></td>
  </tr>
  <br>
  <tr>
    <th>&nbsp;</th>
    <td><br>&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit" style="width:100px">Next</button><br><br>
    </td>
  </tr>
</table>
</form>
</div>

<div style="width:40%;float:right">
<div class="inner1" style="margin-left:55px;
  margin-top: 40px;
  width:80%; 
  height:380px;
  border:1px solid #009966;
  background: #FFF4C1;">
  <div class="inner4" style="width:100%; 
  height:25px;
  background: #8C8C00;"></div>
  <br>
 <p style="text-align:center;font-size:20px;">Hello! Welcome!</p><br>
 <p style="text-align:center;font-size:20px;">Our Store:</p><br><br>
 <ul style="float:left;margin-left:15px;width:45%">
  <li style="font-size:18px;color:#FF4500">Los Angeles</li><br>
  <li style="font-size:18px;color:#FF4500">Hong Kong</li><br>
  <li style="font-size:18px;color:#FF4500">New York</li><br>
   <li style="font-size:18px;color:#FF4500">Sanfrancisco</li>
</ul>
<img style="float:right;margin-right:10px;width:45%" height="140"src="../images/1.jpg">
</div>
</div>

</div>
</body>
</html>
