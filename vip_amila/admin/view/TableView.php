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
  <input type="hidden" name="module" value="table" />
  <input type="hidden" name="action" value="add" />
   <?php
    if($res['table_id'] > 0){ ?>
  <input type="hidden" name="table[event_id]" value="<?php echo $res['event_id']; ?>" />
  <?php
    }
  ?>
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Max No of Heads
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="max_no_of_heads" id="username" placeholder="max no of heads" value="<?php echo $res['event_name']; ?>" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      No of Tables
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="no_of_tables" id="no_of_tables" placeholder="no of tables" value="<?php echo $res['event_name']; ?>" required />

    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Table Names (separate by commas if not sequence - eg: 15,23,32 / if sequence use dash to show the range - eg: 15-23)
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="table_names" id="table_names" placeholder="no of tables" value="<?php echo $res['event_name']; ?>" required />

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
          <div class="normCell" style="width:40%">Table Name</div>
          <div class="normCell" style="width:20%">Max No of Heads</div>
          <div class="normCell" style="width:10%">Status</div>
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
          <div class="normCell" style="width:10%"><?php echo $i; ?></div>
          <div class="normCell" style="width:40%"><?php echo $val['table_no']; ?></div>
          <div class="normCell" style="width:20%"><?php echo $val['max_no_of_heads']; ?></div>
          <div class="normCell" style="width:10%"><?php echo $val['status']; ?></div>
          <div class="normCell" style="width:10%"><a href="index.php?module=event&action=add&id=<?php //echo $val['event_id']; ?>">
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
