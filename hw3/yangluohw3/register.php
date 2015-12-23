<?php
include_once('connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="js/user.js"></script>
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>
<div style="margin-top:30px;">
  <p style="text-align:center;font-size:25px;margin-bottom:10px;">Create account</p>
  <br><br>
</div>
<form action="register-action.php" name="form2" method="POST" enctype="multipart/form-data" >

<table width="500" style="margin:0 auto" border="0">
  <tr>
    <td>Enter a Nickname: <span style="color:red">(Need)</span><br><br></td>
    <td colspan="2"><input type="text" name="nickname" id="nickname" /><br><br></td>
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
    <td>Enter a address:<br><br></td>
    <td colspan="2"><input type="text" name="address" onblur="upperCase()" id="address" /><br><br></td>
  </tr>

  <tr>
    <td>Enter a City:</td>
    <td colspan="2"><input type="text" name="city" onblur="Alert()" id="city" /></td>
  </tr>


  <tr>
    <td align="center"colspan="3">
      <br><button type="submit" onclick="return CheckReg();" >Create account</button></td>
  </tr>
</table>
</form>
<div class="clr">&nbsp;</div>
</div>
<script language="javascript">

function upperCase(){
  var telephone=document.form2.address.value;
  if(telephone!=""){
  var validation=/^[A-Za-z0-9]{3,12}$/;
  if(!validation.test(telephone)){
    window.alert("Please enter a right information.");
    return false;
    }else return true;
  }
}

function Alert()
{
  var telephone=document.form2.city.value;
  if(telephone!="")
  {
  var validation=/^[A-Za-z0-9]{3,12}$/;
  if(!validation.test(telephone))
    {
    window.alert("Please enter a right information.");
    return false;
    }else return true;
  }
}

</script>
</body>
</html>
