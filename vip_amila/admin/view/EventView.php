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
            <li><a href="index.php?module=event&action=add">Add new</a></li>
            <li><a href="index.php?module=event&action=view">View All</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="normCell" style="width: 80%">
<?php

switch($action){
  case 'add': ?>

<form action="index.php" method="POST" class="general" enctype="multipart/form-data">
  <input type="hidden" name="module" value="event" />
  <input type="hidden" name="action" value="add" />
   <?php
    if($res['event_id'] > 0){ ?>
  <input type="hidden" name="event[event_id]" value="<?php echo $res['event_id']; ?>" />
  <?php
    }
  ?>
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Event Name
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="event[event_name]" id="username" placeholder="event name" value="<?php echo $res['event_name']; ?>" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Venue
    </div>
    <div class="normCell" style="width:70%">
      <select name="event[venue_id]">
      <?php foreach($venueObj as $key=>$val){ 
        if($res['venue_id'] == $key){?>
        <option value="<?php echo $key; ?>" selected="selected"><?php echo $val; ?></option>
      <?php
        }else{
        ?>
        <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
      <?php 
        }
        } ?>
      </select>
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Description
    </div>
    <div class="normCell" style="width:70%">
      <textarea name="event[description]" placeholder="event description" required><?php echo $res['description']; ?></textarea>
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Event Banner
    </div>
    <div class="normCell" style="width:70%">
      <input type="file" name="event_banner" placeholder="event banner"  />
      <?php
            if(isset($res['event_banner']) && $res['event_banner'] != ''){ ?>
              <img src="../images/events/<?php echo $res['event_banner']; ?>" style="height:150px;" />
            <?php
            }
            
            ?>
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Floor Plan Image
    </div>
    <div class="normCell" style="width:70%">
      <input type="file" name="floor_plan_image" placeholder="floor plan"  />
      <?php
            if(isset($res['floor_plan_image']) && $res['floor_plan_image'] != ''){ ?>
              <img src="../images/events/<?php echo $res['floor_plan_image']; ?>" style="height:150px;" />
            <?php
            }
            
            ?>
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
     Date
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="event[date]" id="username" placeholder="event date (yyyy-mm-dd)" value="<?php echo $res['date']; ?>" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
     Starts
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="event[starts]" id="username" placeholder="start time(hh:mm)" value="<?php echo $res['starts']; ?>" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
     Ends
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="event[end]" id="username" placeholder="end time(hh:mm)" value="<?php echo $res['end']; ?>" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
     Total Heads
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="event[total_heads]" id="username" placeholder="no of heads can accommodate" value="<?php echo $res['total_heads']; ?>" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
     Ticket Price
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="event[ticket_price]" id="username" placeholder="ticket price" value="<?php echo $res['ticket_price']; ?>" required />
    </div>
  </div>
  
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Street Address
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="event[street]" id="username" placeholder="street address" value="<?php echo $res['street']; ?>" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      City
    </div>
    <div class="normCell" style="width:70%">
      <select name="event[city]">
      <?php foreach($listObj as $key=>$val){ 
        if($res['city_id'] == $key){?>
        <option value="<?php echo $key; ?>" selected="selected"><?php echo $val; ?></option>
      <?php
        }else{
        ?>
        <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
      <?php 
        }
        } ?>
      </select>
    </div>
  </div>
  
  
  
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Status
    </div>
    <div class="normCell" style="width:70%">
      <?php 
      if($res['status'] == 'ACTIVE'){ ?>
      <input type="checkbox" name="event[status]" id="username" checked="checked" value="ACTIVE"  />
      <?php }else{ ?>
      <input type="checkbox" name="event[status]" id="username" value="ACTIVE"  />  
      <?php
      } ?>
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
    <div class="tableLike" style="width:100%">
        <div class="tableRow header">
          <div class="normCell" style="width:10%">Id</div>
          <div class="normCell" style="width:40%">Event name</div>
          <div class="normCell" style="width:20%">Date</div>
          <div class="normCell" style="width:10%">From</div>
          <div class="normCell" style="width:10%">To</div>
          <div class="normCell" style="width:10%">&nbsp;</div>
        </div>
        <?php
        if(sizeof($res) > 0){
        $i=1;
        foreach($res as $key=>$val){
          if($i%2 == 1){
          ?>
        <div class="tableRow odd"> 
          <?php
          }else{ ?>
       <div class="tableRow"> 
          <?php
          }
        ?>
          <div class="normCell" style="width:8%"><?php echo $i; ?></div>
          <div class="normCell" style="width:30%"><?php echo $val['event_name']; ?></div>
          <div class="normCell" style="width:20%"><?php echo $val['date']; ?></div>
          <div class="normCell" style="width:12%"><?php echo $val['starts']; ?></div>
          <div class="normCell" style="width:12%"><?php echo $val['end']; ?></div>
          <div class="normCell" style="width:10%"><a href="index.php?module=floor&action=add&id=<?php echo $val['event_id']; ?>">Floor</a></div>
          <div class="normCell" style="width:8%"><a href="index.php?module=event&action=add&id=<?php echo $val['event_id']; ?>">
            <img src="images/edit.png" style="height:25px;" />
            </a></div>
        </div>
        <?php
        ++$i;
        }        
        }
        ?>
      </div>
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
