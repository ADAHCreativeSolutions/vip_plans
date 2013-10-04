<?php
namespace vip\controller;

class EventController extends \vip\utility\Controller{
  
  function __construct() {
    parent::__construct();
    
    $this->task = $this->getParameter('task');
    
      switch($this->task){
        case 'buy-a-ticket': $this->_buyTicket();
          break;
       
        default: $this->_error();
      }
    
  }
  
  private function _buyTicket(){
    if(isset($_POST) && isset($_POST['module'])){
      $eventObj = new \vip\model\Event();
      
      $id = $this->getPostParameter('event_id');
      
      $eventData = $eventObj->viewOne($id);
      $eventName = $eventData['event_name'];
      $eventDate       = $eventData['date'];
      $description= $eventData['description'];
      $imagePath  = $eventData['event_banner'];
      $floorImage = $eventData['floor_plan_image'];
      list($width, $height) = getimagesize('images/events/' . $floorImage);
      $floorPlanObj   =  new \vip\model\FloorPlan();
      $floorPlanData  =  $floorPlanObj->view($id);
      $ticketPrice = $eventData['ticket_price'];
      $starts   = $eventData['starts'];      
      $end      = $eventData['end'];
      $street   = $eventData['street'];
      //print_r($floorPlanData);
      //exit;
    }
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'views/event/single_event.php';
    include 'templates/footer.php';
  }
  
  private function _error(){
    include '404.php';
  }
  
 
  
 
}

?>
