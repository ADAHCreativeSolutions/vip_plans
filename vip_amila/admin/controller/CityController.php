<?php
namespace admin\controller;

class CityController extends \admin\utility\Controller{
  
  public $tableName = 'tbl_city';
	public $primaryKey = array();
	public $detailedModel = array();
	public $result = null;	
	public $fieldsArray = array();
  private $action = 'view';
  
  public function __construct() {
    parent::__construct();    
    $this->action = $this->getParameter('action');$action = $this->getParameter('action');
    if($action == '' || $action == null){
      $action = 'view';
    }
    $this->action = $action;
    $this->index();
  }
  
  public function index(){
    $action = $this->action;
    $provinceObj= new \admin\model\Province();
    $listObj    = $provinceObj->getList();
    $id = $this->getParameter('id');
    $res = $this->_view($id);
    $breadCrumbObj = new \admin\utility\BreadCrumb();
    $routes = array('module'=>'city','action'=>array('name'=>'Main','link'=>''));
    $crumb = $breadCrumbObj->setCrumb($routes);
    switch($action){
      case 'add': $this->_add();
        break;
      case 'delete': ;
        break;
      case 'view': ;
        break;
    }
      
    
    include 'view/CityView.php';
  }
  
  private function _add(){
    $cityObj  = new \admin\model\City();
    
   
    if($this->getParameter('submit')){
      $dataArray = $this->getParameter('city');
     
      if(!isset($dataArray['status'])){
        $dataArray['status'] = 'INACTIVE';
      }
      
      $cityObj->setData($dataArray);
      if(isset($dataArray['city_id']) && $dataArray['city_id'] > 0){
        $where = array('city_id'=>$dataArray['city_id']);
        $id = $dataArray['city_id'];
      }
      $cityObj->save($id,$where);
    }else{
      $this->action = 'add';
    }
  }
  
  private function _view($id=0){
    $bottleObj  = new \admin\model\City();
    if($id){
      $res = $bottleObj->viewOne($id);
    }else{
      $res = $bottleObj->view();
    }
    return $res;
  }
}
?>
