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
            <li><a href="index.php?module=bottle&action=add">Add Bottle</a></li>
            <li><a href="index.php?module=bottle&action=view">View Bottles</a></li>
            <li><a href="index.php?module=category&action=add">Add Bottle Category</a></li>
            <li><a href="index.php?module=category&action=view">View Categories</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="normCell" style="width: 80%">
<?php

switch($action){
  case 'add': 
    
    ?>

<form action="index.php" method="POST" class="general">
  <input type="hidden" name="module" value="bottle" />
  <input type="hidden" name="action" value="add" />
  <?php
    if($res['bottle_id'] > 0){ ?>
  <input type="hidden" name="bottle[bottle_id]" value="<?php echo $res['bottle_id']; ?>" />
  <?php
    }
  ?>
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Bottle Name
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="bottle[bottle_name]" id="username" placeholder="bottle name" value="<?php echo $res['bottle_name']; ?>" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Category
    </div>
    <div class="normCell" style="width:70%">
      <select name="bottle[category_id]">
      <?php
        foreach($listObj as $key=>$val){ 
          if($res['category_id'] == $key){ ?>
        <option value="<?php echo($key); ?>" selected="selected"><?php echo $val; ?></option>
        <?php            
          }else{?>
        <option value="<?php echo($key); ?>"><?php echo $val; ?></option>
        <?php
            
          }
        ?>
        
      <?php
        }
      ?>
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
      <input type="checkbox" name="bottle[status]" checked="checked" value="ACTIVE" id="username" required />
      <?php
      }else{ ?>
      <input type="checkbox" name="bottle[status]" value="ACTIVE" id="username" required />  
      <?php
      }
      ?>
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
          <div class="normCell" style="width:30%">Bottle name</div>
          <div class="normCell" style="width:50%">Category</div>
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
          <div class="normCell" style="width:30%"><?php echo $val['bottle_name']; ?></div>
          <div class="normCell" style="width:50%"><?php echo $val['category']; ?></div>
          <div class="normCell" style="width:10%"><a href="index.php?module=bottle&action=add&id=<?php echo $val['bottle_id']; ?>">
            <img src="images/edit.png" style="height:25px;" /></a>&nbsp;
          <a href="index.php?module=bottle&action=delete&id=<?php echo $val['bottle_id']; ?>">
            <img src="images/delete.png" style="height:25px;" />
            </a>
          </div>
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