<?php ob_start(); session_start(); ?>
<?php
$currUser=$_GET['currUser'];
if(!$currUser) {header("Location: logout.php");}
  $uid=$_GET['uid'];
  $pwd=$_GET['pwd'];
  $ln=$_GET['ln'];
  $fn=$_GET['fn'];
  $age=$_GET['age'];
  $pay=$_GET['pay'];
  $type=$_GET['type'];

  $con=mysql_connect('127.0.0.1:36841','root','1521'); 
  if(!$con)
      die("Connect Fail");  
  mysql_select_db('hw3',$con);
  $sql1="select * from User where UserId='$uid'";
  $res1=mysql_query($sql1);
  $row=mysql_fetch_assoc($res1);
  if(!$row)
   { $sql="insert into User (UserId,Password,LastName,FirstName,Age,Payments,Type) values('$uid','$pwd','$ln','$fn','$age','$pay','$type')";
     $res=mysql_query($sql);
     $_SESSION['userid']=$currUser;
     require "administrator.php";
   }else
   {
    $_SESSION['userid']=$currUser;
   require "administrator.php";
   }
?>