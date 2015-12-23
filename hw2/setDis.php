<?php ob_start(); session_start(); ?>
<?php
$currUser=$_GET['currUser'];
if(!$currUser) {header("Location: logout.php");}
  $pn=$_GET['pn'];
  $disc=$_GET['disc'];
  $start=$_GET['start'];
  $end=$_GET['end'];
  $con=mysql_connect('127.0.0.1:36841','root','1521');
  if(!$con)
      die("Connect Fail");
  mysql_select_db('hw3',$con);
  $sql1="select * from Product where ProductName='$pn'";
  $res1=mysql_query($sql1);
  $row=mysql_fetch_assoc($res1);
  $pid=$row['ProductId'];
  $sql2="select * from Special where ProductId='$pid'";
  $res2=mysql_query($sql2);
  $row2=mysql_fetch_assoc($res2);
  if(!$row2)
  {
  $sql4="insert into Special (ProductId) values('$pid')";
  $res4=mysql_query($sql4);
  }
  $sql="update Special set Discount='$disc',StartDate='$start',EndDate='$end' where ProductId='$pid'";
  $res=mysql_query($sql);
 if($res)
 {$_SESSION['userid']=$currUser;
 require "salesmanager.php";}
 else
   {$_SESSION['userid']=$currUser;
    require "salesmanager.php";}
?>