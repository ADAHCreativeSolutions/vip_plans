<?php
namespace admin\controller;

class VenueController extends \admin\utility\Controller{
  
  public $tableName     = 'tbl_venue';
	public $primaryKey    = array();
	public $detailedModel = array();
	public $result        = null;	
	public $fieldsArray   = array();
  private $action       = 'view';
  
  public function __construct() {
    parent::__construct();    
    $action = $this->getParameter('action');
    if($action == '' || $action == null){
      $action = 'view';
    }
    $this->action = $action;
    $this->index();
  }
  
  public function index(){
    $action = $this->action;
    $cityObj= new \admin\model\City();
    $listObj    = $cityObj->getList();
    $id = $this->getParameter('id');
    $res = $this->_view($id);
    $breadCrumbObj = new \admin\utility\BreadCrumb();
    $routes = array('module'=>'venue','action'=>array('name'=>'Main','link'=>''));
    $crumb = $breadCrumbObj->setCrumb($routes);
    switch($action){
      case 'add': $this->_add();
        break;
      case 'delete': ;
        break;
      case 'view': ;
        break;
      case 'bottles': $this->_bottles();
        break;
      case 'types': $this->_types();
        break;
    }
      
    
    include 'view/VenueView.php';
  }
  private function _add(){
    $venueObj  = new \admin\model\Venue();
    
   
    if($this->getParameter('submit')){
      $dataArray = $this->getParameter('venue');
      
      if($this->getParameter('main_image_path') != ''){
        $uploaderObj = new \admin\utility\Uploader('venue/main');      
        $fileName    = $uploaderObj->uploadFile('main_image_path',$dataArray['venue_name']);      
        $dataArray['main_image_path'] = $fileName;
      }
      if(!isset($dataArray['status'])){
        $dataArray['status'] = 'INACTIVE';
      }
      
      $venueObj->setData($dataArray);
      if(isset($dataArray['venue_id']) && $dataArray['venue_id'] > 0){
        $where = array('venue_id'=>$dataArray['venue_id']);
        $id = $dataArray['venue_id'];
        if($dataArray['main_image_path'] == ''){
          unset($dataArray['main_image_path']);
        }
      }
      $venueObj->save($id,$where);
    }else{
      $this->action = 'add';
    }
  }
  
  private function _view($id=0){
    $venueObj  = new \admin\model\Venue();
    if($id){
      $res = $venueObj->viewOne($id);
    }else{
      $res = $venueObj->view();
    }
    return $res;
  }
  
  private function _bottles(){
    $dataArray = $this->getParameter('venue');
    $valuesArray = $dataArray['bottles'];
   
    unset($dataArray['bottles']);
    $venueObj = new \admin\model\Venue();
    $venueObj->setData(array('venue_id'=>$dataArray['venue_id']));
    $venueObj->getSavedBottles();
    
    if(sizeof($valuesArray) > 0){
      foreach($valuesArray as $key=>$val){
        $newDataArray = array_merge($dataArray,$val);
        
        $venueObj->setData($newDataArray);
        
        $id =0 ;
        $where =  array();
        if($newDataArray['bottle_id'] > 0){
          $where = array('venue_id'=>$newDataArray['venue_id'],'bottle_id'=>$newDataArray['bottle_id']);
          $id = $newDataArray['bottle_id'];
        }
        $venueObj->saveBottles($id, $where);
      }
    }
    
    $venueObj->doUpdateRest();
  }
  
  private function _types(){
    $dataArray = $this->getParameter('venue');
    $valuesArray = $dataArray['types'];
   
    unset($dataArray['types']);
    $venueObj = new \admin\model\Venue();
    $venueObj->setData(array('venue_id'=>$dataArray['venue_id']));
    $venueObj->getSavedTypes();
    
    if(sizeof($valuesArray) > 0){
      foreach($valuesArray as $key=>$val){
        $newDataArray = array_merge($dataArray,$val);
        
        $venueObj->setData($newDataArray);
        
        $id =0 ;
        $where =  array();
        if($newDataArray['type_id'] > 0){
          $where = array('venue_id'=>$newDataArray['venue_id'],'type_id'=>$newDataArray['type_id']);
          $id = $newDataArray['type_id'];
        }
        $venueObj->saveTypes($id, $where);
      }
    }
    
    $venueObj->doUpdateRestTypes();
  }
}
?>
