<?php ob_start(); session_start(); ?>
<html>
<head>
<title>Welcome!</title>
</head>
<body>
<?php
  $userId=$_POST['userId'];
  $password=$_POST['password'];
  if(strlen($userId)==0 || strlen($password)==0){
    require 'prelogin.html';
    $errmsg="Invalid Login";
  }

  else
 {
    $con=mysql_connect('127.0.0.1:36841','root','1521');
    if(!$con)
      die("Connect Fail");
    else
   {
    mysql_select_db('hw3',$con);
    $sql="select * from User where UserId='$userId'and Password='$password'";
    $res=mysql_query($sql);
    $row=mysql_fetch_assoc($res);
    if(!$row)
    {
      require 'prelogin.html';
      $errmsg="Invalid Login";
    }else if($row['Type']=="Administrator")
    {
      $_SESSION['userid']=$row['UserId'];
      $_SESSION['timeout']=time();
      require "administrator.php";
    }else if($row['Type']=="Manager")
    {
      $_SESSION['userid']=$row['UserId'];
      $_SESSION['timeout']=time();
      require "managers.php";
    }else{
          $_SESSION['userid']=$row['UserId'];
          $_SESSION['timeout']=time();
          require "salesmanager.php";
         }
   }
 }   
?>
<p style="color:red;position:absolute;top:100px;left:750px;font-size:20px">
  <b><?php echo $errmsg;?><b>
</p>
</body>
</html>
