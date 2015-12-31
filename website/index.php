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
		<link rel="stylesheet" href="./css/responsiveslides.css">
		<link href="./css/default.css" rel="stylesheet" type="text/css" media="all" />
		<link href="./css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="./js/jquery-1.9.0.min.js"></script>
        <script src="./js/jquery.nivo.slider.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			   $(window).load(function() {
        $('#slider').nivoSlider();
    });
		  </script>
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
                                <?php
                                if(isset($_SESSION['email']) && isset($_SESSION['password'])){
                                    echo "<li class='sign'><a href='#'>".$_SESSION['email']."</a></li>
                                        <li class='login'><a href='signout.php'>Sign Out</a>";
                                } else {
                                    echo "<li class='login'><a href='login.php'>Login</a></li>
                                            <li class='sign'><a href='#'>Sign up</a></li>";
                                }
                                ?>
							</ul>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
					<div class="main-header">
						<div class="wrap">
							<div class="logo">
								<a href="index.html"><img src="./images/logo.png" title="logo" /></a>
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
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="about.php">About</a></li>
								
								<li><a href="solution.php">Solution</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
							<div class="search-box">
				          <form>
				            <input type="text" name="s" class="textbox" value="" onfocus="this.value = '';" onblur="if
				                  	(this.value == '') {this.value = 'search...';}">
				            <input type="submit" value>
				        </form>
		            </div>
							<div class="clear"> </div>
						</div>
					</div>
			</div>
			
			<div class="image-slider"style="margin-top:40px;">
					
		    <div id="wrapper">
 	         	<div class="slider-wrapper theme-default">
                  <div id="slider" class="nivoSlider"style="width:70%;margin-left:15%;">
                    <img src="./images/slide1.jpg"  alt="" />
                 	<img src="./images/slide2.jpg"  alt="" />
                    <img src="./images/slide3.jpg"  alt="" />
                  </div>
                </div>
            </div>
						 <!-- Slideshow 2 -->
					</div>
			
			<div class="content">
				<div class="content-top-grids">
					<div class="wrap">
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
				<div class="clear"> </div>
				<div class="boxs">
					<div class="wrap">
						<div class="section group">
							<div class="grid_1_of_3 images_1_of_3">
								  <h3>WELCOME!</h3>
								  <span>We take pride in continuously designing and innovating to create solutions</span>
								  <p>With our focus on manufacturing quality products, we are confident that our customers are empowered to do their job right the first time, reducing service calls.  We take pride in continuously designing and innovating to create solutions that make the installation, verification, and maintenance of communication networks easier, faster and more accurately.</p>

							     <p>Headquartered in San Jose, California, Deviser Instruments was founded as a spin-off out of Deviser Electronics Instrument to address the need for high quality, value-based field network test solutions for communications service providers and equipment manufacturers worldwide. </p>
							    <p>Registered and operating in the USA, Deviser Instruments functions as an autonomous entity that includes system engineering design, product management, sales and marketing, customer service and technical support.</p>
							     <div class="button"><span><a href="#">Read More</a></span></div>
							</div>
							<div class="grid_1_of_3 images_1_of_3">
								  <h3>ABOUT US</h3>
								  <span>Lorem ipsum dolor sit amet conse ctetur adipisicing elit,</span>
								  <p>in voluptate Lorem ipsum, in voluptate velit esse cillum dolore eu fugiat amet conse ctetur adipisicing elit nulla pariatur.</p>
								  <span>Lorem ipsum dolor sit, fugiat nulla pariatur</span>
								  <p>fugiat nulla Lorem ipsum dolor sit amet, consectetur adipisicing elitamet conse ctetur adipisicing elit, fugiat nulla pariatur.</p>
								  <span>Lorem ipsum dolor sit amet cons,</span>
								  <p>consectetur Lorem ipsum dolor sit amet, consectetur adipisicing elit, in voluptate velit esse cillu.</p>
								  <span>Lorem ipsum dolor sit amet conse ctetur adipisicing elit,</span>
								  <p>Lorem ipsum dolor sit amet, consectetur adipisorem ipsum dolor sit amet, consectetur adipiicing elit, in voluptate.</p>
								  
							     <div class="button"><span><a href="#">Read More</a></span></div>
							</div>
							<div class="grid_1_of_3 images_1_of_3">
								  <h3>OUR History</h3>
								  <ul>
								  	<li><a href="#">Lorem ipsum dolor sit amet</a></li>
								  	<li><a href="#">Conse ctetur adipisicing</a></li>
								  	<li><a href="#">Elit sed do eiusmod tempor</a></li>
								  	<li><a href="#">Incididunt ut labore</a></li>
								  	<li><a href="#">Et dolore magna aliqua</a></li>
								  	<li><a href="#">Ut enim ad minim veniam</a></li>
								  	<li><a href="#">Quis nostrud exercitation</a></li>
								  	<li><a href="#">Ullamco laboris nisi</a></li>
								  	<li><a href="#">Ut aliquip ex ea commodo</a></li>
								  </ul>
							     <div class="button"><span><a href="#">Read More</a></span></div>
							</div>
						</div>
					</div>
					</div>
		</div>
		<div class="footer">
			<div class="wrap">
				<div class="footer-grids">
					<div class="footer-grid">
						<h3>Fiber Optics Solutions</h3>
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
						<h3>Broadband / Cable TV Solutions</h3>
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

