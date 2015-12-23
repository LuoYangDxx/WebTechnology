<?php ob_start(); session_start(); ?>
<?php
  $currUser=$_GET['currUser'];
  if(!$currUser) {header("Location: logout.php");}
  $cn=$_GET['cn'];
  $decn=$_GET['decn'];
  $ocn=$_GET['ocn'];
  $con=mysql_connect('127.0.0.1:36841','root','1521');

  if(!$con)
      die("Connect Fail");

  mysql_select_db('hw3',$con);

  if($cn==$ocn)
  { $_SESSION['userid']=$currUser;
    require "salesmanager.php";}
else{
   $sql2="select * from Cate where CateName='$cn'";
   $res2=mysql_query($sql2);
   $row2=mysql_fetch_assoc($res2);
   if(!$row2)
     { 
      $sql1="select * from Cate where CateName='$ocn'";
      $res1=mysql_query($sql1);
      $row=mysql_fetch_assoc($res1);
      $sql="update Cate set CateName='$cn',Description='$decn' where CateName='$ocn'";
      $res=mysql_query($sql);
      $_SESSION['userid']=$currUser;
      require "salesmanager.php"; 
     }
   else
   {$_SESSION['userid']=$currUser;
    require "salesmanager.php";   
   }
  }
?>