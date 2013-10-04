<?php
namespace admin\controller;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class OuterController extends \admin\utility\Controller{
  
   public $tableName = 'tbl_floorplan';
	public $primaryKey = array();
	public $detailedModel = array();
	public $result = null;	
	public $fieldsArray = array();
  private $action = 'view';
  
  public function __construct() {
    
    parent::__construct();    
    $action = $this->getParameter('action');
    
    $this->action = $action;
    $this->index();
  }
  
  public function index(){
    $action = $this->action;
    $id = $this->getParameter('id');   
    
    switch($action){
      case 'bottles': $this->_bottles($id) ;
        break;
      case 'types': $this->_types($id) ;
        break;
      case 'hours': $this->_hours($id) ;
        break;
      case 'view': ;
        break;
    }  
    
  }
  
  private function _bottles($id){
    
    $venueObj = new \admin\model\Venue();
    $venueObj->setData(array('venue_id'=>$id));

    $venueObj->getSavedBottles();
    $bottlesObj = new \admin\model\Bottle();
    $res = $bottlesObj->view();
  
    include 'view/VenueBottlesForm.php';
  }
  
  private function _types($id){
   
    $venueObj = new \admin\model\Venue();
    $venueObj->setData(array('venue_id'=>$id));

    $venueObj->getSavedTypes();
    $typeObj = new \admin\model\Type();
    $res = $typeObj->view();
  
    include 'view/VenueTypesForm.php';
  }
  
  private function _hours($id){
   
    $venueObj = new \admin\model\Venue();
    $venueObj->setData(array('venue_id'=>$id));

//    $venueObj->getSavedTypes();
//    $typeObj = new \admin\model\Type();
//    $res = $typeObj->view();
  
    include 'view/VenueHoursForm.php';
  }
}
?>
