<?php
session_start();
include_once('connect.php');
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

<div class="title">Payment</div>
<?php
$oid = $_POST['oid'];
$payment = $_POST['payment'];
$produ = $_SESSION['produ'];
$nums = $_SESSION['nums'];
	$sql = "
			INSERT INTO  payment 
			SET
			orderid = '{$oid}',
			products = '{$produ}',
			prodnum = '{$nums}',
			member_id = '{$_SESSION['member']['id']}',
			payment = '{$payment}'
			";
	$a = mysql_query($sql);
if($a)
{
	mysql_query("update orders set status=1 where id='$oid'");
	$url = "products.php";
echo "Successful.";
unset($_SESSION['produ']);
unset($_SESSION['nums']);
echo "<meta http-equiv=\"refresh\" content=\"1;url=".$url."\">\n";
        exit;
}
else
{
echo "Fail";	
}

?>

<div class="clr"></div>

</div>
</body>
</html>
