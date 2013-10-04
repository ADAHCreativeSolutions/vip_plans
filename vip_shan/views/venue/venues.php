<div class="h1wrap">
<h1 class="special">VENUES</h1>
</div>

<div>&nbsp;</div>
<?php

if(sizeof($allVenues) > 0){
  foreach($allVenues as $key=>$data){ 
    
 
    if($key%3 == 2){ ?>
    <div id="SEARCH-RESULT-RT">
      <div class="margin">
    <div><img src="images/venue/main/<?php echo $data['main_image_path']; ?>" width="196" height="135" class="img-bdr"/></div>
  
    <div>&nbsp;</div>
    <h2><?php echo $data['venue_name']; ?></h2>
    <p><?php echo $data['description']; ?></p>
    <h3>Email: <?php echo $data['email']; ?></h3>
    <h3>Contact No: <?php echo $data['contact_no']; ?></h3>
    <p><?php echo $data['street'] . ', ' . $data['city']; ?></p>
          <div>
       
          <button id="button" class="button" style="float:right">More Info</button>
        </form></div>
</div>
    </div>
    <div class="mgn-bot">&nbsp;</div>

<?php
      
    }else{ ?>
    <div id="SEARCH-RESULT">
    <div class="margin">
    <div><img src="images/venue/main/<?php echo $data['main_image_path']; ?>" width="196" height="135" class="img-bdr"/></div>
  
    <div>&nbsp;</div>
    <h2><?php echo $data['venue_name']; ?></h2>
    <p><?php echo $data['description']; ?></p>
    <h3>Email: <?php echo $data['email']; ?></h3>
    <h3>Contact No: <?php echo $data['contact_no']; ?></h3>
    <p><?php echo $data['street'] . ', ' . $data['city']; ?></p>
          <div>
       
          <button id="button" class="button" style="float:right">More Info</button>
        </form></div>
</div>
</div>
<?php
      
    }
    ?>
<?php
  }
}
?>