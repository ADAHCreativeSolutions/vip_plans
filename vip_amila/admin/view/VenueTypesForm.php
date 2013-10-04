<?php



?>

 <form action="index.php" method="POST" class="general" enctype="multipart/form-data">
        <input type="hidden" name="module" value="venue" />
        <input type="hidden" name="action" value="types" />
  <input type="hidden" name="venue[venue_id]" value="<?php echo $id; ?>" />
  <div class="tableLike ajaxForms" style="width:100%;border: 7px solid #ECECEC;">
    
    <div class="tableRow head">
      <div class="normCell" style="width:80%">Add Types for Venue</div>
      <div class="normCell" style="width:20%;top: -30px;left:20px; text-align: right;"><img onclick="javascript:closeLightbox();" src="images/close.png" style="width:30px;" /></div>
    </div>
    <?php
    if(sizeof($res) > 0){
      foreach($res as $rowId=>$val){
    ?>
    <div class="tableRow">
      <div class="normCell" style="width:2%">&nbsp;</div>

      <div class="normCell" style="width:10%"><input type="checkbox" name="venue[types][][type_id]"  value="<?php echo $val['type_id']; ?>" checked="checked" /></div>
      <div class="normCell" style="width:80%"><?php echo $val['type']; ?></div>
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