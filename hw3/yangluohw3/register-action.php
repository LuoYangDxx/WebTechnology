<?php
	include('connect.php');
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$nkm = $_POST['nickname'];
  $address = $_POST['address'];
  $city = $_POST['city'];
	$url="register.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>

<div class="title">Register</div>
<?php


if (preg_match('/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/',$email)) 
{
     $sql1 = "
			SELECT *
			FROM members
			WHERE
			email = '$email'
			";
     $res1=mysql_query($sql1);
     $row1 = mysql_fetch_array($res1);
  if(!$row1)
  {
    if(preg_match('/^[A-Za-z0-9]{6,12}$/',$pwd))
    {
       if (preg_match('/^[A-Za-z0-9]{3,20}$/',$nkm))
       {
	     $pwd = md5($pwd);	
	     $sql = "
			INSERT INTO members 
			SET
			email = '{$_POST['email']}',
			pwd = '{$_POST['pwd']}',
			nickname = '{$_POST['nickname']}',
      address = '{$_POST['address']}',
      city = '{$_POST['city']}'
			";
	       $a = mysql_query($sql);
	      if($a)
           {
            echo "<script language=\"javascript\">";
            echo "alert(\"Operation is successful, Sign in to get personalized recommendations.\");";
            echo "location.href=\"login.php\"";
            echo "</script>";
           }
           else
           {

            echo "<script language=\"javascript\">";
            echo "alert(\"Fail!! please check input!\");";
            echo "location.href=\"register.php\"";
            echo "</script>";
           exit;
           }
       }
        else
       {

            echo "<script language=\"javascript\">";
            echo "alert(\"NickName is not correct!!\");";
            echo "location.href=\"register.php\"";
            echo "</script>";
          exit;	
        }
    }
     else
    {
            echo "<script language=\"javascript\">";
            echo "alert(\"Password must be 6-12 long letter or number!!\");";
            echo "location.href=\"register.php\"";
            echo "</script>";
    exit;	
    }

  } 
  else
  {
            echo "<script language=\"javascript\">";
            echo "alert(\"The e-mail was already usded!!\");";
            echo "location.href=\"register.php\"";
            echo "</script>";
    exit;
  }
}
         else
       {
            echo "<script language=\"javascript\">";
            echo "alert(\"Email is not correct!!\");";
            echo "location.href=\"register.php\"";
            echo "</script>";
        exit;
       }
?>

<div class="clr">&nbsp;</div>

</div>
</body>
</html>
