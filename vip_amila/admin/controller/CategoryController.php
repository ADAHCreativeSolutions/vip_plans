<?php
namespace admin\controller;

class CategoryController extends \admin\utility\Controller{
  
  public $tableName = 'tbl_product_category';
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
    $routes = array('module'=>'category','action'=>array('name'=>'Main','link'=>''));
    $crumb = $breadCrumbObj->setCrumb($routes);
    switch($action){
      case 'add': $this->_add() ;
        break;
      case 'delete': ;
        break;
      case 'view': ;
        break;
    }
      
    
    include 'view/CategoryView.php';
  }
  
  private function _add(){
    $categoryObj = new \admin\model\Category();
    
    if($this->getParameter('submit')){
      $dataArray = $this->getParameter('category');
      if(!isset($dataArray['status'])){
        $dataArray['status'] = 'INACTIVE';
      }
      
      $categoryObj->setData($dataArray);
      if(isset($dataArray['prod_cat_id']) && $dataArray['prod_cat_id'] > 0){
        $where = array('prod_cat_id'=>$dataArray['prod_cat_id']);
        $id = $dataArray['prod_cat_id'];
      }
      $categoryObj->save($id,$where);
    }else{
      $this->action = 'add';
    }
  }
  
  private function _view($id=0){
    $bottleObj  = new \admin\model\Category();
    if($id){
      $res = $bottleObj->viewOne($id);
    }else{
      $res = $bottleObj->view();
    }
    return $res;
  }
  
}
?>
