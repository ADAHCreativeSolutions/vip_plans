<?php
namespace admin\controller;

class BottleController extends \admin\utility\Controller{
  
  public $tableName = 'tbl_bottle';
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
    $categoryObj= new \admin\model\Category();
    $listObj    = $categoryObj->getList();
    $id = $this->getParameter('id');
    $res = $this->_view($id);
    $breadCrumbObj = new \admin\utility\BreadCrumb();
    $routes = array('module'=>'bottle','action'=>array('name'=>'Main','link'=>''));
    $crumb = $breadCrumbObj->setCrumb($routes);
                       
    switch($action){
      case 'add': $this->_add();
        break;
      case 'delete': ;
        break;
      case 'view':  ;
        break;
    }
      
    
    include 'view/BottleView.php';
  }
  private function _add(){
    $bottleObj  = new \admin\model\Bottle();
    
   
    if($this->getParameter('submit')){
      $dataArray = $this->getParameter('bottle');
      if(!isset($dataArray['status'])){
        $dataArray['status'] = 'INACTIVE';
      }
      
      $bottleObj->setData($dataArray);
      if(isset($dataArray['bottle_id']) && $dataArray['bottle_id'] > 0){
        $where = array('bottle_id'=>$dataArray['bottle_id']);
        $id = $dataArray['bottle_id'];
      }
      $bottleObj->save($id,$where);
    }else{
      $this->action = 'add';
    }
  }
  
  private function _view($id=0){
    $bottleObj  = new \admin\model\Bottle();
    if($id){
      $res = $bottleObj->viewOne($id);
    }else{
      $res = $bottleObj->view();
    }
    return $res;
  }
  
}
?>
