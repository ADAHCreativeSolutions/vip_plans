<?php
include 'bootstrap.php';

$module = '';
if(isset($_REQUEST['module'])){
  $module = $_REQUEST['module'];
}
 $newObj = new \admin\controller\OuterController();

 ?>