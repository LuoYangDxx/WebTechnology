<?php foreach ($account as $rowf){$member=$rowf;}
?>
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
<form class="accountform"action="<?php echo base_url('user/userinfo');?>"method="POST">
<table name="table" width="80%" style="margin-left:20%" border="0">
  <tr>
    <td colspan="2"><strong><br><br>My account</strong><br><br></td>
  </tr>
  <tr>
    <td>My name is:</td>
    <td><input type="text" name="nickname" id="nickname"value="<?php echo $member['nickname'];?>" /></td>
  </tr>
  <tr>
    <td width="190"><br>My e-mail address is:<br><br></td>
    <td><input type="text" name="email" id="email"value="<?php echo $member['email'];?>" /></td>
  </tr>

   <tr>
    <td>My password:</td>
    <td><input type="password" name="newpwd" id="newpwd"value="<?php echo $member['pwd'];?>"/></td>
  </tr>
   <tr>
    <td><br>My City:</td>
    <td><br>
    <input type="text" name="city" id="city"value="<?php echo $member['city'];?>" /></td>
    </td>
  </tr>
   <tr>
    <td><br>My Address:</td>
    <td><br><input type="text" name="address" id="address"value="<?php echo $member['address'];?>"/></td>
    <td></td>
  </tr>
</table>
<br>
<p style='text-align:center'>
<input type="submit" onclick="return CheckReg();" value="Change"/>
</p><br><br>
</form>
<div class="accountdiv">
  <br><br>
  <input type="button" id="button"name="button"value="Get Help Information"/>
  <br><br>
  <p id="test"><img src="<?php echo base_url(); ?>assets/img/11.jpg" width="100%" height="100%" border="0" /></p>
</div> 
<div style="margin-top:500px;
            height:100px;width:100%;
            background-repeat:repeat-x;">
<img class="bottom" width="100%" height="100%"src="<?php echo base_url(); ?>assets/img/header.jpg"/>
</div> 
</div>
<script>
$(document).ready(function(){
  $("#button").click(function(){
    $('#test').load('<?php echo base_url(); ?>assets/img/help.txt');
  })
})

function CheckReg(){
var email = $.trim($("#email").val());
var password = $.trim($("#newpwd").val());
var nickname = $("#nickname").val();
var address = $("#address").val();
var city = $("#city").val();
var search_mail = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;
var search_pwd = /^[A-Za-z0-9]{6,12}$/;
var search_nick = /^[A-Za-z0-9\s?]{3,20}$/;
var search_address = /^[A-Za-z0-9\s?]{3,40}$/;
var search_city= /^[A-Za-z0-9\s?]{3,40}$/;

if(nickname==''){
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
$("#newpwd").focus();
return false;
}
if(!search_pwd.test(password)){
alert("Password is not correct.It must have 6-12 long");
$("#newpwd").val("");
$("#newpwd").focus();
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
