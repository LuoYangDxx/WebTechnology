<?php
session_start();
setcookie(session_name(), session_id(), time() + 1200,"/"); 
	
include_once('connect.php');
//
if (!preg_match('/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/',$_POST['email'])) {
	echo "<script language=\"javascript\">";
	echo "alert(\"Email is not correct\");";
	echo "location.href=\"account.php\"";
	echo "</script>";	
	exit();
}

if(!preg_match(
'/^[A-Za-z0-9]{6,12}$/',$_POST['newpwd'])){  
    echo "<script language=\"javascript\">";
	echo "alert(\"Password is not correct. It must have 6-12 long\");";
	echo "location.href=\"account.php\"";
	echo "</script>";	
    exit();
}
 
if (!preg_match(
'/^[A-Za-z0-9]{3,20}$/',$_POST['nickname'])){  
    echo "<script language=\"javascript\">";
	echo "alert(\"Nickname is not correct. It must have 3-20 long\");";
	echo "location.href=\"account.php\"";
	echo "</script>";	
	exit();
}

if (!preg_match(
'/^[A-Za-z0-9]{3,20}$/',$_POST['city'])){  
    echo "<script language=\"javascript\">";
	echo "alert(\"City is not correct. It must have 3-20 long\");";
	echo "location.href=\"account.php\"";
	echo "</script>";	
	exit();
}

if (!preg_match(
'/^[A-Za-z0-9]{3,20}$/',$_POST['address'])){  
    echo "<script language=\"javascript\">";
	echo "alert(\"Address is not correct. It must have 3-20 long\");";
	echo "location.href=\"account.php\"";
	echo "</script>";	
	exit();
}


//  

$newpwd_md5 = $_POST['newpwd'];
$address = $_POST['address'];
$city = $_POST['city'];

if ($_POST) {
	$sql = "
			UPDATE members 
			SET
			nickname = '{$_POST['nickname']}',
			email = '{$_POST['email']}',
			pwd = '{$newpwd_md5}',
			city = '{$city}',
			address = '{$address}'
			WHERE id = '{$_SESSION['member']['id']}'
			";
	$a = mysql_query($sql);
}


if ($a) {
	$_POST['id'] = $_SESSION['member']['id'];
	$_SESSION['member'] = $_POST;

    echo "<script language=\"javascript\">";
	echo "alert(\"Success!!\");";
	echo "location.href=\"account.php\"";
	echo "</script>";	

}
else 
	echo "<script language=\"javascript\">";
	echo "alert(\"Fail!!\");";
	echo "location.href=\"account.php\"";
	echo "</script>";
?>

