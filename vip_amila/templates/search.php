<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css"/>
<script src="js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $( "#datepicker" ).datepicker({
               inline: true,
               dateFormat: 'yy-mm-dd'
             });
    });
</script>
<div>&nbsp;</div>
<div>
   <!-- end navigation -->
</div>
<div>&nbsp;</div>
<div>
  <!-- begin search -->
  <div id="search" style="z-index: 5000">
  <form name="search" action="index.php" method="POST">
    <input type="hidden" name="module" value="search" />
    <input type="hidden" name="task" value="search" />
    <div class="txt">Search by </div>
    <div>
      <input name="search[venue_name]" type="text" class="txt-box" placeholder="Venue Name"/>
    </div>
        <div>
      <select name="search[city_name]" class="pick">
        <option value="0">Pick a City</option>
        <?php 
          $cityObj = new \vip\model\City();
          $allCities = $cityObj->view();
          if(sizeof($allCities) > 0){
            foreach($allCities as $key=>$val){ ?>
        <option value="<?php echo($val['city_id']); ?>"><?php echo($val['city']); ?></option>
        <?php
            }
          }
        ?>
      </select>
    </div>
    
    <div class="txt">Or</div>
    <div>
      <input name="search[date]" type="text" id="datepicker" style="z-index: 5000" class="txt-box" placeholder="Date"/>
    </div>
    <div> 
      <button id="button" class="button">Search</button>
      </div>
  </form>
  </div>
  <!-- end search -->
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
 