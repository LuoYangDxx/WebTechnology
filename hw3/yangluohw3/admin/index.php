<?php
include_once('../connect.php');
include_once('filter.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
	body{
		background: #FDF5E6;
    height: 100%;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />

</head>

<body>
<div class="wrap">
<?php
include "manage-header.php";
?>
<div style="width:60%;margin-bottom:20px;float:left">
<div style="margin-top:30px;">
  <p style="text-align:center;font-size:25px;margin-bottom:10px;">Products</p>
</div>

<div style="text-align:center;margin-bottom:30px;">
<form name="s" method="get" >
<input type="hidden"  name="s" value="1" />
<select name="cid" id="cid" >
<option value="0" >-Not selected-</option>
    <?php  
	$sql = "SELECT * FROM categoryinfo WHERE fid=0 ORDER BY cid DESC";
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
	echo "<optgroup label=".$row['cname'].">";	
	$fatherid = $row['cid'];
	$handel_s = mysql_query("SELECT * FROM categoryinfo WHERE fid='$fatherid' ORDER BY cid DESC "); 
	while($row_s = mysql_fetch_array($handel_s)){
	?>
    <option value="<?php echo $row_s['cid']; ?>" >
    	<?php echo $row_s['cname']; ?></option> 
    <?php 
	}
	echo "</optgroup>";
	 }  ?>
    </select>
<input type="text" name="pname"  />
&nbsp;&nbsp;
<input type="submit"  value="Search"  />
</form>
</div>


<table border="2" width="100%" style="margin:0 auto" bordercolor="7FB802">
  <tr>
    <th style="background-image: url(../images/tab_14.gif);"width="20%">Picture</th>
    <th style="background-image: url(../images/tab_14.gif);"width="20%">Product</th>
    <th style="background-image: url(../images/tab_14.gif);"width="20%">Price</th>
    <th style="background-image: url(../images/tab_14.gif);"width="20%">Edit</th>
    <th style="background-image: url(../images/tab_14.gif);"width="20%">Delete</th>
  </tr>
  <?php
    $perNum= 8;
   if (empty($_GET['page'])) 
   {
	$page = 1;
   }elseif(preg_match('/\d+/',$_GET['page'],$matches))
   {
     $page = $matches[0];
   }else
   {
      $page =1;	
   }

$offset = ($page-1) * $perNum;
	$sql = "
			SELECT * 
			FROM products ORDER BY id DESC
			LIMIT {$offset}, {$perNum}
			";
	if($_GET['s']==1){
	$cid = $_GET['cid'];
	FilterGetIn($cid);
	$pname = $_GET['pname'];
		
	$sql = "
			SELECT * 
			FROM products  WHERE 1=1  
			";		
	if($cid){
	$sql .= " AND pcid='$cid' ";	
		}
	if(trim($pname)){
	$sql .= " AND title LIKE '%$pname%' OR content LIKE '%$pname%' ";		
		}
	$sql .= " ORDER BY id DESC
			LIMIT {$offset}, {$perNum}";
		
		}		
			
	$query = mysql_query($sql);
	while ($row = mysql_fetch_array($query)) {
?>
	
  <tr style="text-align:center;">
    <td>
    <img src="../upload/products/<?php echo $row['thumb'];?>"width="80%" height="50" />
    </td>  
    <td><span style='font-size:13px;'><?php echo $row['title'];?></span></td>  
    <td>
    <?php  if($row['is_spsale']){ ?> 
    <p style='font-size:13px;'>
    <span style="text-decoration:line-through;font-size:13px;"> 
    $<?php echo $row['oldprice']?><?php } ?></span>
    <span style='font-size:13px;'>$<?php echo $row['price'];?></span>
    </p>
    </td>  
    <td><a style='font-size:13px;'href="product-edit.php?id=<?php echo $row['id'];?>">Edit</a></td>  
    <td><a style='font-size:13px;'href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
  </tr>
	<?php
	}
	
	?>
</table>
<center>
(Total:<?php
$sql = "
		SELECT COUNT(*)
		FROM products";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);

$total = ceil($row[0] / $perNum);
echo $total;
?>)    
<?php
for ($i = 1; $i <= $total; $i++) {
	echo "&nbsp;&nbsp;<a href=\"?page={$i}\">{$i}</a>";
}
?>
</center>
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
