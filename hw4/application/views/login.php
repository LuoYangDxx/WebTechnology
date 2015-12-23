<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url(); ?>assets/css/1.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>
<body>
<div class="wrap">
<?php
include "header.php";
?>
<div class="login">
<form action="<?php echo base_url('user/submit');?>" method="POST" >
<table class="logintable">
  <tr>
    <td class="logintable1" colspan="2"><span style="font-size:25px;">Sign In</span></td>
  </tr>
  <tr>
    <td class="logintable2"><br>What is your e-mail address?</td>
    <td><br><input type="text" class="logintext" name="email" id="email" /></td>
  </tr>
  <tr>
    <td class="logintable2"><br>Yes, I have a password:</td>
    <td><br><input type="password" class="logintext" name="pwd" id="pwd" /></td>
  </tr>
  <tr>
    <td colspan="2"><br>
    <button class="loginbutton" type="submit" onclick="return CheckReg();">Sign In</button></td>
  </tr>
  <tr>
    <td class="logintable2" style="font-size:15px;"><br>No, I am a new customer. </td>
    <td ><br><a style="font-size:15px;" href="<?php echo base_url('user/register');?>">Go to create account</a>
    </td>
  </tr>
</table>
</form>
</div>
<div class="logindiv">
<div class="inner1">
  <div class="inner4"></div>
  <br>
 <p style="text-align:center;font-size:20px;">Hello! Welcome!</p><br>
<img style="float:right;margin-right:10px;width:90%;height:30%"src="<?php echo base_url(); ?>assets/img/logo.gif">
<img style="float:right;margin-top:15px;margin-right:10px;width:90%;height:30%"src="<?php echo base_url(); ?>assets/img/index_11.gif">
</div>
</div>
</div>
</body>
<script language="JavaScript">

function CheckReg(){
var email = $.trim($("#email").val());
var password = $.trim($("#pwd").val());
var search_mail = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;
var search_pwd = /^[A-Za-z0-9]{6,12}$/;

if(email==''){
alert("Please input the email");
$("#email").focus();
return false;
}
if(!search_mail.test(email)){
alert("Email is not correct");
$("#email").val("");
$("#email").focus();
return false;
}
if(password==''  ){
alert("Please input the password");
$("#pwd").focus();
return false;
}
if(!search_pwd.test(password)){
alert("Password is not correct.");
$("#pwd").val("");
$("#pwd").focus();
return false;
}
return true;
}
</script>
</html>
