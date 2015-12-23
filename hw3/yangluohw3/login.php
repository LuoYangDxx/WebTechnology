<?php
@session_start();
include_once('connect.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="js/user.js"></script>
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" /><SCRIPT LANGUAGE="JavaScript">
<!--
	function checkform() {
		
	}
//-->
</SCRIPT>
</head>

<body>
<div class="wrap">
<?php
include "header.php";
if (isset($_SESSION["member"])==true)
{
$back = "products.php";
echo "<meta http-equiv=\"refresh\" content=\"0;url=".$back."\">\n";
}
?>
<div style="margin-top:30px;width:60%;float:left;border-style:solid;border-width:3px;border-color: #F4A460">
<form action="login-action.php" method="POST" onsubmit="return checkform();">
<table width="500" style="margin:60px;" border="0">
  <tr>
    <td style="font-size:18px;color:red;"colspan="2"><span style="font-size:25px;">Sign In</span></td>
  </tr>
  <tr>
    <td style="font-size:15px;"><br>What is your e-mail address?</td>
    <td><br><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td style="font-size:15px;"><br>Yes, I have a password:</td>
    <td><br><input type="password" name="pwd" id="pwd" /></td>
  </tr>

  <tr>
    <td colspan="2"><br>
    <button style="width:100px;margin-left:30px;"type="submit"  onclick="return CheckLog();" >Sign In</button></td>
  </tr>
  <tr>
    <td style="font-size:15px;"><br>No, I am a new customer. </td>
    <td ><br><a style="font-size:15px;" href="register.php">Go to create account</a>
    </td>
  </tr>
</table>
</form>
</div>

<div style="width:35%;float:right">
<div class="inner1">
  <div class="inner4"></div>
  <br>
 <p style="text-align:center;font-size:20px;">Hello! Welcome!</p><br>
 <p style="text-align:center;font-size:20px;">Our Store:</p><br><br>
 <ul style="float:left;margin-left:15px;width:45%">
  <li style="font-size:18px;color:#FF4500">Los Angeles</li><br>
  <li style="font-size:18px;color:#FF4500">Hong Kong</li><br>
  <li style="font-size:18px;color:#FF4500">New York</li><br>
   <li style="font-size:18px;color:#FF4500">Sanfrancisco</li>
</ul>
<img style="float:right;margin-right:10px;width:45%" height="140"src="images/1.jpg">
</div>
</div>
</div>
</body>
</html>
