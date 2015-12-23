<?php
include_once('../connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
<style>
  body{
    background: #FDF5E6;
  }
</style>
</head>

<body>
<div class="wrap">
<?php
include "manage-header.php";

?>

<div class="title">Set as delivering</div>

<?php
$sql = "
		UPDATE 
		orders SET status=2
		WHERE
		id = '{$_GET['id']}'
		";
$query = mysql_query($sql);

echo "Set as delivering successful."
?>
<a href="manage-orders.php">Go back</a>

<div class="clr"></div>



</div>
</body>
</html>
