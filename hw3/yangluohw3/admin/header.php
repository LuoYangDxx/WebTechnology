<table width="100%" border="0" style="margin-bottom:20px;">
  <tr>
    <td><img src="images/logo.jpg" /></td>
    <td>
    
    
    <table width="100%" border="0">
  <tr>
    <td height="75">
    <?php
    if (isset($_SESSION['member'])) {
		
   ?>
   Hello. <a href="account.php"><?php echo $_SESSION['member']['nickname'];?></a>, welcome back. <a href="loginout.php">Log out</a>
   
   <?php
    }  else {
    ?>
    
    Hello. <a href="login.php">Sign in</a> to get personalized recommendations. New customer? <a href="register.php">Start here</a>.

   <?php
    } 
    ?><br />
    <form action="products.php" method="get"><input type="text" name="key" /> <input type="submit" value="Search products"  />  </form>
    </td>
  </tr>
  <tr>
    <td class="naver"><a href="http://localhost:8888/index.php">Home</a>
      <a href="products-featured.php">Special Sales</a>
      <a href="products.php">Products</a>
      <a href="cart.php">Cart</a>
      <a href="orders.php">My Orders</a>
      <a href="account.php">Account Information</a>  
    </td>
  </tr>
</table>

</td>
  </tr>
</table>