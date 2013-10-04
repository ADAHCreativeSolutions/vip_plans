<?php
namespace vip\controller;

class VenueController extends \vip\utility\Controller{
  
  function __construct() {
    parent::__construct();
    
    $this->task = $this->getParameter('task');
    
      switch($this->task){
        case '': $this->_venues();
          break;
        case 'single': $this->_single();
          break;
        default: $this->_error();
      }
    
  }
  
  private function _venues(){
    $venueObj = new \vip\model\Venue();
    $cityObj  = new \vip\model\City();
    
    $allVenues = $venueObj->all();
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'views/venue/venues.php';
    include 'templates/footer.php';
  }
  
  private function _single(){
    $venueObj = new \vip\model\Venue();
    $venueId  = $this->getParameter('venue_id');
    
    $all = $venueObj->view($venueId);
    $venueData = $all['venue'];
    $hours = $all['hours'];
    $types = $all['types'];
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'views/venue/single_venue.php';
    include 'templates/footer.php';
  }
  
  private function _error(){
    include '404.php';
  }
  
 
  
 
}

?>
