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
								<li class="active"><a href="services.php">Services</a></li>
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
			<div class="content">
				<div class="wrap">
					<div class="services1">
						<h4>Our Services</h4>
						<div class="content-top-grids services-grids">
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic" style="position:relative;float:left;">
									<a href="#"><img src="./images/timer.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>24x7 Servives</h3>
									<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								</div>
								<div class="clear"> </div>
							</div>
								
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="./images/tool.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>CARE ADVICES</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="./images/inject.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>EMERGENCY</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="./images/timer.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>24x7 Servives</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="./images/tool.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>CARE ADVICES</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="./images/inject.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>EMERGENCY</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="./images/timer.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>24x7 Servives</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="./images/tool.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>CARE ADVICES</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid services-grid1">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="./images/inject.png" title="image-name"></a>
								</div>
								<div class="content-top-grid-title">
									<h3>EMERGENCY</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="clear"> </div>
					</div>
					</div>
				<div class="clear"> </div>
				</div>
			<!----End-content----->
		</div>
		<!---End-wrap---->
		<!---start-footer---->
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

