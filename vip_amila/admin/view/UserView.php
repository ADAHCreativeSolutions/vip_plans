<?php

switch($action){
  case 'add': ?>
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width: 30%">&nbsp;</div>
    <div class="normCell" style="width: 70%">
<form action="index.php" method="POST" class="general">
  <input type="hidden" name="module" value="user" />
  <input type="hidden" name="action" value="add" />
<div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Username
    </div>
    <div class="normCell" style="width:70%">
      <input type="text" name="user[username]" id="username" placeholder="username" value="" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Password
    </div>
    <div class="normCell" style="width:70%">
      <input type="password" name="user[password]" id="username" placeholder="password" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Email
    </div>
    <div class="normCell" style="width:70%">
      <input type="email" name="user[email]" id="username" placeholder="email" required />
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      User Role
    </div>
    <div class="normCell" style="width:70%">
      <select name="user[user_role_id">
      <?php
        foreach($listObj as $key=>$val){ ?>
        <option value="<?php echo($key); ?>"><?php echo $val; ?></option>
      <?php
        }
      ?>
      </select>
      
    </div>
  </div>
  <div class="tableRow">
    <div class="normCell" style="width:30%">
      Active?
    </div>
    <div class="normCell" style="width:70%">
      <input type="checkbox" name="user[status]" value="ACTIVE" checked="checked" id="username" />
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
      </div>
  </div>
</div>
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
          
          <div class="normCell" style="width:10%"><a href="index.php?module=province&action=add&id=<?php echo $val['province_id']; ?>">Edit</a></div>
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
