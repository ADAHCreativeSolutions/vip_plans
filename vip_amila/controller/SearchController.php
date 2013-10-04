<?php
namespace vip\controller;

class SearchController extends \vip\utility\Controller{
  
  function __construct() {
    parent::__construct();
    
    $this->task = $this->getParameter('task');
    
      switch($this->task){
        case 'search': $this->_search();
          break;
      
        default: $this->_error();
      }
    
  }
  
  private function _search(){
    
    if(isset($_POST) && isset($_POST['module'])){
      //$searchObj = new \vip\model\Search();
      
      $searchParams = $this->getPostParameter('search');
     

      foreach($searchParams as $key=>$val){
       
        if((strlen(trim($val)) < 0) || !$val){
         
          unset($searchParams[$key]);
        }
      }

      
     $sizeOfSearch = sizeof($searchParams);
     $resArray = array();
     switch($sizeOfSearch){
       case 1: $resArray = $this->_oneSrchParams($searchParams) ;
         break;
       case 2: $resArray = $this->_twoSrchParams($searchParams) ;
         break;
       case 3: $this->_threeSrchParams();
         break;
     }
    
    }
    $events = array(); $venues = array();
    if(isset($resArray['events'])){
      $events = $resArray['events'];
    }
    if(isset($resArray['venues'])){
      $venues = $resArray['venues'];
    }
  
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'views/search/results.php';
    include 'templates/footer.php';
  }
  
  private function _error(){
    include '404.php';
  }
  
  private function _oneSrchParams($searchParams){
    $results = array();
    foreach($searchParams as $key=>$val){
      $results = $this->_baseOneParam($key, $val);
    }
   
    return $results;
  }
  
  private function _twoSrchParams($searchParams){
    $venueObj = new \vip\model\Venue();
    $resultsArray = array();
  
    if(key_exists('venue_name', $searchParams) && key_exists('city_name', $searchParams)){
      
      $resultsArray['venues'] = $venueObj->getVenuesLike($searchParams['venue_name'], $searchParams['city_name']);
      
    }else if(key_exists('venue_name', $searchParams) && key_exists('date', $searchParams)){
      $resultsArray['venues'] = $venueObj->getVenuesLike($searchParams['venue_name'], $searchParams['date']);
    }else if(key_exists('city_name', $searchParams) && key_exists('date', $searchParams)){
       $resultsArray['venues'] = $venueObj->getVenuesLike($searchParams['venue_name'], $searchParams['date']);
    }
    return $resultsArray;
  }
  
  private function _threeSrchParams(){}
 
  private function _baseOneParam($key,$value){
    
    $resArray =  array();
    switch($key){
      case 'venue_name': $resArray = $this->_getVenue($value);
        break;
      case 'city_name': $resArray = $this->_getByCity($value) ;
        break;
      case 'date': $resArray = $this->_getByDate($value) ;
        break;
    }
    
    return $resArray;
  }
  
  private function _getVenue($venueName){
   
    $venueObj =  new \vip\model\Venue();
    
    $result['venues'] = $venueObj->getVenuesLike($venueName);
 
    return $result;
  }
  
  private function _getByCity($cityId){
    $eventObj = new \vip\model\Event();
    
    $events['events'] = $eventObj->getAllEventsByCity($cityId);
    
    return $events;
  }
  
  private function _getByDate($date){
    $eventObj = new \vip\model\Event();
    
    $events['events'] = $eventObj->getAllEventsByDate($date);
    
    $venueObj = new \vip\model\Venue();
    
    //$venues = 
    
    return $events;
  }
  
}

?>
