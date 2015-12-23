<?php
include_once('../connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.js"></script>
<script src="js/admin.js"></script>
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
<style>
  body{
    background: #FDF5E6;
    height: 100%;
  }
</style>
</head>

<body>
<div class="wrap">
<?php
include "manage-header.php";
?>
<div style="width:50%;float:left;margin-bottom:40px;">
<div style="margin-top:10px;">
  <p style="text-align:center;font-size:25px;margin-bottom:10px;">AddProducts</p>
</div>
<form action="product-action.php" method="POST" enctype="multipart/form-data">
<table width="100%" border="2">
  <tr>
    <th>Picture</th>
    <td><input type="file" name="thumb" />Put picture</td>
  </tr>
  <tr>
    <th>Productname</th>
    <td><input type="text" name="title" id="title" style="width:300px" /></td>
  </tr>
  <tr>
    <th>Price</th>
    <td><input type="text" name="price" id="price" /></td>
  </tr>
  
    <tr>
    <th>Special Sale</th>
    <td><input type="radio" name="sp" value="0" checked="checked" /> No  <input type="radio" name="sp" value="1" /> Yes </td>
  </tr>
  
  <tr>
    <th>Old price</th>
    <td><input type="text" name="oprice"  id="oprice"   /></td>
  </tr>
  
   <tr>
    <th>Start Date</th>
    <td> <input type="text"  name="sdate"  id="sdate"  /> Ec.yyyy-mm-dd</td>
  </tr>
  
  <tr>
    <th>End Date</th>
    <td>  <input type="text"  name="edate"  id="edate"  /> Ec.yyyy-mm-dd</td>
  </tr>
  
   <tr>
    <th>Category</th>
    <td>
    <select name="cid" id="cid" >
    <?php  
	
	$sql = "SELECT * FROM categoryinfo WHERE fid=0 ORDER BY cid DESC";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
	echo "<optgroup label=".$row['cname'].">";	
	$fatherid = $row['cid'];
	$handel_s = mysql_query("SELECT * FROM categoryinfo WHERE fid='$fatherid' ORDER BY cid DESC "); 
	while($row_s = mysql_fetch_array($handel_s)){
	?>
    <option  value="<?php echo $row_s['cid']; ?>" ><?php echo $row_s['cname']; ?></option> 
     
    <?php 
	}
	echo "</optgroup>";
	 }  ?>
    </select>
    </td>
  </tr>
  
  <tr>
    <th>Description</th>
    <td><textarea  name="content" id="content" style="width:350px; height:80px;"></textarea></td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td align="center" >
      <button type="submit" onclick="return check_prod();"  >Add Product</button></td>
  </tr>
</table>
</form>
</div>
<div style="width:35%;float:right">
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
 <ul style="float:left;margin-left:85px;width:45%">
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
