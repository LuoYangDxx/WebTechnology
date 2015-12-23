<?php
include_once('../connect.php');
include_once('filter.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<div style="margin-top:20px;">
  <p style="text-align:center;font-size:25px;margin-bottom:30px;">SearchOrders</p>
</div>

<div style="font-size:15px;
 font-weight:bold; 
 border: #BDB76B solid; 
 margin-bottom:15px;
 text-align:center;width:40%;float:left">
<form name="s" method="get" >
<input type="hidden"  name="s" value="1" />
<br>
Category:
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
    <option  value="<?php echo $row_s['cname']; ?>" >
      <?php echo $row_s['cname']; ?>
    </option> 
    <?php 
  }
  echo "</optgroup>";
   }  ?>
    </select>
<br><br>
&nbsp;&nbsp;ProName:
<input type="text" name="pname" onblur="Alert()" />
&nbsp;&nbsp;
<br><br>
Start time:
<input type="text" name="starttime" id="starttime"/>
&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>End time:
<input type="text" name="endtime" id="endtime"  />
&nbsp;&nbsp;
<br><br>
Special sales?
<input type="checkbox" name="category"  />
&nbsp;&nbsp;
<input type="submit" onClick = "checkDate()" value="Search"  />
<br><br>
</form>
</div>


<div style="width:55%;float:right">
<table border="2"width="100%" style="margin:0 auto" bordercolor="7FB802">
  <tr>
    <th style="background-image: url(../images/tab_14.gif);"width="15%">OrderNum</th>
    <th style="background-image: url(../images/tab_14.gif);"width="15%">Ordertime</th>
    <th style="background-image: url(../images/tab_14.gif);"width="15%">OrderPrice</th>
    <th style="background-image: url(../images/tab_14.gif);"width="15%">Productname</th>
    <th style="background-image: url(../images/tab_14.gif);"width="15%">Category</th>
    <th style="background-image: url(../images/tab_14.gif);"width="15%">Price</th>
    <th style="background-image: url(../images/tab_14.gif);"width="10%">Quantity</th>
  </tr>
  <?php
  $total = 0;
  $sum=0;
  $sql = "
      SELECT *
      FROM orderdetail o, orders d
      WHERE o.orderid = d.id
      ORDER BY o.orderid DESC
      ";
  if($_GET['s']==1)
  {
  $cid = $_GET['cid'];
  $pname = $_GET['pname'];
  $special = $_GET['category']; 
    $start =$_GET['starttime'];
    $end =$_GET['endtime'];
  $sql = "
      SELECT *
      FROM orderdetail o, orders d  
      WHERE o.orderid = d.id
      ";    
  if($cid)
  {
  $sql .= " AND o.category='$cid' ";  
    }

  if($special)
  {
  $sql .= " AND o.special = 1 ";  
    }

 if($start)
  {
  $sql .= " AND o.time>='$start' ";  
    }

  if($end)
  {
  $sql .= " AND o.time<='$end' ";  
    }

  if($pname)
  {
  $sql .= " AND o.productname ='$pname'";   
    }
   $sql .= "ORDER BY o.orderid DESC";
    }   
      
  $ordersid='';
  $query = mysql_query($sql);
  while ($row = mysql_fetch_array($query)) {
    $total += $row['productprice']*$row['productqty'];
    $sum += $row['productqty'];
    if ($row['orderid']!=$ordersid)
      { $ordersid=$row['orderid'];
        $time=$row['time'];
        $price=$row['price'];
      }
    else {$ordersid='';
         $time='';
         $price='';
       }
?>
  <tr style="text-align:center">
    <td><?php echo $ordersid;?></td>
    <td><?php echo $time;?></td>
    <td><?php echo $price;?></td>
    <td><?php echo $row['productname'];?></td>
    <td><?php echo $row['category'];?></td>    
    <td>
    <?php  if($row['special']==1){ ?> 
    <div style="text-decoration:line-through"> 
    $<?php echo $row['oldprice']?><?php } ?></div>
    $<?php echo $row['productprice'];?></td>  
    <td><?php echo $row['productqty'];?></td>
  </tr>
  <?php
  $ordersid=$row['orderid'];
  }
  ?>
  <div style="text-align:center;margin-bottom:20px">
    <p style="font-size:20px;color:red">Total Price: $<?php echo $total;?>
      <span style="margin-left:20px;font-size:18px;color:black">Items:<?php echo $sum;?>
      </span>
    </p>
  </div>
</table>
</div>
</div>


<script language="javascript">



function Alert(){
  var telephone=document.s.pname.value;
  if(telephone!="")
  {
  var validation=/^[A-Za-z0-9]{2,12}$/;
  if(!validation.test(telephone))
   {
    window.alert("Please enter a right Productname.");
    return false;
    }else return true;
  }
}


function checkDate(){
  var sbirthday= document.s.starttime.value;
  var ebirthday= document.s.endtime.value;
  if(sbirthday!="")
  {
  var svalidation = /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$/.exec(sbirthday);
  if (svalidation == null)
   {
    window.alert("Please enter a right date like yyyy-mm-dd");
    return false;
    }else return true;
  }

 if(ebirthday!="")
  {
  var evalidation = /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$/.exec(ebirthday);
  if (evalidation == null)
   {
    window.alert("Please enter a right date like yyyy-mm-dd");
    return false;
    }else return true;
  }
}
</script>

</body>
</html>
