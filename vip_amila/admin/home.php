<div class="tableRow seperator">
            <div class="normCell" style="width: 100%">
              <div  class="tableLike" style="width:100%;">
                <div class="tableRow">
                  <div class="normCell" style="width:100%">
                    <ul class="breadcrumb">
                    <li><a href="index.php?module=home">Home</a></li>
                    
                    <?php if(isset($crumb['module']) && $crumb['module'] != null){ ?>
                    <li><a href="?module=<?php echo $crumb['module']['link']; ?>&action=index"><?php echo $crumb['module']['name']; ?></a></li>
                    <?php } ?>
                    <?php if(isset($crumb['action']) && $crumb['action'] != null){ ?>
                    <li><a href="?module=<?php echo $crumb['module']['link']; ?>&action=<?php echo $crumb['action']['link']; ?>"><?php echo $crumb['action']['name']; ?></a></li>
                    <?php } ?>
                    <?php if(isset($crumb['task']) && $crumb['task'] != null){ ?>
                    <li><a href="?module=<?php echo $crumb['module']['link']; ?>&action=<?php echo $crumb['action']['link']; ?>&task=<?php echo $crumb['task']['link']; ?>"><?php echo $crumb['task']['name']; ?></a></li>
                    <?php } ?>
                    <?php if(isset($crumb['record']) && $crumb['record'] != null){ ?>
                    <li><a href=""><?php echo $crumb['record']['name']; ?></a></li>
                    <?php } ?>
                    </ul>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
        <div class="tableLike" style="width:100%; top:5px;">
          <div class="tableRow">
            <div class="normCell" style="width: 1%">&nbsp;</div>
            <div class="normCell" style="width: 98%">
<ul class="homeStyle">
<?php
switch($rights){
  case 1: ?>

 <!--<li><p><a href="index.php?module=article">Article</a></p>
      <p><a href="index.php?module=article"><img src="images/article-icon.jpg" style="width:100px;" /></a></p>
  </li>-->
  
  
  <li><p><a href="index.php?module=bottle">Bottle</a></p>
      <p><a href="index.php?module=bottle"><img src="images/test.png" style="width:100px" /></a></p>
  </li>
  
  <li><p><a href="index.php?module=city">City</a></p>
      <p><a href="index.php?module=city"><img src="images/city-icon.jpg" style="width:100px" /></a></p>
  </li>
  <li><p><a href="index.php?module=venue">Venue</a></p>
      <p><a href="index.php?module=venue"><img src="images/test.png" style="width:100px" /></a></p>
  </li>
  <li><p><a href="index.php?module=event">Event</a></p>
      <p><a href="index.php?module=event"><img src="images/event-icon.png" style="width:100px" /></a></p>
  </li>
  <li><p><a href="index.php?module=table">Table</a></p>
      <p><a href="index.php?module=table"><img src="images/test.png" style="width:100px" /></a></p>
  </li>
  <!--<li><p><a href="index.php?module=user">User</a></p>
      <p><a href="index.php?module=user"><img src="images/test.png" style="width:100px" /></a></p>
  </li>
  <li><p><a href="index.php?module=reports">Reports</a></p>
      <p><a href="index.php?module=reports"><img src="images/test.png" style="width:100px" /></a></p>
  </li>
  <li><p><a href="index.php?module=booking">Bookings</a></p>
      <p><a href="index.php?module=booking"><img src="images/test.png" style="width:100px" /></a></p>
  </li>-->

<?php
    break;
  case 2: ?>
<li><a href="index.php?module=venue">Venue</a></li>
<li><a href="index.php?module=event">Event</a></li>
<li><a href="index.php?module=category">Bottle Category</a></li>
<li><a href="index.php?module=bottle">Bottle</a></li>
<li><a href="index.php?module=category">Floor Management</a></li>
<?php
    break;
  default : header('location: login.php');
}
?>
</ul>
              
        