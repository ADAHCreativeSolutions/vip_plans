
<div class="logo"><a href="index.php"><img src="images/logo.png"/></a></div>
<?php 
if(isset($_SESSION['user']['login']) && is_array($_SESSION['user']['login'])){ ?>
<div class="login" style="border: none;text-align: right;">
  <ul class="after-login">
    
    <li><a href="">Welcome <?php echo $_SESSION['user']['login']['member_name']; ?></a> |<li>
    <li><a href="index.php?module=member&task=my-account">My Account</a> |</li>
    <li><a href="index.php?module=member&task=logout">Logout</a></li>
  </ul>
</div>
<?php
}else{ ?>
<div class="login">
  <form id="RegisterUserForm" action="index.php" method="post">
    <input id="module" name="module" type="hidden" class="text" value="member" />
    <input id="task" name="task" type="hidden" class="text" value="login" />

    <div class="login-txt">USER LOGIN</div>

    <input type="password" name="member[member_password]" id="textfield" class="login-txt-box-pass" placeholder="Password"/>
    <input type="email" name="member[member_email]" id="textfield" class="login-txt-box " placeholder="Username"/>


 <a href="index.php?module=member&task=forgot-password" class="forget">Forgot Password?</a>

  

    <button id="button" class="log-button">Login</button>

  </form>
</div>
<?php } ?>
<div id="container" style="width: 970px; height:40px; margin:0; clear:both">
  <!-- begin navigation -->
  <nav id="navigation">
    <ul>
      <?php 
      $module = '';
      if(isset($_REQUEST['module'])){
        $module = $_REQUEST['module'];
      }
      
      if(isset($_REQUEST['task'])){
        $task = $_REQUEST['task'];
      }
      ?>
      <li<?php if($module == 'home' || $module == ''){ ?> class="slt"<?php } ?>><a href="index.php"<?php if($module == 'home' || $module == ''){ ?> class="slt"<?php } ?>>Home</a></li>
      <li<?php if($module == 'venue'){ ?> class="slt"<?php } ?>><a href="index.php?module=venue">Venues&nbsp;</a></li>
 <li<?php if($module == 'about-us'){ ?> class="slt"<?php } ?>><a href="index.php?module=about-us">About Us</a></li>
      <li<?php if($module == 'member' && $task == 'register'){ ?> class="slt"<?php } ?>><a href="index.php?module=member&task=register">Register </a></li>


      <li<?php if($module == 'blog'){ ?> class="slt"<?php } ?>><a href="index.php?module=blog">Blog</a></li>
             <li<?php if($module == 'faq'){ ?> class="slt"<?php } ?>><a href="index.php?module=faq">FAQs</a></li>
      <li<?php if($module == 'contact-us'){ ?> class="slt"<?php } ?>><a href="index.php?module=contact-us">Contact Us&nbsp;</a></li>
    </ul>
  </nav>
  <!-- end navigation -->

</div>
       <p>&nbsp;</p>  
