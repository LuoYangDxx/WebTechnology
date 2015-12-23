<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?php echo base_url(); ?>assets/css/1.css" rel="stylesheet" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>
<br>
<p style="text-align:center;font-size:25px;">Create account</p><br>
<form class="registerform"action="<?php echo base_url('user/newregister');?>" name="form2" id="form2" method="POST" enctype="multipart/form-data" >
<fieldset>
<table  style="margin:0 auto" border="0">
  <tr>
    <td><br>Enter a Nickname: <span style="color:red">(Need)</span><br><br></td>
    <td colspan="2"><br><input type="text" name="nickname" id="nickname" /><br><br></td>
  </tr>
  <tr>
    <td width="188">E-mail address: <span style="color:red">(Need)</span><br><br></td>
    <td colspan="2"><input type="text" name="email" id="email" /><br><br></td>
  </tr>
  <tr>
    <td>Enter a password: <span style="color:red">(Need)</span><br><br></td>
    <td colspan="2"><input type="password" name="pwd"  id="pwd" /><br><br></td>
  </tr>
<tr>
    <td>Enter a address:<span style="color:red">(Need)</span><br><br></td>
    <td colspan="2"><input type="text" name="address"  id="address" /><br><br></td>
  </tr>

  <tr>
    <td>Enter a City:<span style="color:red">(Need)</span></td>
    <td colspan="2"><input type="text" name="city"  id="city" /></td>
  </tr>
  <tr>
    <td align="center"colspan="3">
      <br><button type="submit" onclick="return CheckReg();" >Create account</button><br><br></td>
  </tr>
</table>
</fieldset>
</form>
<div class="registerdiv">
<input type="button" style="width:100%;background-image:url(<?php echo base_url(); ?>assets/img/tab_14.gif);" id="click" value="Hide it">
<div id="show" style="width:100%;height:100%;display:block;" >
  <br>
     Our Information and contact!<br>
    Telephone:(213)-323-3232<br>
    Location: Los Angeles<br><br>
    <img style="margin-top:5px;width:100%;height:30%" src="<?php echo base_url(); ?>/assets/img/2.jpg">
</div>
<div style="margin-top:500px;
            height:100px;width:100%;
            background-repeat:repeat-x;">
<img class="bottom" width="100%" height="100%"src="<?php echo base_url(); ?>assets/img/header.jpg"/>
</div>
</div>
<script language="javascript">


$(document).ready(function(){
  $("#click").click(function(){
  $("#show").fadeToggle("slow");
  });
});


function CheckReg(){
var email = $.trim($("#email").val());
var password = $.trim($("#pwd").val());
var nickname = $("#nickname").val();
var address = $("#address").val();
var city = $("#city").val();
var search_mail = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;
var search_pwd = /^[A-Za-z0-9]{6,12}$/;
var search_nick = /^[A-Za-z0-9\s?]{2,20}$/;
var search_address = /^[A-Za-z0-9\s?]{2,40}$/;
var search_city= /^[A-Za-z0-9\s?]{2,40}$/;

if(nickname==''  ){
alert("Please input the nickname");
$("#nickname").focus();
return false;
}
if(!search_nick.test(nickname)){
alert("NickName is not correct.");
$("#nickname").val("");
$("#nickname").focus();
return false;
}
if(email==''  ){
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
alert("Password is not correct.It must have 6-12 long");
$("#pwd").val("");
$("#pwd").focus();
return false;
}
if(address==''  ){
alert("Please input the address");
$("#address").focus();
return false;
}
if(!search_address.test(address)){
alert("Address is not correct.");
$("#address").val("");
$("#address").focus();
return false;
}
if(city==''){
alert("Please input the city");
$("#city").focus();
return false;
}
if(!search_city.test(city)){
alert("City is not correct.");
$("#city").val("");
$("#city").focus();
return false;
}
return true;
}
</script>
</body>
</html>
