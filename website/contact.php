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
		<script>
		var myCenter=new google.maps.LatLng(37.3962069,-121.9140489);
function initialize() {
  var mapProp = {
    center:myCenter,
    zoom:16,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  var marker=new google.maps.Marker({
  position:myCenter,
  });
  marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
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
				<div class="wrap">
					
					<div class="contact">
						<div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
			    	 	<h3>Find Us Here</h3>
			    	 		<div id="googleMap" style="width:100%;height:350px;"></div>
      				</div>
      			<div align="center"class="company_address">
				     	<h3>Address :</h3>
						<p>780 Montague Expressway Suite 606,</p>
						<p>San Jose, CA 95131, USA</p>
				   		<p>Phone: +1(408) 955-0938</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@deviserinstruments.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
					    <form>
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input class="information"type="text" value=""></span>
						    </div>

						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input class="information"type="text" value=""></span>
						    </div>
						     <div>
						    	<span><label>Address</label></span>
						    	<span><input class="information"type="text" value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input class="information"type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea style="height:100px;resize:none;"class="information"> </textarea></span>
						    </div>
						   <div class="slider-info">
						   		<input type="submit" value="Submit">
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
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

