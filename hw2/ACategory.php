<?php ob_start(); session_start(); ?>
<?php
$currUser=$_GET['currUser'];
if(!$currUser) {header("Location: logout.php");}
  $cn=$_GET['cn'];
  $decn=$_GET['decn'];
  $con=mysql_connect('127.0.0.1:36841','root','1521');
  if(!$con)
      die("Connect Fail");
  mysql_select_db('hw3',$con);
  $sql1="select * from Cate where CateName='$cn'";
  $res1=mysql_query($sql1);
  $sql="insert into Cate (CateName,Description) values('$cn','$decn')";
  $row=mysql_fetch_assoc($res1);
  if(!$row){
     $res=mysql_query($sql);
     $_SESSION['userid']=$currUser;
     require "salesmanager.php";
}else{
   $_SESSION['userid']=$currUser;
   require "salesmanager.php";
   }
?>