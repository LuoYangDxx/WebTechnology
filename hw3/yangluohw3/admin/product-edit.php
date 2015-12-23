<?php
include_once('../connect.php');
$sql = "
		SELECT *
		FROM products
		WHERE
		id = '{$_GET['id']}'
		";
$query = mysql_query($sql);
$row = mysql_fetch_array($query, MYSQL_ASSOC);
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
  }
</style>
</head>

<body>
<div class="wrap">
<?php
include "manage-header.php";
?>
<div class="title">Add Product</div>
<form action="product-edit-action.php?id=<?php echo $row['id'];?>" method="POST" enctype="multipart/form-data">
<table width="60%" style="float:left"border="2">
  <tr>
    <th>Picture</th>
    <td>
    <img width="90" height="90"src="../upload/products/<?php echo $row['thumb'];?>"  />
    <br />
    <input type="file" name="thumb2" />
    <input type="hidden" name="thumb" value="<?php echo $row['thumb'];?>" /></td>
  </tr>
  <tr>
    <th>Title</th>
    <td><input type="text" name="title"  id="title" style="width:300px" value="<?php echo $row['title'];?>" /></td>
  </tr>
  <tr>
    <th>Price</th>
    <td><input type="text" name="price"  id="price"  value="<?php echo $row['price'];?>" /></td>
  </tr>
  
  <tr>
    <th>Special Sale</th>
    <td><input type="radio" name="sp" value="0"   <?php  if($row['is_spsale']==0){echo "checked";} ?>   /> No  <input type="radio" name="sp" value="1"  <?php  if($row['is_spsale']==1){echo "checked";} ?>   /> Yes </td>
  </tr>
  
   <tr>
    <th>original price</th>
    <td><input type="text" name="oprice"  id="oprice"  value="<?php echo $row['oldprice']; ?>"  /></td>
  </tr>
    <tr>
    <th>Start Date</th>
    <td> <input type="text"  name="sdate"  id="sdate"  value="<?php  echo $row['startdate']; ?>" /> Ec.yyyy-mm-dd</td>
  </tr>
  
  <tr>
    <th>End Date</th>
    <td>  <input type="text"  name="edate"  id="edate"   value="<?php  echo $row['enddate']; ?>" /> Ec.yyyy-mm-dd</td>
  </tr>
  
  
  
  
     <tr>
    <th>Category</th>
    <td>
    <select name="cid" id="cid" >
    <option  value="0" selected="selected" >-select the category-</option>
    <?php  
	
	$sql_c = "SELECT * FROM categoryinfo WHERE fid=0 ORDER BY cid DESC";
	$query_c = mysql_query($sql_c);
	while ($row_c = mysql_fetch_array($query_c)) {
	echo "<optgroup label=".$row_c['cname'].">";	
	$fatherid = $row_c['cid'];
	$handel_s = mysql_query("SELECT * FROM categoryinfo WHERE fid='$fatherid' ORDER BY cid DESC "); 
	while($row_s = mysql_fetch_array($handel_s)){
	?>
    <option  value="<?php echo $row_s['cid']; ?>"   <?php if($row_s['cid']==$row['pcid']){echo "selected";}  ?>   ><?php echo $row_s['cname']; ?></option> 
     
    <?php 
	}
	echo "</optgroup>";
	 }  ?>
    </select>
    </td>
  </tr>
  
  
  <tr>
    <th>Description</th>
    <td>
      <textarea  name="content" id="content" style="width:400px; height:60px;"><?php echo $row['content'];?></textarea></td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td align="center"><button type="submit"   onclick="return check_prod();" >Save</button></td>
  </tr>
</table>

<div style="width:35%;float:right">
<div class="inner1" style="margin-left:55px;
  margin-top: 20px;
  width:80%; 
  height:380px;
  border:1px solid #A6A6D2;
  background: #FFF4C1;">
  <div class="inner4" style="width:100%; 
  height:25px;
  background: #8C8C00;"></div>
  <br>
 <p style="text-align:center;font-size:20px;">Hello! Welcome!</p><br>
 <p style="text-align:center;font-size:20px;">Our Store:</p><br><br>
 <ul style="float:left;margin-left:75px;width:80%">
  <li style="font-size:18px;color:#A6A6D2">Have Many Fruit</li><br>
  <li style="font-size:18px;color:#A6A6D2">Electronic Device</li><br>
  <li style="font-size:18px;color:#A6A6D2">And many others</li><br>
   <li style="font-size:18px;color:#A6A6D2">Thank You Come</li>
</ul>
</div>
</div>

</form>



</div>
</body>
</html>
