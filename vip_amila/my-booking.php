<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Viplans</title>
<link rel="stylesheet" type="text/css" href="css/viplans.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css"/>
<link rel="stylesheet" type="text/css" href="css/viplane-slider.css"/>
<link rel="stylesheet" type="text/css" href="css/feature-carousel.css"/>
<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
<script src="js/modernizr-2.6.1.min.js" type="text/javascript"></script>
<script src="js/viplane-slider.js" type="text/javascript"></script>
<script src="js/jquery.featureCarousel.js" type="text/javascript"></script>
<script>
  $(function() {

  $( "#datepicker" ).datepicker({
			inline: true
		});
});
  </script>
<script type="text/javascript">
    $(document).ready(function() {
        var slider = $('#slider').leanSlider({
            directionNav: '#slider-direction-nav',
            controlNav: '#slider-control-nav'
        });
    });
    </script>
<script type="text/javascript">
      $(document).ready(function() {
        var carousel = $("#carousel").featureCarousel({
          // include options like this:
          // (use quotes only for string values, and no trailing comma after last option)
          // option: value,
          // option: value
        });

        $("#but_prev").click(function () {
          carousel.prev();
        });
        $("#but_pause").click(function () {
          carousel.pause();
        });
        $("#but_start").click(function () {
          carousel.start();
        });
        $("#but_next").click(function () {
          carousel.next();
        });
      });
    </script>
</head>
<body>
<div class="logo"><a href="index.html"><img src="images/logo.png" border="0"/></a></div>
<div class="login">
  <div class="margin">
    <div class="login-txt">USER LOGIN</div>
    <div>
      <input name="" type="text" class="login-txt-box-pass" placeholder="user name"/ />
      <input name="" type="text" class="login-txt-box" placeholder="password"//>
    </div>
  </div>
  <div class="forget-area "><a href="#" class="forget">forget password</a></div>
  <div class="forget-but-area ">
    <button id="button" class="log-button">Login</button>
  </div>
</div>
<div id="container" style="width: 970px; height:38px; margin:0; clear:both">
  <!-- begin navigation -->
  <nav id="navigation">
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="register.html">Register </a></li>
      <li class="slt"><a href="my-booking.html" class="slt">My Booking</a></li>
      <li><a href="about-us.html">About Us</a></li>
      <li><a href="contact-us.html">Contact Us</a></li>
    </ul>
  </nav>
  <!-- end navigation -->
</div>
<div>&nbsp;</div>
<div>
  <!-- begin search -->
  <div id="search">
    <div class="txt">Search by </div>
    <div>
      <input name="" type="text" class="txt-box" placeholder="Venue Name"/>
    </div>
        <div>
      <input name="" type="text" class="txt-box" placeholder="Location"/>
    </div>
    
    <div class="txt">Or</div>
    <div>
      <input type="text" id="datepicker" class="txt-box" placeholder="Date"/>
    </div>
    <div> <a href="search-result.html">
      <button id="button" class="button">Search</button>
      </a> </div>
  </div>
  <!-- end search -->
</div>
<div>&nbsp;</div>
<div class="margin"></div>
<h1>MY BOOKING</h1>
<div>&nbsp;</div>
<div id="SEARCH-RE">
  <div class="mid">
    <div class="left"><img src="images/sm-03.png" width="196" height="135" /></div>
    <div class="right">
      <h2>KARAOKE PARTIES</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sem blandit, scelerisque ligula et, condimentum arcu. Integer nec sem ac nisl tincidunt suscipit. </p>
      <h3>Date: 13/09/2013 Time: 22.30PM</h3>
      <h3>Venue : Lorem ipsum dolor</h3>
      <div>
        <button id="button" class="button" style="float:right">DELETE</button>
      </div>
    </div>
  </div>
</div>
<div class="margin"></div>
<div id="SEARCH-RE">
  <div class="mid">
    <div class="left"><img src="images/sm-01.png" width="196" height="135" /></div>
    <div class="right">
      <h2>NO LIMITS DANCE HOUSE</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut sem blandit, scelerisque ligula et, condimentum arcu. Integer nec sem ac nisl tincidunt suscipit. </p>
      <h3>Date: 13/09/2013 Time: 22.30PM</h3>
      <h3>Venue : Lorem ipsum dolor</h3>
      <div>
        <button id="button" class="button" style="float:right">DELETE</button>
      </div>
    </div>
  </div>
</div>
<div class="margin"></div>
<div>&nbsp;</div>
<div id="newsletter">
  <div class="txt">Enter email for London’s best night out alerts!</div>
  <div>
    <input name="" type="text"  class="news-txt-box "/>
  </div>
  <div>
    <div>
      <button id="button" class="button">Get Alerts!</button>
    </div>
  </div>
  <div>&nbsp;</div>
</div>
<div id="footer">
  <div class="paypal"><img src="images/paypal.png" /></div>
  <div>
    <ul>
      <li><a href="index.html" class="slt">Home</a></li>
      <li class="line">|</li>
      <li><a href="register.html" hrfe="#">Register </a></li>
      <li class="line">|</li>
      <li><a href="my-booking.html">My Booking</a></li>
      <li class="line">|</li>
      <li><a href="about-us.html">About Us</a></li>
      <li class="line">|</li>
      <li><a href="contact-us.html">Contact Us</a></li>
    </ul>
  </div>
  <div style="padding-right:20px;">
    <div class="social"><a href="#"><img src="images/fb-icon.png" border="0" /></a></div>
    <div class="social"><a href="#"><img src="images/tw-icon.png" /></a></div>
    <div class="social"><a href="#"><img src="images/google-icon.png" /></a></div>
    <div class="social"><a href="#"><img src="images/in-icon.png" /></a></div>
  </div>
</div>
</body>
</html>
