<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<h1>MY ACCOUNT</h1>
<div>&nbsp;</div>
<div id="BUY">
  <div style="clear:both">
<div id="TabbedPanels1" class="profilePanels">
          <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0">My Profile</li>
        <li class="TabbedPanelsTab" tabindex="0">My Bookings</li>
         <li class="TabbedPanelsTab" tabindex="0">Change Password</li>
      </ul>
          <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
              <h2>Profile </h2>
              <div id="registration" style="border:none;">
  <form id="RegisterUserForm" action="index.php" method="post">
    <input id="module" name="module" type="hidden" class="text" value="member" />
    <input id="task" name="task" type="hidden" class="text" value="register" />
    <input id="member_id" name="member[member_id]" type="hidden" class="text" value="<?php echo $memberDetails['member_id'];?>" />
    <fieldset>
      <?php 
      if(isset($_SESSION['user']['error'])){?>
      <p style="color: chartreuse;">
        <?php echo $_SESSION['user']['error']; ?>
      </p>
      <?php
        unset($_SESSION['user']['error']);
      }
      ?>
      <p class="txt">Name</p>
      <p class="bx"><input id="name" name="member[member_name]" type="text" class="text" value="<?php echo $memberDetails['member_name'];?>" required />
      </p>
      <div class="mgn-bot"></div>
      <p class="txt">Phone Number</p>
      <p class="bx"><input id="tel" name="member[member_phone]" type="tel" class="text" value="<?php echo $memberDetails['member_phone'];?>" required />
      </p>
      <div class="mgn-bot"></div>
      <p class="txt">Email</p>
      <p class="bx"><input id="email" name="member[member_email]" type="email" class="text" value="<?php echo $memberDetails['member_email'];?>" required />
      </p>
     
      
      <div class="mgn-bot"></div>
      <p class="but-mgn">
        <button id="button" class="reg-button">Save</button>
      </p>
      <p class="but-mgn">
        <button id="reset" class="reg-button">Reset</button>
      </p>

      
    </fieldset>
  </form></div></div>
        <div class="TabbedPanelsContent">
          <h2>My Bookings </h2>
          <div class="tableLike" style="width: 100%">
            <div class="tableRow">&nbsp;</div>
            <div class="tableRow headoftable" >
              <div class="normCell" style="width:10%;">No</div>
              <div class="normCell" style="width:15%;">Date</div>
              <div class="normCell" style="width:15%;">Amount</div>
              <div class="normCell" style="width:25%;">Venue</div>
              <div class="normCell" style="width:15%;">Order No</div>
              <div class="normCell" style="width:10%;">Status</div>
              <div class="normCell" style="width:10%;">More Info</div>
            </div>
          </div>




           </div>
            <div class="TabbedPanelsContent">
              <h2>Change Password</h2>
              <div id="registration" style="border:none;">
               <form id="RegisterUserForm" action="index.php" method="post">
    <input id="module" name="module" type="hidden" class="text" value="member" />
    <input id="task" name="task" type="hidden" class="text" value="register" />
    <input id="member_id" name="member[member_id]" type="hidden" class="text" value="<?php echo $memberDetails['member_id'];?>" />
    <fieldset>
      <p class="txt">Old Password</p>
      <p class="bx"><input id="password" name="member[member_password]" class="text" type="password" required />
      </p>
      <div class="mgn-bot"></div>
      <p class="txt">New Password</p>
      <p class="bx"><input id="password" name="member[member_password]" class="text" type="password" required />
      </p>
      <div class="mgn-bot"></div>
      <p class="txt">Re-type new password</p>
      <p class="bx"><input id="password" name="password" class="text" type="password" required />
      </p>
      <div class="mgn-bot"></div>
      <p class="but-mgn">
        <button id="button" class="reg-button">Save</button>
      </p>
      <p class="but-mgn">
        <button id="reset" class="reg-button">Reset</button>
      </p>
    </fieldset>
               </form>
              </div>
            </div>
          </div>
    </div>
  </div>
  </div>
      <div class="margin"></div>
      <div class="margin"></div>
      <div class="margin"></div>
      <div class="margin"></div>
      <div>&nbsp;</div>
    </div>
<div id="newsletter">
      <div class="txt">Enter email for Londonâ€™s best night out alerts!</div>
      <div>
    <input name="" type="text"  class="news-txt-box "/>
  </div>
      <div>
    <div>
          <button id="button" class="button">Get Alerts!</button>
        </div>
  </div>
      <div>&nbsp;</div>
    </div>
<div class="mgn-bot"></div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
