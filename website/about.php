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
								<li class="active"><a href="about.php">About</a></li>
								
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
				<div class="about">
					<div class="ourteam">
						<br>
									<h3>Our Company</h3>
									<div class="section group">
										<img src="./images/7366131.jpg"width="100%;">
										<br></br><hr><br></br>
											 <h3>About Deviser Instruments</h3>
											 <p style="font-family:verdana;font-size:100%;line-height: 150%">Headquartered in San Jose, California, Deviser Instruments was founded as a spin-off out of Deviser Electronics Instrument to address the need for high quality, value-based field network test solutions for communications service providers and equipment manufacturers worldwide.  Registered and operating in the USA, Deviser Instruments functions as an autonomous entity that includes system engineering design, product management, sales and marketing, customer service and technical support. Committed to delivering value to its customer base, the company entered into a  joint-venture relationship with Deviser Electronics Instruments which enables the company to leverage more than 25 years of innovation, manufacturing, and service excellence to the communications test and measurement market worldwide.<a href="#">[...]</a></p>
									</div>
								</div>
								<br></br>
								<hr>
					<div class="about-topgrid1">
										<h3>Who We Are</h3>
										<img src="./images/4986677.png" title="name" width="100%;">
										<h4>Deviser focus on customer requirements, customer satisfaction and technical innovation set us apart from competitive alternatives.  Key reasons why so many communications service providers and equipment manufacturers chose Deviser solutions include:</p>

										<p>Leveraging a large engineering team, a 247,000 square foot R&D and manufacturing facility, and a comprehensive on-site EMC laboratory and test facility, Deviser Instruments designs and manufactures reliable and highly-accurate test and measurements solutions developed through a culture of innovation.</p>

									</div>
					<div class="about-histore">
									<h3>Our History</h3>
									<div class="historey-lines">
										<ul>
											<li><span>2010 &nbsp;-</span></li>
											<li><p>Over 25-years experience developing and delivering a wide range of communications test and measurement solutions combined with knowledgeable.</p></li>
											<div class="clear"> </div>
										</ul>
									</div>
									<div class="historey-lines">
										<ul>
											<li><span>2010 &nbsp;-</span></li>
											<li><p>Deviser offers a comprehensive portfolio of communications test and measurement solutions ranging from wireless, fiber optics.</p></li>
											<div class="clear"> </div>
										</ul>
									</div>
									<div class="historey-lines">
										<ul>
											<li><span>2010 &nbsp;-</span></li>
											<li><p>We take pride in delivering leading edge technology and solutions by seeking out ideas and opportunities through our customers to deliver the finest quality.  </p></li>
											<div class="clear"> </div>
										</ul>
									</div>
									<div class="historey-lines">
										<ul>
											<li><span>2010 &nbsp;-</span></li>
											<li><p> Our 150+ engineers are focused on pursuing and gaining knowledge of next generation technologies which results in delivering the latest technologies.</p></li>
											<div class="clear"> </div>
										</ul>
									</div>
									<div class="historey-lines">
										<ul>
											<li><span>2010 &nbsp;-</span></li>
											<li><p>Deviser 247,000 square foot manufacturing facility is ISO 9001 Quality Systems approved. This strict process guarantees that every step is controlled.</p></li>
											<div class="clear"> </div>
										</ul>
									</div>
									<div class="clear"> </div>
								</div>
					<div class="about-services">
									<h3>our services</h3>
									<h4>Quality Manufacturing</h4>
									<p>We have a full EMC laboratory in house and all of our test equipment is calibrated annually.In addition, they are traced back to China National Institute of Metrology Telecommunication Metrology Center of MIIT to comply with the International Standard of Metrology.  </p>
									<ul>
										<li><a href="#">Industry Leading Experience</a></li>
										<li><a href="#">Broad Portfolio of Industry Leading Solutions</a></li>
										<li><a href="#">Innovative Engineering and Leading Edge Technologies</a></li>
										<li><a href="#">Quality Manufacturing</a></li>
										<li><a href="#">Reliability, Service & Support</a></li>
										<li><a href="#">incididunt ut labore et dolore</a></li>
										<div class="clear"> </div>
									</ul>
								</div>
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

