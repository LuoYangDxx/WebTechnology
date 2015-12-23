<?php
session_start();
include('../connect.php');
$url="manage-login.php";

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

$pwd=$_POST['pwd'];
$mname=$_POST['mname'];
//check 
if ($_POST) 
 {
	if (preg_match('/^[A-Za-z0-9]{3,20}/',$mname)) 
	{
     if(preg_match('/^[A-Za-z0-9]{6,12}/',$pwd))
      {	
	     $sql = "
		  	SELECT *
			FROM admin
			WHERE
			admname = '$mname'
			AND
			admpw = '$pwd'
			";
	      $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        if ($row) 
        {
	      $_SESSION['admname'] = $row['admname'];
	      echo "<script language=\"javascript\">";
        echo "location.href=\"index.php\"";
        echo "</script>";
        } 
        else 
        {
        echo "<script language=\"javascript\">";
	      echo "alert(\"Login failed, Check your password or manager name.\");";
	      echo "location.href=\"manage-login.php\"";
	      echo "</script>";
	      exit; 
         }
      } 
      else
      { 
      	echo "<script language=\"javascript\">";
	    echo "alert(\"Keywords are not correct\");";
	    echo "location.href=\"manage-login.php\"";
	    echo "</script>";
       exit;	  
      }
    }
   else
    {
	  echo "<script language=\"javascript\">";
	  echo "alert(\"Manager name is not correct.\");";
	  echo "location.href=\"manage-login.php\"";
	  echo "</script>";
      exit; 
    }
  }
?>

<div class="clr">&nbsp;</div>

</div>


</body>
</html>
