<html>
<head>
<style>

/* visited link */
a.two{
  color:blue;
  font-size:18px;
}
a.two:hover{ color: blue}
a.one{
  color:green;
  font-size:18px;
  padding-left: 50px;
}
a.one:hover{ color: #FF00FF;}

</style>
</head>
<body>
<table width="100%" border="0" style="margin:20px;">
  <tr>
    <td><p style='font-size:40px'>Shopping</p>
      <br><font style='font-size:15px;font-style:italic' color="#8E8E8E">Welcome To Our Store!!</font>
    </td>

  <td>
   <table style="margin-left:450px" width="70%" border="0">
    <tr>
     <td height="75">
     <p style='font-size:15px;'>
     <?php
     if (isset($_SESSION['member'])) {
     ?>
     Hello. <a class="two" href="account.php"><?php echo $_SESSION['member']['nickname'];?></a>
     , welcome back. <a class="two" href="loginout.php">Log out</a>
   
     <?php
    }  else {
    ?>
    Hello. <a class="two" href="login.php">Sign in</a>
    New customer? <a class="two" href="register.php">Start here</a>.
    <?php
    } 
    ?>
    </p>
     <br/>
     <form action="products.php" method="get">&nbsp;&nbsp;
      <input type="text" name="key" style="height:35px;width:200px;background:url(images/search.png)no-repeat center right transparent;"/> 
      <input type="submit" value="Search"  />  
     </form>
     </td>
   </tr>
 </table>
 </td>

  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="56" background="images/main_07.gif">
  <p style="text-align:center">
      <a class="one" href="index.php">Home</a>
      <a class="one" href="products.php">Products</a>
      <a class="one" href="cart.php">Cart</a>
      <a class="one" href="orders.php">My Orders</a>
      <a class="one" href="account.php">Account Information</a>
      <a class="one" href="admin/manage-login.php">Manager login</a> 
  </p>
</td>
<tr>
</table>
</body>
</html>
  