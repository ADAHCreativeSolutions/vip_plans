<?php
namespace admin\controller;

class FloorController extends \admin\utility\Controller{
  
  public $tableName = 'tbl_floorplan';
	public $primaryKey = array();
	public $detailedModel = array();
	public $result = null;	
	public $fieldsArray = array();
  private $action = 'view';
  
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
    $id = $this->getParameter('id');
    $res = $this->_view($id);
    $breadCrumbObj = new \admin\utility\BreadCrumb();
    $routes = array('module'=>'floor','action'=>array('name'=>'Main','link'=>''));
    $crumb = $breadCrumbObj->setCrumb($routes);
    switch($action){
      case 'add': $this->_add() ;
        break;
      case 'delete': ;
        break;
      case 'view': ;
        break;
    }
      
    
    include 'view/FloorView.php';
  }
  
  private function _add(){
    $floorObj = new \admin\model\Floor();
    
    if($this->getParameter('submit')){
      $dataArray = $this->getParameter('floorplan');
      $imageAreas= $dataArray['a'];
      unset($dataArray['a']);    
      
     
      foreach($imageAreas as $key=>$val){
        $dataArrayNew = array_merge($dataArray,$val);
        if(!isset($dataArrayNew['status'])){
          $dataArrayNew['status'] = 'INACTIVE';
        }
        $floorObj->setData($dataArrayNew);
        $where = array();
        $id = 0;
        if(isset($dataArrayNew['area_id']) && $dataArrayNew['area_id'] > 0){
          $where = array('area_id'=>$dataArrayNew['area_id'],'event_id'=>$dataArrayNew['event_id']);
          $id = $dataArrayNew['area_id'];
        }
        $floorObj->save($id,$where);
      }
    }
  }
  
  private function _view($id=0){
    $floorObj  = new \admin\model\Floor();
    if($id){
      $res = $floorObj->viewOne($id);
    }else{
      $res = $floorObj->view();
    }
    return $res;
  }
  
  
  
}



?>