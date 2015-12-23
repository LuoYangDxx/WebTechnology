<?php
session_start();
setcookie(session_name(), session_id(), time() + 1200,"/"); 
	
	
include_once('connect.php');
if (empty($_SESSION['member'])) {
	header('location: login.php');
	exit();
}
$sql = "
		SELECT *
		FROM members
		WHERE
		id = '{$_SESSION['member']['id']}'
		";
$query = mysql_query($sql);
$member = mysql_fetch_array($query, MYSQL_ASSOC);
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
<form action="account-action.php" method="POST">
<table name="table" width="400" style="margin:0 auto" border="0">
  <tr style="margin-top:20px;">
    <td colspan="2"><strong>My account</strong><br><br></td>
  </tr>
  <tr>
    <td>My name is:</td>
    <td><input type="text" name="nickname" value="<?php echo $member['nickname'];?>" /></td>
  </tr>
  <tr>
    <td width="190"><br>My e-mail address is:<br><br></td>
    <td><input type="text" name="email" value="<?php echo $member['email'];?>" /></td>
  </tr>

   <tr style="padding:20px;">
    <td>My password:</td>
    <td><input type="password" name="newpwd" value="<?php echo $member['pwd'];?>"/></td>
  </tr>
   <tr>
    <td><br>My City:</td>
    <td><br>
    <input type="text" name="city" value="<?php echo $member['city'];?>" /></td>
    </td>
  </tr>
   <tr>
    <td><br>My Address:</td>
    <td><br><input type="text" name="address" value="<?php echo $member['address'];?>"/></td>
  </tr>
</table>
<br>
      <p style='text-align:center'>
      <input type="submit" value="Change"/>
      </p>
</form>
<div class="clr">&nbsp;</div>

</div>
</body>
</html>
