<?php ob_start(); session_start(); ?>
<?php
$currUser=$_GET['currUser'];
if(!$currUser) {header("Location: logout.php");}
  $pn=$_GET['pn'];
  $ds=$_GET['ds'];
  $cate=$_GET['cate'];
  $price=$_GET['price'];
  $con=mysql_connect('127.0.0.1:36841','root','1521');
  if(!$con)
      die("Connect Fail");
  mysql_select_db('hw3',$con);
  $sql1="select * from Product where ProductName='$pn'";
  $res1=mysql_query($sql1);
  $row=mysql_fetch_assoc($res1);
  $sql2="select * from Cate where CateName='$cate'";
  $res2=mysql_query($sql2);
  $row2=mysql_fetch_assoc($res2);
  $cateid=$row2['CateId'];
  $sql3="insert into Special (ProductId) values('$pid')";
  $sql="insert into Product (ProductName,ProductPrice,Description,CategoryId) values('$pn','$price','$ds','$cateid')";
  if($row)
  {
  $_SESSION['userid']=$currUser;
  require "salesmanager.php";
  }
  else
  {$res=mysql_query($sql);
  $res3=mysql_query($sql3);
  $_SESSION['userid']=$currUser;
  require "salesmanager.php";
   }
?>