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
            <li><a href="index.php?module=venue&action=add">Add Venue</a></li>
            <li><a href="index.php?module=venue&action=view">View Venues</a></li>
            <?php
            if($action == 'add' && $res['venue_id'] > 0){ ?>
            <li><a href="javascript:lightbox(null,'<?php echo(ENV_BASE); ?>admin/ajax.php?module=outer&action=bottles&id=<?php echo $res['venue_id']; ?>');">Add Bottles</a></li>
            <li><a href="javascript:lightbox(null,'<?php echo(ENV_BASE); ?>admin/ajax.php?module=outer&action=types&id=<?php echo $res['venue_id']; ?>');">Assign Types</a></li>
            <li><a href="javascript:lightbox(null,'<?php echo(ENV_BASE); ?>admin/view/VenueBottlesForm.php?id=10');">Setup Calendar</a></li>
            <li><a href="javascript:lightbox(null,'<?php echo(ENV_BASE); ?>admin/ajax.php?module=outer&action=hours&id=<?php echo $res['venue_id']; ?>');">Setup Open Hours</a></li>
            <?php
            }
            ?>
            <li><a href="index.php?module=type&action=add">Add Venue Types</a></li>
            <li><a href="index.php?module=type&action=view">View Venue Types</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="normCell" style="width: 80%">
<?php

switch($action){
  case 'add': ?>

      <form action="index.php" method="POST" class="general" enctype="multipart/form-data">
        <input type="hidden" name="module" value="venue" />
        <input type="hidden" name="action" value="add" />
        <?php
          if($res['venue_id'] > 0){ ?>
        <input type="hidden" name="venue[venue_id]" value="<?php echo $res['venue_id']; ?>" />
        <?php
          }
        ?>
      <div class="tableLike" style="width:100%">
        <div class="tableRow">
          <div class="normCell" style="width:30%">
            Venue Name
          </div>
          <div class="normCell" style="width:70%">
            <input type="text" name="venue[venue_name]" id="username" placeholder="venue name" value="<?php echo $res['venue_name']; ?>" required />
          </div>
        </div>
        <div class="tableRow">
          <div class="normCell" style="width:30%">
            Description
          </div>
          <div class="normCell" style="width:70%">
            <textarea name="venue[description]" placeholder="venue description" required><?php echo $res['description']; ?></textarea>
          </div>
        </div>
        <div class="tableRow">
          <div class="normCell" style="width:30%">
            Display image
          </div>
          <div class="normCell" style="width:70%">
            <input type="file" name="main_image_path" placeholder="venue image" />
            <?php
            if(isset($res['main_image_path']) && $res['main_image_path'] != ''){ ?>
              <img src="../images/venue/main/<?php echo $res['main_image_path']; ?>" style="height:150px;" />
            <?php
            }
            
            ?>
          </div>
        </div>
        <div class="tableRow">
          <div class="normCell" style="width:30%">
            Street Address
          </div>
          <div class="normCell" style="width:70%">
            <input type="text" name="venue[street]" id="username" placeholder="street address" value="<?php echo($res['street']); ?>" required />
          </div>
        </div>
        <div class="tableRow">
          <div class="normCell" style="width:30%">
            City
          </div>
          <div class="normCell" style="width:70%">
            <select name="venue[city]">
            <?php foreach($listObj as $key=>$val){ 
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
            Email
          </div>
          <div class="normCell" style="width:70%">
            <input type="email" name="venue[email]" id="username" placeholder="email" value="<?php echo($res['email']); ?>" required />
          </div>
        </div>
        <div class="tableRow">
          <div class="normCell" style="width:30%">
           Contact No
          </div>
          <div class="normCell" style="width:70%">
            <input type="text" name="venue[contact_no]" id="username" placeholder="contact no" value="<?php echo($res['contact_no']); ?>" required />
          </div>
        </div>
        <div class="tableRow">
          <div class="normCell" style="width:30%">
           Fax
          </div>
          <div class="normCell" style="width:70%">
            <input type="text" name="venue[fax]" id="username" placeholder="fax" value="<?php echo($res['fax']); ?>" required />
          </div>
        </div>

        <div class="tableRow">
          <div class="normCell" style="width:30%">
            Status
          </div>
          <div class="normCell" style="width:70%">
             <?php 
              if($res['status'] == 'ACTIVE'){ ?>
              <input type="checkbox" name="venue[status]" id="username" checked="checked" value="ACTIVE"  />
              <?php }else{ ?>
              <input type="checkbox" name="venue[status]" id="username" value="ACTIVE"  />  
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
          <div class="normCell" style="width:40%">Venue name</div>
          <div class="normCell" style="width:25%">Email</div>
          <div class="normCell" style="width:15%">Contact</div>
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
          <div class="normCell" style="width:10%"><?php echo $i; ?></div>
          <div class="normCell" style="width:40%"><?php echo $val['venue_name']; ?></div>
          <div class="normCell" style="width:25%"><?php echo $val['email']; ?></div>
          <div class="normCell" style="width:15%"><?php echo $val['fax']; ?></div>
          
          <div class="normCell" style="width:10%"><a href="index.php?module=venue&action=add&id=<?php echo $val['venue_id']; ?>">
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
