<?php ob_start(); session_start(); ?>
<?php
  $currUser=$_SESSION['userid'];
  if(!$currUser) {header("Location: logout.php");}
  $pn=$_GET['pn'];
  $opn=$_GET['opn'];
  $ds=$_GET['ds'];
  $price=$_GET['price'];
  $cate=$_GET['cate'];

  $con=mysql_connect('127.0.0.1:36841','root','1521');

  if(!$con)
      die("Connect Fail");

  mysql_select_db('hw3',$con);



if($pn==''|| $pn==$opn)
  {
    $sql1="select * from Product where ProductName='$opn'";
    $res1=mysql_query($sql1);
    $row=mysql_fetch_assoc($res1);
    $pid=$row['ProductId'];
    if($pn=='') $pn=$row['ProductName'];
    if($price=='') $price=$row['ProductPrice'];
    if($ds=='') $ds=$row['Description'];
    if($cate!='')
    {
     $sql3="select * from Cate where CateName='$cate'";
     $res3=mysql_query($sql3);
     $row3=mysql_fetch_assoc($res3);
     $cateid=$row3['CateId']; 
    }else
    {
     $cateid=$row['CategoryId'];
    }
   $sql="update Product set ProductName='$pn',ProductPrice='$price',Description='$ds',CategoryId='$cateid',ProductId='$pid' where ProductName='$opn'";
   $res=mysql_query($sql);
   $_SESSION['userid']=$currUser;
   require "salesmanager.php";
  }
  else
  {
    $sql2="select * from Product where ProductName='$pn'";
    $res2=mysql_query($sql2);
    if(mysql_fetch_assoc($res2))
    {
      $_SESSION['userid']=$currUser;
      require "salesmanager.php";   
     }else
      {
       $sql1="select * from Product where ProductName='$opn'";
       $res1=mysql_query($sql1);
       $row1=mysql_fetch_assoc($res1);
       $pid=$row1['ProductId'];
       if($price=='') $price=$row1['ProductPrice'];
       if($ds=='') $ds=$row1['Description'];
       if($cate!='')
        { $sql3="select * from Cate where CateName='$cate'";
         $res3=mysql_query($sql3);
         $row3=mysql_fetch_assoc($res3);
         $cateid=$row3['CateId']; 
        }
        else
        {
         $cateid=$row['CategoryId'];
        }
        $sql="update Product set ProductName='$pn',ProductPrice='$price',Description='$ds',CategoryId='$cateid',ProductId='$pid' where ProductName='$opn'";
        $res=mysql_query($sql);
        $_SESSION['userid']=$currUser;
        require "salesmanager.php";
       }
   }
?>