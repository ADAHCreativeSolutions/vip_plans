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
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width: 20%">
       <div class="tasks">
        <div class="tableRow headtask">All Tasks</div>
        <div class="tableRow">
          <ul>
            
            <li><a href="index.php?module=floor&action=view">View All</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="normCell" style="width: 80%">      
<?php

switch($action){
  case 'add': ?>

<form action="index.php" method="POST" class="general">
  <input type="hidden" name="module" value="floor" />
  <input type="hidden" name="action" value="add" />
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width:100%;">
      Floor Image<br />
      <div class="tip">
      Tip: Drag the mouse on area to highlight the section. Click on image to confirm selection.
      </div>
      <img id="target" src="../images/events/<?php echo $res[0]['floor_plan_image']; ?>" style="max-width:650px;" usemap='#floormap' />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Area Tag
    </div>
    <div class="normCell" id="age" style="width:70%">
      <div class="tableRow">
        <div class="normCell" style="width: 35%">Area name</div>
        <div class="normCell" style="width: 30%">No of heads</div>
        <div class="normCell" style="width: 30%">Status</div>
      </div>
      <?php 
      $str = "";
      foreach($res as $key=>$val){ ?>
        <div id="tn<?php echo $key; ?>" class="tableRow tn">
          <input type="hidden" name="floorplan[a][<?php echo $key; ?>][area_id]" id="username" value="<?php echo($val['area_id']);?>" />
          <input type="text" name="floorplan[a][<?php echo $key; ?>][area_name]" id="username" placeholder="area name" value="<?php echo($val['area_name']);?>" required />
          <input name="floorplan[a][<?php echo $key; ?>][area_coord_x]" id="x" value="<?php echo($val['area_coord_x']);?>" type="hidden" required />
          <input name="floorplan[a][<?php echo $key; ?>][area_coord_x2]" id="x2" value="<?php echo($val['area_coord_x2']);?>" type="hidden" required />
          <input name="floorplan[a][<?php echo $key; ?>][area_coord_y]" id="y" value="<?php echo($val['area_coord_y']);?>" type="hidden" required />
          <input name="floorplan[a][<?php echo $key; ?>][area_coord_y2]" id="y2" value="<?php echo($val['area_coord_y2']);?>" type="hidden" required />
          <input type="text" name="floorplan[a][<?php echo $key; ?>][max_heads]" id="username" placeholder="max no of heads" value="<?php echo($val['max_heads']);?>" required />
          <input type="checkbox" name="floorplan[a][<?php echo $key; ?>][status]" id="username" checked="checked" value="ACTIVE"  />
        </div>
    <?php   
        $str .= '<area id="' . $val['area_id'] . '" shape="rect" coords="' . $val['area_coord_x'] . ',' . $val['area_coord_y'] . ',' . $val['area_coord_x2'] . ',' . $val['area_coord_y2'] . '"  />'; 
      }
      
      ?>
      <map name="floormap">
      <?php echo $str; ?>
      </map>
      <input type="hidden" name="floorplan[event_id]" id="username" value="<?php echo($res[0]['event_id']);?>" />
    </div>
  </div>
  
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
      
<?php
    break;
  case 'view': ?>
    
<?php
    break;
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
</div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function($){

  $('#target').Jcrop({
   // onChange:   showCoords,
    onSelect:   showCoords   
  });
  
  

});

function testMe(){
 if($('#floormap')) { 
        $('#floormap area').each(function() {
            var id = $(this).attr('id');
            $(this).mouseover(function() {
                $('#overlay'+id).show();
                alert(id);
            });

            $(this).mouseout(function() {
                var id = $(this).attr('id');
                $('#overlay'+id).hide();
                alert(id);
            });

        });
    } 
}

// Simple event handler, called from onChange and onSelect
// event handlers, as per the Jcrop invocation above
function showCoords(c)
{
  testMe();

  var x = c.x; var x2= c.x2; var y= c.y; var y2=c.y2;
  var numItems = $('.tn').length;
  if(numItems == 'undefined'){
    numItems =0;
  }
  $('#age').append('<div id="tn' + numItems + '" class="tableRow tn">');
  $('#tn' + numItems + '').append('<input type="text" name="floorplan[a][' + numItems + '][area_name]" id="username" placeholder="area name" required />')
  .append('<input type="hidden" name="floorplan[a][' + numItems + '][area_id]" id="username" value="0" />')
  .append('<input name="floorplan[a][' + numItems + '][area_coord_x]" id="x" value="' + x + '" type="hidden" required />')
  .append('<input name="floorplan[a][' + numItems + '][area_coord_x2]" id="x2" value="' + x2 + '" type="hidden" required />')
  .append('<input name="floorplan[a][' + numItems + '][area_coord_y]" id="y" value="' + y + '" type="hidden" required />')
  .append('<input name="floorplan[a][' + numItems + '][area_coord_y2]" id="y2" value="' + y2 + '" type="hidden" required />')
  .append('<input type="text" name="floorplan[a][' + numItems + '][max_heads]" id="username" placeholder="max no of heads" value="" required />')
  .append('<input type="checkbox" name="floorplan[a][' + numItems + '][status]" id="username" checked="checked" value="ACTIVE"  />');
  $('#age').append('</div>');
};

</script>