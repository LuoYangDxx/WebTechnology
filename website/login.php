<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Deviserinstruments</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<style>


.main{
	width: 55%;
    float: right;
}
body{
	background-color: #D1D1D1;
}
div.q {
	margin:7%;
	background:#104E8B;
	border-radius:0.4em;
  	border:1px solid #0A192A;
  	overflow:hidden;
  	position:relative;
  	box-shadow: 0 5px 10px 5px rgba(0,0,0,0.2);
}
form.flogin {
	margin:5%;
}
div.inset {
 padding:20px; 
  border-top:1px solid blue;
}
label {
 	color:#B0E0E6;
  	display:block;
  	font-size:13px;
  	padding-bottom:9px;
}
label[for=remember]{
 	color:#fff;
  	display:inline-block;
  	font-size: 13px;
}
.logins {
  font-family: 'Open Sans', sans-serif;
  width:100%;
  padding:5px 3px;
  background: #fff; /* Old browsers */
  border:1px solid #cfcfcf;
  box-shadow:0 1px 0 rgba(255,255,255,0.1);
  border-radius:0.5em;
  margin-bottom:20px;
  font-size:13px;
  outline: none;

}
p.userlogin{
 text-align: center;
 font-size: 30px;
 color: #fff;
}
.p-container:after {
 clear:both;
  display:table;
  content:"";
}
.p-container span a {
  font-size:16px;
  display:block;
  float:left;
  color:#0d93ff;
  padding-top: 4px;
}
input.submitlogin {
  padding:5px 20px;
  border:1px solid #439F07;
  text-shadow:0 -1px 0 rgba(0,0,0,0.4);
  box-shadow:
  inset 0 1px 0 rgba(255,255,255,0.3),
  inset 0 10px 10px rgba(255,255,255,0.1);
  border-radius:0.3em;
  background: rgb(138,199,84); /* Old browsers */
 
   background: rgb(138,199,84); /* Old browsers */
  background: -moz-linear-gradient(top,  rgba(138,199,84,1) 0%, rgba(121,201,50,1) 45%, rgba(102,190,24,1) 48%, rgba(57,150,2,1) 97%, rgba(102,174,63,1) 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(138,199,84,1)), color-stop(45%,rgba(121,201,50,1)), color-stop(48%,rgba(102,190,24,1)), color-stop(97%,rgba(57,150,2,1)), color-stop(100%,rgba(102,174,63,1))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  rgba(138,199,84,1) 0%,rgba(121,201,50,1) 45%,rgba(102,190,24,1) 48%,rgba(57,150,2,1) 97%,rgba(102,174,63,1) 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,  rgba(138,199,84,1) 0%,rgba(121,201,50,1) 45%,rgba(102,190,24,1) 48%,rgba(57,150,2,1) 97%,rgba(102,174,63,1) 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top,  rgba(138,199,84,1) 0%,rgba(121,201,50,1) 45%,rgba(102,190,24,1) 48%,rgba(57,150,2,1) 97%,rgba(102,174,63,1) 100%); /* IE10+ */
  background: linear-gradient(to bottom,  rgba(138,199,84,1) 0%,rgba(121,201,50,1) 45%,rgba(102,190,24,1) 48%,rgba(57,150,2,1) 97%,rgba(102,174,63,1) 100%); /* W3C */
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8ac754', endColorstr='#66ae3f',GradientType=0 ); /* IE6-9 */

  color:#fff;
  float:right;
  font-weight:bold;
  cursor:pointer;
  font-size:15px;
  outline: none;
}
input.submitlogin:hover {
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 -10px 10px rgba(255,255,255,0.1);
    background: rgb(102,174,63); /* Old browsers */
	
	 background: rgb(102,174,63); /* Old browsers */
	background: -moz-linear-gradient(top,  rgba(102,174,63,1) 0%, rgba(57,150,2,1) 3%, rgba(102,190,24,1) 52%, rgba(121,201,50,1) 55%, rgba(138,199,84,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(102,174,63,1)), color-stop(3%,rgba(57,150,2,1)), color-stop(52%,rgba(102,190,24,1)), color-stop(55%,rgba(121,201,50,1)), color-stop(100%,rgba(138,199,84,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  rgba(102,174,63,1) 0%,rgba(57,150,2,1) 3%,rgba(102,190,24,1) 52%,rgba(121,201,50,1) 55%,rgba(138,199,84,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  rgba(102,174,63,1) 0%,rgba(57,150,2,1) 3%,rgba(102,190,24,1) 52%,rgba(121,201,50,1) 55%,rgba(138,199,84,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  rgba(102,174,63,1) 0%,rgba(57,150,2,1) 3%,rgba(102,190,24,1) 52%,rgba(121,201,50,1) 55%,rgba(138,199,84,1) 100%); /* IE10+ */
	background: linear-gradient(to bottom,  rgba(102,174,63,1) 0%,rgba(57,150,2,1) 3%,rgba(102,190,24,1) 52%,rgba(121,201,50,1) 55%,rgba(138,199,84,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#66ae3f', endColorstr='#8ac754',GradientType=0 ); /* IE6-9 */

}
		</style>
	</head>
	<body>
		<!---start-wrap---->
		
			<!---start-header---->
			<div class="header">
					<div class="top-header">
						<div class="wrap">
						<div class="top-header-left">
							<p>+1(408) 955-0938</p>
						</div>
						<div class="right-left">
							<ul>
								<li class="login"><a href="login.php">Login</a></li>
								<li class="sign"><a href="#">Sign up</a></li>
							</ul>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
					<div class="main-header">
						<div class="wrap">
							<div class="logo">
								<a href="index.php"><img src="./images/logo.png" title="logo" /></a>
							</div>
                   
							<div class="social-links">
                               
								<ul>
									<li><a href="#"><img src="./images/facebook.png" title="facebook" /></a></li>
									<li><a href="#"><img src="./images/twitter.png" title="twitter" /></a></li>
									<li><a href="#"><img src="./images/feed.png" title="Rss" /></a></li>
									<div class="clear"> </div>
								</ul>
							</div>
							<div class="clear"> </div>
						</div>
					</div>
					<div class="clear"> </div>
					<div class="top-nav">
						<div class="wrap">
							<ul>
								<li ><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								
								<li><a href="solution.php">Solution</a></li>
								<li class="active"><a href="contact.php">Contact</a></li>
							</ul>
							<div class="search-box">
				          <form>
				            <input type="text" name="s" class="textbox" value="" onfocus="this.value = '';" onblur="if
				                  	(this.value == '') {this.value = 'search...';}">
				            <input type="submit" value="">
				        </form>
		            </div>
							<div class="clear"> </div>
						</div>
					</div>
			</div>
			
			<div class="content">
				<div class="wrap2">
					<br><br>
                 <div class="wrap3">

                         <div class="services-sidebar"style="margin-left:20%;float:left;">
                         	<br><br><br><br>
							<h3>SOLUTIONS</h3>
							 <ul>
							  	<li><a href="solution.php">WIRELESS</a></li>
							  	<li><a href="solution2.php">Fiber Optics</a></li>
							  	<li><a href="solution3.php">Broadband</a></li>
							  	<li><a href="solution4.php">ETHERNET</a></li>
					 		 </ul>
						</div>
      
		<div class="main">
		<div class="q">
		<form method="post" action="login_test.php" class="flogin"  >
    		<p class="userlogin">User Login </p><br>
  			<div class="inset">
                <?php
                    if(isset($_SESSION['errmsg']))
                    {
                        echo "<p style='color: red;'>".$_SESSION['errmsg']."</p>";
                        unset($_SESSION['errmsg']);
                    }
                ?>
	  			<p>
	    		 <label for="email">EMAIL ADDRESS</label>
   	 			<input type="text" class="logins" name="email"/>
				</p>
  				<p>
				    <label for="password">PASSWORD</label>
				    <input type="password" class="logins" name="password"/>
  				</p>
				  <p>
				    <input type="checkbox" name="remember" id="remember">
				    <label for="remember">Remember me</label>

				  </p>  
				  <br>
				 <p class="p-container"> 
			  	<span><a href="#">Forgot password ?</a>
			  		<a style="margin-left:10%;"href="#">Or Register</a></span>
			    <input style="float:right" type="submit"class="submitlogin" value="Login">
			  </p>
 			 </div>
		</form>
	</div>
</div>
			
				<div class="clear"> </div>
			</div>


<div class="wrap4">
						<br></br>
						<hr class="index" style="width:100%;">
						<br></br>
						<div class="content-top-grid">
								<div class="content-top-grid-pic">
									<img src="./images/2735140.png" ;title="image-name" width="85%;" />
								</div>
								<div class="clear"> </div>
					  
								<p style="font-family:verdana;font-size:100%;line-height:150%">Deviser has been a trusted provider of test equipment to large communication service providers, offering a complete test solution for cable, wireless, fiber optics and telecommunications networks.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid">
								<div class="content-top-grid-pic">
									<img src="./images/923748.png" title="image-name" width="85%;"/>
								</div>
								<div class="clear"> </div>
								<p style="font-family:verdana;font-size:100%;line-height: 150%">Our feature-rich solutions reduce CAPEX by incorporating multiple test functions and capabilities, and reduce OPEX by developing easy-to-use and revolutionary features to lessen time on-site and decrease the need for truck rolls.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid">
							
								<div class="content-top-grid-pic">
									<img src="./images/317640.png" title="image-name"width="85%;" height="195px" />
								</div>
								<div class="clear"> </div>
							
								<p style="font-family:verdana;font-size:100%;line-height: 150%">Our goal is to enable our customers to provide high quality service for their customers.  With our focus on manufacturing quality products, we are confident that our customers are empowered to do their job right the first time, reducing service calls.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="clear"> </div>
					</div>




			
		</div>
		
		<div class="footer">
			<div class="wrap">
				<div class="footer-grids">
					<div class="footer-grid">
						<h3>OUR Profile</h3>
						 <ul>
							<li><a href="#">AE4000 Modular OTDR</a></li>
							<li><a href="#">AE2300 Handheld OTDR</a></li>
							<li><a href="#">AE500 Compact CWDM Channel Analyzer</a></li>
							<li><a href="#">AE600 CWDM Channel Analyzer</a></li>
							<li><a href="#">AE700 DWDM Channel Analyzer</a></li>
							<li><a href="#">EP300 PON Power Meter</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>Our Services</h3>
						 <ul>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
							<li><a href="#">Quis nostrud exercitation</a></li>
							<li><a href="#">Ullamco laboris nisi</a></li>
							<li><a href="#">Ut aliquip ex ea commodo</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>OUR FLEET</h3>
						 <ul>
							<li><a href="#">DS2800 Cable TV Analyzer</a></li>
							<li><a href="#">DS1610  Monitoring System</a></li>
							<li><a href="#">DS8831H Spectrum Analyzer</a></li>
							<li><a href="#">DS8853Q and DS8831Q</a></li>
							<li><a href="#">DS2500 Series QAM Analyzer</a></li>
							<li><a href="#">DS2400 Series QAM Analysis Meter</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>CONTACTS</h3>
						 <p>780 Montague Expressway Suite 606</p>
						 <p>San Jose, CA 95131</p>
						 <p>info@deviserinstruments.com</p>
						 <span>+1(408) 955-0938</span>
					</div>
					<div class="clear"> </div>
				</div>
				<div class="clear"> </div>
				
				<div class="copy-tight">
					<p>Design by <a href="http://w3layouts.com/">Jim Luo</a></p>
				</div>
				
			</div>
		</div>
	</body>
</html>

