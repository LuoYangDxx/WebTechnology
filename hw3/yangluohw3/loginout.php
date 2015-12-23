<?php
include_once('connect.php');
unset($_SESSION['member']);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Come2Us</TITLE>
<link href="images/1.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="wrap">
<?php
include "header.php";
?>
<div class="title">Log out</div>

Operation is successful, <a href="login.php">Sign in</a> OR Go to <a href="./index.php">home</a>


</div>
</body>
</html>
