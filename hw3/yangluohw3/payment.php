<?php
include_once('connect.php');

include_once('filter.php');
$orderid = $_GET['id'];
FilterGetIn($orderid);
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

<div style="margin-top:30px;">
  <p style="text-align:center;font-size:25px;margin-bottom:10px;">Payment</p>
  <hr>
</div>

<form id="form1" name="form1" method="post" action="payment-action.php">
  <label for="payment"></label>
  <input type="hidden"  name="oid" value="<?php echo $orderid; ?>" />
  <div style="text-align:center;margin-top:40px">
  <select name="payment" id="payment">
    <option>Visa Credit</option>
    <option>Visa Debit</option>
    <option>Cash on delivery</option>
  </select>
  <input type="submit" name="submit" id="submit" value="submit" />
</div>
</form>

</div>
</body>
</html>
