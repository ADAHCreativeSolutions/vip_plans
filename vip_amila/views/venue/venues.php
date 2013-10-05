<div class="h1wrap">
<h1 class="special">VENUES</h1>
</div>

<div>&nbsp;</div>
<?php

if(sizeof($allVenues) > 0){
  foreach($allVenues as $key=>$data){ 
    
 
    if($key%3 == 2){ ?>
    <div id="SEARCH-RESULT-RT">


  

        <div class="venue-text">
            <img src="images/venue/main/<?php echo $data['main_image_path']; ?>" class="img-bdr"/>
    <h1><?php echo $data['venue_name']; ?></h1>

    <p><?php echo $data['description']; ?></p>
    <table cellspacing="0" cellpadding="0">
        <tr>
 <td><img src="images/callicon.png" alt="" /></td>
 <td><?php echo $data['contact_no']; ?></td>
        </tr>

         <tr>
     <td><img src="images/msgicon.png" alt="" /></td>
 <td><?php echo $data['email']; ?></td>
        </tr>

          <tr>
     <td><img src="images/locationicon.png" alt="" /></td>
     <td><?php echo $data['street'] . ', ' . $data['city']; ?></td>
        </tr>
    </table>
     <button id="button" class="button" >More Info</button>
    </div>





    </div>
    <div class="mgn-bot">&nbsp;</div>

<?php
      
    }else{ ?>
    <div id="SEARCH-RESULT">


  
    <div class="venue-text">
            <img src="images/venue/main/<?php echo $data['main_image_path']; ?>" class="img-bdr"/>
    <h1><?php echo $data['venue_name']; ?></h1>

    <p><?php echo $data['description']; ?></p>
    <table cellspacing="0" cellpadding="0">
        <tr>
 <td><img src="images/callicon.png" alt="" /></td>
 <td><?php echo $data['contact_no']; ?></td>
        </tr>

         <tr>
     <td><img src="images/msgicon.png" alt="" /></td>
 <td><?php echo $data['email']; ?></td>
        </tr>

          <tr>
     <td><img src="images/locationicon.png" alt="" /></td>
     <td><?php echo $data['street'] . ', ' . $data['city']; ?></td>
        </tr>
    </table>
            <button id="button" class="button">More Info</button> 
    </div>




</div>

<?php
      
    }
    ?>
<?php
  }
}
?>
<div class="clear"></div>