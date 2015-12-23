<?php ob_start(); session_start(); ?>
<?php
  $currUser=$_GET['currUser'];
  if(!$currUser) {header("Location: logout.php");}
  $ouid=$_GET['ouid'];
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

if($uid==''||$uid==$ouid)
{
  $sql1="select * from User where UserId='$ouid'";
  $res1=mysql_query($sql1);
  $row=mysql_fetch_assoc($res1);

  if($uid=='') $uid=$row['UserId'];
  if($pwd=='') $pwd=$row['Password'];
  if($ln=='') $ln=$row['LastName'];
  if($fn=='') $fn=$row['FirstName'];
  if($age=='') $age=$row['Age'];
  if($pay=='') $pay=$row['Payments'];
  if($type=='') $type=$row['Type'];

  $sql="update User set UserId='$uid',Password='$pwd',LastName='$ln',FirstName='$fn',Payments='$pay',Age='$age',Type='$type' where UserId='$ouid'";
  $res=mysql_query($sql);
  $_SESSION['userid']=$currUser;
  require "administrator.php";
}
  else
   {
    $sql2="select * from User where UserId='$uid'";
    $res2=mysql_query($sql2);
    $row2=mysql_fetch_assoc($res2);
    if($row2)
     {
      $_SESSION['userid']=$currUser;
      require "administrator.php";   
     }
     else
       {
         $sql1="select * from User where UserId='$ouid'";
         $res1=mysql_query($sql1);
         $row=mysql_fetch_assoc($res1);

         if($pwd=='') $pwd=$row['Password'];
         if($ln=='') $ln=$row['LastName'];
         if($fn=='') $fn=$row['FirstName'];
         if($age=='') $age=$row['Age'];
         if($pay=='') $pay=$row['Payments'];
         if($type=='') $type=$row['Type'];
         $sql="update User set UserId='$uid',Password='$pwd',LastName='$ln',FirstName='$fn',Payments='$pay',Age='$age',Type='$type' where UserId='$ouid'";  
         $res=mysql_query($sql);
         $_SESSION['userid']=$currUser;
        require "administrator.php";
       }
   }
?>