<?php
@session_start();
include('connect.php');
$url="login.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Come2Us</TITLE>
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
//
if ($_POST) 
  {
	$pwd=$_POST['pwd'];
    $email=$_POST['email'];
	if (preg_match('/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/',$email)) 
	{
      if(preg_match('/^[A-Za-z0-9]{6,12}$/',$pwd))
      {	
	   $sql = "
			SELECT * 
			FROM members
			WHERE
			email = '$email'
			AND
			pwd = '$pwd'
			";
	   $query = mysql_query($sql);
       $row = mysql_fetch_array($query);
      } 
      else
      { 

      	echo "<script language=\"javascript\">";
	    echo "alert(\"Password must be 6-12 long letter or number!!\");";
	    echo "location.href=\"login.php\"";
	    echo "</script>";
        exit;
      }
    }
else
    {

     	echo "<script language=\"javascript\">";
	    echo "alert(\"Email is not correct\");";
	    echo "location.href=\"login.php\"";
	    echo "</script>";
     exit; 	
    }
}
else 
{
        echo "<script language=\"javascript\">";
	    echo "alert(\"Error!\");";
	    echo "location.href=\"login.php\"";
	    echo "</script>";
}

$passcode = $_POST['passcode'];
$passcode2 = $_SESSION['Checknum'];
if ($row) 
{
	$sql1 = "
			SELECT *
			FROM members
			WHERE
			email = '$email'
			AND
			pwd = '$pwd'
			";
	$query1 = mysql_query($sql1);
	$row1 = mysql_fetch_array($query1, MYSQL_ASSOC);
	$_SESSION['member'] = $row1;
	
        echo "<script language=\"javascript\">";
	    echo "alert(\"Login Successful\");";
	    echo "location.href=\"products.php\"";
	    echo "</script>";
} 

else 
{

  echo "<script language=\"javascript\">";
  echo "alert(\"Login Fail!! Check you input!\");";
  echo "location.href=\"login.php\"";
  echo "</script>";

}
?>
<div class="clr">&nbsp;</div>

</div>
</body>
</html>
