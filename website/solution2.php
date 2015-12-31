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
		<style>
         audio:not([controls]) { display: none; }
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
									<li><a href="#">
									<img class="solutions" src="./images/facebook.png" title="facebook" /></a></li>
									<li><a href="#">
									<img class="solutions" src="./images/twitter.png" title="twitter" /></a></li>
									<li><a href="#">
									<img class="solutions" src="./images/feed.png" title="Rss" /></a></li>
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
								
								<li class="active"><a href="solution.php">Solution</a></li>
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
					<br>
					<div class="services">
						<div class="service-content">




                    <div class="gallery-grids" id="service-two" style="display:block;">
                        <hr class="solution">
                        <div class="gallery-grid"  style="margin:5%;height:200px;">
		          		<div style="width:30%;float:right;">
							<a href=""><img class="solution" src="./images/8684569.png" alt=""></a>
						</div>
						<div style="width:60%;float:left;">
							<strong><font style="font-weight:bold;"size="5">Fiber Optics Solutions</font></strong><br></br>
							<p class = "detail">The rapidly growing need for more data, whether it is at home, in businesses or on mobile devices, has placed increased demands on communication service providers to increase bandwidth by migrating their networks to technologies that run on fiber optic cables.  </p>

						</div>
						</div>
						<hr class="solution">
		          		<div class="gallery-grid"  style="margin-top:4%;margin-bottom:4%;height:180px;">
		          		<div align="center" style="width:30%;float:left;">
							<a href=""><img class="solutions" src="./images/7937337.jpg" alt=""></a>
						</div>
						<div style="width:70%;float:right;">
							<strong><font style="font-weight:bold;"size="3">AE4000 Modular OTDR</font></strong>
							<br></br>
							<p class = "detail">The AE4000 is an OTDR mdule for the FC-1 modular platform. The FC-1 platform is Deviser's newest modular platform with advanced technologies that host a wide-range of test and measurement modules, including fiber optics, Ethernet and Transport technologies. This high-performance OTDR covers a variety of dynamic ranges, satisfying a wide range of testing needs from PON to long-haul networks.</p>
							<p><a class="grid-button" href="#">Read PDF</a></p>
						</div>
						</div>
                        <hr class="solution">
						<div class="gallery-grid"  style="margin-top:4%;margin-bottom:4%;height:180px;">
		          		<div align="center"style="width:30%;float:left;">
							<a href=""><img class="solutions" src="./images/1570336.jpg" alt=""></a>
						</div>
						<div style="width:70%;float:right;">
							<strong><font style="font-weight:bold;"size="3">AE2300 Handheld OTDR</font></strong>
							<br></br>
							<p class = "detail">The AE2300 is a high performance, handheld OTDR, designed for installation and maintencance of fiber optics networks.This lightweight and rugged OTDR includes a VFL, enabling the user to quickly find impairments and location of the faults.</p>
							<p><a class="grid-button" href="#">Read PDF</a></p>
						</div>
						</div>
                         <hr class="solution">
						<div class="gallery-grid" style="margin-top:4%;margin-bottom:4%;height:180px;" >
		          		<div align="center" style="width:30%;float:left;">
							<a href=""><img class="solutions" src="./images/5086603.jpg" alt=""></a>
						</div>
						<div style="width:70%;float:right;">
							<strong><font style="font-weight:bold;"size="3">AE500 Compact CWDM Channel Analyzer</font></strong>
							<br></br>
							<p class = "detail">The AE500 is a compact CWDM channel analyzer for installing and maintaining CWDM networks. This rugged, palm-sized unit is able to simultaneously verify 8 CWDM channels between the wavelengths of 1270s nm and 1610 nm, simplifying and speeding up verification of CWDM power levels.</p>
							<p><a class="grid-button" href="#">Read PDF</a></p>
						</div>
						</div>
						<div class="clear"> </div>
					</div>	







						</div>
						<div class="services-sidebar">
							<h3>SOLUTIONS</h3>
							 <ul>
							  	<li><a href="solution.php">WIRELESS</a></li>
							  	<li><a href="solution2.php">Fiber Optics</a></li>
							  	<li><a href="solution3.php">Broadband</a></li>
							  	<li><a href="solution4.php">ETHERNET</a></li>
					 		 </ul>
					 		 <h3>ARCHIVES</h3>
					 		 <ul>
					 		 	<li><a href="#">JAN, 2013</a></li>
					 		 	<li><a href="#">FEB, 2013</a></li>
					 		 	<li><a href="#">MAR, 2013</a></li>
					 		 	<li><a href="#">APRIL, 2013</a></li>
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
	<script>
     function Functionone() {
    document.getElementById("service-one").style.display = "block";
    document.getElementById("service-two").style.display = "none";
    document.getElementById("service-three").style.display = "none";
    document.getElementById("service-four").style.display = "none";
    }
    function Functiontwo() {
    document.getElementById("service-one").style.display = "none";
    document.getElementById("service-two").style.display = "block";
    document.getElementById("service-three").style.display = "none";
    document.getElementById("service-four").style.display = "none";
    }
     function Functionthree() {
    document.getElementById("service-one").style.display = "none";
    document.getElementById("service-two").style.display = "none";
    document.getElementById("service-three").style.display = "block";
    document.getElementById("service-four").style.display = "none";
    }
     function Functionfour() {
    document.getElementById("service-one").style.display = "none";
    document.getElementById("service-two").style.display = "none";
    document.getElementById("service-three").style.display = "none";
    document.getElementById("service-four").style.display = "block";
    }
</script>
</html>

