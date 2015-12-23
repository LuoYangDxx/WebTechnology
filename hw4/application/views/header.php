<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="<?php echo base_url(); ?>assets/css/1.css" rel="stylesheet" type="text/css" media="screen and (min-width: 401px)" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>
<body style="width:100%;heigth:100%">
<table width="100%" border="0" style="margin-top:1.5em;">
  <tr>
    <td><p class="totitle">Shopping</p>
      <img class="headerlogo"src="<?php echo base_url(); ?>assets/img/logo1.gif"/>
      <br><p class="totitle1" style='font-style:italic;color:#8E8E8E'>Welcome To Our Store!!</p>
    </td>
  <td>
   <table style="float:right" width="70%" border="0">
    <tr>
     <td height="30%">
     <p class="loginhead1">
    <?php
     if ($this->session->userdata('uid')) {
      $username=$this->session->userdata('uid');
     ?>
     Hello. <a class="two" href="<?php echo base_url('user/uaccount');?>"><?php echo $username;?></a>
     , welcome back. <a class="two" href="<?php echo base_url('user/logout');?>">Log out</a>
     <?php
    }  
    else {
    ?>
    Hello. <a class="two" href="<?php echo base_url('user/signin');?>">Sign in</a>
    New customer? <a class="two" href="<?php echo base_url('user/register');?>">Start here</a>.
    <?php
    } 
    ?>
    </p>
     <br/>
     </td>
   </tr>
 </table>
 </td>
</tr>
</table>
<table class="logotable" background="<?php echo base_url(); ?>assets/img/main_07.gif">
<tr>
<td height="60"style="text-align:center;">
  <p class="headerlink">
      <a class="one" href="<?php echo base_url('welcome/index');?>">Home</a>
      <a class="one" href="<?php echo base_url('welcome/product');?>">Products</a>
      <a class="one" href="<?php echo base_url('mycart/viewcart');?>">Cart</a>
      <a class="one" href="<?php echo base_url('myorder/vieworder');?>">My Orders</a>
      <a class="one" href="<?php echo base_url('user/uaccount');?>">Account Information</a>
  </p>
  <select class="headerselect"name="select" id="select"onchange="self.location.href=options[selectedIndex].value" >
       <option value='<?php echo base_url('welcome/index');?>'>Home</option>
       <option value='<?php echo base_url('welcome/product');?>'>Products</option>
        <option value='<?php echo base_url('mycart/viewcart');?>'>Cart</option>
         <option value='<?php echo base_url('myorder/vieworder');?>'>My Orders</option>
          <option value='<?php echo base_url('user/uaccount');?>'>Account Information</option>
  </select>
</td>
<tr>
</table>
</body>
</html>
  