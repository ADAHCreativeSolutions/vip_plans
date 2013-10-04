<script type="text/javascript" src="scripts/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
        //tinymce.init({selector:'#article'});
</script>
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
            <li><a href="index.php?module=article&action=add">Add new</a></li>
            <li><a href="index.php?module=article&action=view">View All</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="normCell" style="width: 80%">
<?php

switch($action){
  case 'add': ?>

<form action="index.php" method="POST" class="general">
  <input type="hidden" name="module" value="article" />
  <input type="hidden" name="action" value="add" />
  <?php
    if($res['article_id'] > 0){ ?>
  <input type="hidden" name="article[article_id]" value="<?php echo $res['article_id']; ?>" />
  <?php
    }
  ?>
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Page
    </div>
    <div class="normCell" style="width:70%">
      <select name="article[page]">
        <option value="home">Home</option>
      </select>
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Title
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="article[article_title]" id="username" placeholder="article title" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Abstract
    </div>
    <div class="normCell" style="width:70%">
      <textarea name="article[abstract]" id="abstract" placeholder="abstract" required></textarea>
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Article
    </div>
    <div class="normCell" style="width:70%">
      <textarea name="article[article]" id="article" placeholder="article" required ></textarea>
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Keywords
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="article[keywords]" id="username" placeholder="keywords" required />
    </div>
  </div>
 
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Status
    </div>
    <div class="normCell" style="width:70%">
      <?php 
      if($res['status'] == 'ACTIVE'){ ?>
      <input type="checkbox" name="article[status]" checked="checked" value="ACTIVE" id="username" required />
      <?php
      }else{ ?>
      <input type="checkbox" name="article[status]" value="ACTIVE" id="username" required />  
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
          <div class="normCell" style="width:30%">Page</div>
          <div class="normCell" style="width:50%">Title</div>
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
          <div class="normCell" style="width:30%"><?php echo $val['page']; ?></div>
          <div class="normCell" style="width:50%"><?php echo $val['article_title']; ?></div>
          <div class="normCell" style="width:10%"><a href="index.php?module=article&action=add&id=<?php echo $val['article_id']; ?>">
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