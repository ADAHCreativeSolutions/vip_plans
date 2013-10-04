<?php
namespace admin\controller;

class EventController extends \admin\utility\Controller{
  
  public $tableName     = 'tbl_event';
	public $primaryKey    = array();
	public $detailedModel = array();
	public $result        = null;	
	public $fieldsArray   = array();
  private $action       = 'view';
  
  public function __construct() {
    parent::__construct();    
    $this->action = $this->getParameter('action');$action = $this->getParameter('action');
    $id = $this->getParameter('id');
    $res = $this->_view($id);
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
    $venueObj= new \admin\model\Venue();
    $venueObj    = $venueObj->getList();
    $id = $this->getParameter('id');
    $res = $this->_view($id);
   $breadCrumbObj = new \admin\utility\BreadCrumb();
    $routes = array('module'=>'event','action'=>array('name'=>'Main','link'=>''));
    $crumb = $breadCrumbObj->setCrumb($routes);
    switch($action){
      case 'add': $this->_add();
        break;
      case 'delete': ;
        break;
      case 'view': ;
        break;
    }
      
    
    include 'view/EventView.php';
  }
  private function _add(){
    $eventObj  = new \admin\model\Event();
    
   
    if($this->getParameter('submit')){
      $dataArray = $this->getParameter('event');
      
      $uploaderObj = new \admin\utility\Uploader();
      $eventName = $uploaderObj->nameFormatter($dataArray['event_name']);
       $uploaderObj->setPath('events');
      
      if(isset($_FILES['event_banner']['name']) && $_FILES['event_banner']['name'] != ''){             
        $fileName    = $uploaderObj->uploadFile('event_banner',$eventName . '_banner');      
        $dataArray['event_banner'] = $fileName;
      }
      
      if(isset($_FILES['floor_plan_image']['name']) && $_FILES['floor_plan_image']['name'] != ''){   
        $fileName    = $uploaderObj->uploadFile('floor_plan_image',$eventName . '_floor');  
        $dataArray['floor_plan_image'] = $fileName;
      }
      if(!isset($dataArray['status'])){
        $dataArray['status'] = 'INACTIVE';
      }
      
      $eventObj->setData($dataArray);
      if(isset($dataArray['event_id']) && $dataArray['event_id'] > 0){
        $where = array('event_id'=>$dataArray['event_id']);
        $id = $dataArray['event_id'];
      }
      $eventObj->save($id,$where);
    }else{
      $this->action = 'add';
    }
  }
  private function _view($id=0){
    $eventObj  = new \admin\model\Event();
    if($id){
      $res = $eventObj->viewOne($id);
    }else{
      $res = $eventObj->view();
    }
    return $res;
  }
}
?>
