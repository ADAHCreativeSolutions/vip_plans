<?php
//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';
//exit;
include 'bootstrap.php';
$user = 'Admin';
$rights = 0;
if(isset($_SESSION['user'])){
  if(isset($_SESSION['user']['login']['user_role_id'])){
    $rights = $_SESSION['user']['login']['user_role_id'];
  }
}
define('ENV_BASE','http://viplans.com/');
?>
<html>
<head>
  <title>VIPLANS</title>
  <link rel="stylesheet" type="text/css" href="css/vip-styles.css" />
  <script type="text/javascript" language="javascript" src="scripts/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="scripts/jquery.jcrop.js"></script>
  <script type="text/javascript" language="javascript" src="scripts/lightbox.js"></script>
</head>
<body>
   <div id="page_container" align="center">
      <div id="page_main_wrapper" align="center" style="background: #FFFFFF">
        <div class="tableLike" style="width: 100%">
          <div class="tableRow">
            <div class="normCell" style="width:40%;text-align:left;">
              <a href="index.php?module=home"><img src="images/viplan-logo.png" style="height:100px;padding: 5px 5px;" /></a></div>
            <div class="normCell" style="width:59%; text-align: right;">
              <div class="tableLike" style="width: 100%">
                <div class="tableRow">
                  <div class="normCell salute" style="width:80%; text-align: right;">
                    <?php if($user != null){ ?>
                    Hi! <?php echo $user; ?> <span style="color: #333333"> | </span>
                    <a href="?module=login&action=Logout">Logout</a>
                    <?php } ?>
                  </div>
                  <div class="normCell" id="clock" style="width:20%;text-align:right;top: 2px;">
                    <ul id="digital-clock" class="digital">
                      <li class="hour"></li>
                      <li class="min"></li>
                      <li class="sec"></li>
                      <li class="meridiem"></li>
                    </ul>
                  </div>
                </div>
                <div class="tableRow">&nbsp;</div>
                <div class="tableRow">
                  <div class="normCell webadmin" style="width: 80%;text-align:left;">Web Administration area</div>
                  <div class="normCell" style="width: 20%;text-align: right;">
                    <img src="images/help-icon.png" style="width: 40px;" title="help" alt="help" />
                  </div>
                </div>
              </div>
              
            </div>
            
            <div class="normCell" style="width:1%">&nbsp;</div>

          </div>
          
      
<?php
$module = '';
if(isset($_REQUEST['module'])){
  $module = $_REQUEST['module'];
}
switch($module){
  case 'user': $newObj = new \admin\controller\UserController();
    break;
  case 'city': $newObj = new \admin\controller\CityController();
    break;
  case 'venue': $newObj = new \admin\controller\VenueController();
    break;
  case 'province': $newObj = new \admin\controller\ProvinceController();
    break;
  case 'floor': $newObj = new \admin\controller\FloorController();
    break;
  case 'event': $newObj = new \admin\controller\EventController();
    break;
  case 'category': $newObj = new \admin\controller\CategoryController();
    break;
  case 'bottle': $newObj = new \admin\controller\BottleController();
    break;
  case 'article': $newObj = new \admin\controller\ArticleController();
    break;
  case 'type': $newObj = new admin\controller\TypeController();
    break;
  case 'table': $newObj = new admin\controller\TableController();
    break;
  case 'login': header('location: login.php');
    break;
  case 'home': include('home.php');
    break;
  default: header('location: login.php');
    break;
}

//$userObj = new admin\model\User();

//echo '<pre>';
//print_r($userObj->entityGenerator());

?>
      </div>
        <div class="normCell" style="width: 1%">&nbsp;</div>
      </div>
    </div>
    <div class="tableLike" style="width:100%">
      <div class="tableRow seperator">
        <div class="normCell" style="width: 100%">&nbsp;</div>
      </div>
      <div class="tableRow" style="background: #f6f6f6">
        <div class="normCell" style="width: 100%">
          &copy; <?php echo date('Y'); ?> viplans.com. All rights reserved.
        </div>
      </div>
    </div>

  </div>
</div>
   
  </body>
</html>