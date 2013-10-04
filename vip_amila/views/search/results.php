<h1>SEARCH RESULTS</h1>
<div>&nbsp;</div>
<?php
if(sizeof($venues) > 0){ 
 
  ?>
<!--<h2>Venues</h2>-->
<?php
  foreach($venues as $key=>$data){ 
      if($key%3 == 2){ ?>
    <div id="SEARCH-RESULT-RT">
      <div class="margin">
     <div style="text-align: center"><img src="images/venue/main/<?php echo $data['main_image_path']; ?>" width="196" height="135" class="img-bdr"/></div>
  
    <div>&nbsp;</div>
    <h2><?php echo $data['venue_name']; ?></h2>
    <p><?php echo $data['description']; ?></p>
    <h3>Email: <?php echo $data['email']; ?></h3>
    <h3>Contact No: <?php echo $data['contact_no']; ?></h3>
    <p><?php echo $data['street'] . ', ' . $data['city']; ?></p>
          <div>
            <form name="" action="index.php" method="POST">
              <input id="module" name="module" type="hidden" class="text" value="venue" />
    <input id="task" name="task" type="hidden" class="text" value="single" />
    <input id="task" name="venue_id" type="hidden" class="text" value="<?php echo $data['venue_id']; ?>" />
          <input type="submit" id="button" class="button" style="float:right" name="submit" value="More Info" />
        </form></div>
</div>
    </div>
    <div class="mgn-bot">&nbsp;</div>

<?php
      
    }else{ ?>
    <div id="SEARCH-RESULT">
    <div class="margin">
    <div style="text-align: center"><img src="images/venue/main/<?php echo $data['main_image_path']; ?>" width="196" height="135" class="img-bdr"/></div>
  
    <div>&nbsp;</div>
    <h2><?php echo $data['venue_name']; ?></h2>
    <p><?php echo $data['description']; ?></p>
    <h3>Email: <?php echo $data['email']; ?></h3>
    <h3>Contact No: <?php echo $data['contact_no']; ?></h3>
    <p><?php echo $data['street'] . ', ' . $data['city']; ?></p>
          <div>
       
          <form name="" action="index.php" method="POST">
              <input id="module" name="module" type="hidden" class="text" value="venue" />
    <input id="task" name="task" type="hidden" class="text" value="single" />
    <input id="task" name="venue_id" type="hidden" class="text" value="<?php echo $data['venue_id']; ?>" />
          <input type="submit" id="button" class="button" style="float:right" name="submit" value="More Info" />
        </form></div>
</div>
</div>
<?php
      
    }
    ?>

<?php
  }
}

if(sizeof($events) > 0){?>
<!--<h2>Events</h2>-->
<?php

  foreach($events as $key=>$data){ 
    if($key%3 == 2){ ?>
    <div id="SEARCH-RESULT-RT">
      <div class="margin">
     <div style="text-align: center"><img src="images/events/<?php echo $data['event_banner']; ?>" width="196" height="135" class="img-bdr"/></div>
  
    <div>&nbsp;</div>
    <h2><?php echo $data['event_name']; ?></h2>
    <p><?php echo $data['description']; ?></p>
    <h3>Date: <?php echo $data['date']; ?> Time: <?php echo $data['starts']; ?></h3>
    <h3>Venue: <?php echo $data['venue_name']; ?></h3>
    <p><?php echo $data['street'] . ', ' . $data['city']; ?></p>
          <div>
       <form name="buy-ticket" action="index.php" method="POST">
          <input type="hidden" name="module" value="event" />
          <input type="hidden" name="task" value="buy-a-ticket" />
           <input type="hidden" name="event_id" value="<?php echo $data['event_id']; ?>" />
          <button id="button" class="button" style="float:right">BUY TICKET</button>
        </form></div>
</div>
    </div>
    <div class="mgn-bot">&nbsp;</div>

<?php
      
    }else{ ?>
    <div id="SEARCH-RESULT">
    <div class="margin">
     <div style="text-align: center"><img src="images/events/<?php echo $data['event_banner']; ?>" width="196" height="135" class="img-bdr"/></div>
  
    <div>&nbsp;</div>
    <h2><?php echo $data['event_name']; ?></h2>
    <p><?php echo $data['description']; ?></p>
    <h3>Date: <?php echo $data['date']; ?> Time: <?php echo $data['starts']; ?></h3>
    <h3>Venue: <?php echo $data['venue_name']; ?></h3>
    <p><?php echo $data['street'] . ', ' . $data['city']; ?></p>
          <div>
       <form name="buy-ticket" action="index.php" method="POST">
          <input type="hidden" name="module" value="event" />
          <input type="hidden" name="task" value="buy-a-ticket" />
           <input type="hidden" name="event_id" value="<?php echo $data['event_id']; ?>" />
          <button id="button" class="button" style="float:right">BUY TICKET</button>
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



<div style="clear: both;">&nbsp;</div>

