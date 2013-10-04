<?php

$datesArray = array('1'=>'Sunday',
                    '2'=>'Monday',
                    '3'=>'Tuesday',
                    '4'=>'Wednesday',
                    '5'=>'Thursday',
                    '6'=>'Friday',
                    '7'=>'Saturday',
    )

?>

 <form action="index.php" method="POST" class="general" enctype="multipart/form-data">
        <input type="hidden" name="module" value="venue" />
        <input type="hidden" name="action" value="times" />
  <input type="hidden" name="venue[venue_id]" value="<?php echo $id; ?>" />
  <div class="tableLike ajaxForms" style="width:100%;border: 7px solid #ECECEC;">
    
    <div class="tableRow head">
      <div class="normCell" style="width:80%">Add Venue Open Hours</div>
      <div class="normCell" style="width:20%;top: -30px;left:20px; text-align: right;"><img onclick="javascript:closeLightbox();" src="images/close.png" style="width:30px;" /></div>
    </div>
    <div class="tableRow">
      <div class="normCell" style="width:2%">&nbsp;</div>

      <div class="normCell" style="width:20%">&nbsp;</div>
      <div class="normCell" style="width:30%">Starts</div>
      <div class="normCell" style="width:2%">&nbsp;</div>
      <div class="normCell" style="width:30%">End</div>
      <div class="normCell" style="width:2%">&nbsp;</div>
    </div>
    <?php
    if(sizeof($datesArray) > 0){
      foreach($datesArray as $key=>$day){
    ?>
    <div class="tableRow">
      <div class="normCell" style="width:2%">&nbsp;</div>
      <div class="normCell" style="width:20%"><?php echo $day; ?></div>
      <div class="normCell" style="width:30%"><input type="text" name="venue[times][<?php echo $key ?>][start_time]"  value=""  /></div>
      <div class="normCell" style="width:2%">&nbsp;</div>
      <div class="normCell" style="width:30%"><input type="text" name="venue[times][<?php echo $key ?>][end_time]"  value=""  /></div>
      <div class="normCell" style="width:2%">&nbsp;</div>
    </div>
    <?php
      }
    }
    ?>
    <div class="tableRow">
      <div class="normCell" style="width:100%">&nbsp;</div>
    </div>
    <div class="tableRow">
      <div class="normCell" style="width:30%">
        &nbsp;
      </div>
      <div class="normCell" style="width:70%">
        <input type="submit" name="submit" value="Save" />
      </div>
    </div>
  </div>
</form>