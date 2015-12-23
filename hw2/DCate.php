<?php ob_start(); session_start(); ?>
<?php
  $currUser=$_GET['currUser'];
  if(!$currUser) {header("Location: logout.php");}
  $cn=$_GET['cn'];
  $con=mysql_connect('127.0.0.1:36841','root','1521');
  if(!$con)
      die("Connect Fail");
  mysql_select_db('hw3',$con);
  $sql="delete from Cate where CateName='$cn'";
  $res=mysql_query($sql);
  $_SESSION['userid']=$currUser;
  require "salesmanager.php";
?>