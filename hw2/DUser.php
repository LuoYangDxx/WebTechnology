<?php ob_start(); session_start(); ?>
<?php
  $currUser=$_GET['currUser'];
  if(!$currUser) {header("Location: logout.php");}
  $uid=$_GET['uid'];
  $uid=explode(",",$uid);
  $len=count($uid);
  $con=mysql_connect('127.0.0.1:36841','root','1521');
  if(!$con)
      die("Connect Fail");
  mysql_select_db('hw3',$con);
  foreach($uid as $value)
  {
    $sql="delete from User where UserId='$value'";
    $res=mysql_query($sql);
  }
   $_SESSION['userid']=$currUser;
   require "administrator.php";

?>