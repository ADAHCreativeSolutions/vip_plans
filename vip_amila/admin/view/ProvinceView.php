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
            <li><a href="index.php?module=province&action=add">Add new</a></li>
            <li><a href="index.php?module=province&action=view">View All</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="normCell" style="width: 80%">
<?php

switch($action){
  case 'add': ?>

<form action="index.php" method="POST" class="general">
  <input type="hidden" name="module" value="province" />
  <input type="hidden" name="action" value="add" />
   <?php
    if($res['province_id'] > 0){ ?>
  <input type="hidden" name="province[province_id]" value="<?php echo $res['province_id']; ?>" />
  <?php
    }
  ?>
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Province Name
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="province[province]" id="username" placeholder="province name" value="<?php echo $res['province']; ?>" required />
    </div>
  </div>
  
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Active?
    </div>
    <div class="normCell" style="width:70%">
      <?php 
      if($res['status'] == 'ACTIVE'){ ?>
      <input type="checkbox" name="province[status]" value="ACTIVE" checked="checked" id="username" />
      <?php
      }else{ ?>
      <input type="checkbox" name="province[status]" value="" id="username" />
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
          <div class="normCell" style="width:80%">Category name</div>
          
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
          <div class="normCell" style="width:80%"><?php echo $val['province']; ?></div>
          
          <div class="normCell" style="width:10%"><a href="index.php?module=province&action=add&id=<?php echo $val['province_id']; ?>">
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