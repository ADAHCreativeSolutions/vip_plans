
<link rel="stylesheet" type="text/css" href="css/viplane-slider.css"/>


<script src="js/modernizr-2.6.1.min.js" type="text/javascript"></script>
<script src="js/viplane-slider.js" type="text/javascript"></script>

<link rel="stylesheet" href="css/imageflow.packed.css" type="text/css" />
<script type="text/javascript" src="js/imageflow.packed.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var slider = $('#slider').leanSlider({
            directionNav: '#slider-direction-nav',
            controlNav: '#slider-control-nav'
        });        
    });
    </script>

<div class="banner">
  <div class="slider-wrapper">
    <div id="slider">
      <div class="slide1"> <img src="images/banner-01.png" alt="" /> </div>
      <div class="slide2"> <img src="images/banner-02.png" alt="" /> </div>
      <div class="slide3"> <img src="images/banner-03.png" alt="" /> </div>
      <div class="slide4"> <img src="images/banner-04.png" alt="" /> </div>
    </div>
    <div id="slider-direction-nav"></div>
    <div id="slider-control-nav"></div>
  </div>
</div>

<?php
include 'templates/search.php';
?>

<h1 class="center">TOP EVENTS</h1>

<div id="myImageFlow" class="imageflow" style="top: -60px;">
  <img src="images/01.jpg" alt="img 1" width="400" height="300"  /> 
  <img src="images/02.jpg" alt="img 2" width="400" height="300"  />
  <img src="images/03.jpg" alt="img 3" width="400" height="300"  />
  <img src="images/04.jpg" alt="img 4" width="400" height="300"  /> 
  <img src="images/05.jpg" alt="img 5" width="400" height="300"  /> 
  <img src="images/06.jpg" alt="img 6" width="400" height="300"  /> 
</div>

<div id="newsletter">
  <div class="txt">Enter email for London&#39;s best night out alerts!</div>
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

