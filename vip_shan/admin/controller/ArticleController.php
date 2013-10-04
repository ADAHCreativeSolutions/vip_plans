<?php
namespace admin\controller;

class ArticleController extends \admin\utility\Controller{
  
  public $tableName = 'tbl_article';
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
    $routes = array('module'=>'article','action'=>array('name'=>'Main','link'=>''));
    $crumb = $breadCrumbObj->setCrumb($routes);
                       
    switch($action){
      case 'add': $this->_add();
        break;
      case 'delete': ;
        break;
      case 'view':  ;
        break;
    }
      
    
    include 'view/ArticleView.php';
  }
  private function _add(){
    $articleObj  = new \admin\model\Article();
    
   
    if($this->getParameter('submit')){
      $dataArray = $this->getParameter('article');
      if(!isset($dataArray['status'])){
        $dataArray['status'] = 'INACTIVE';
      }
      
      $articleObj->setData($dataArray);
      if(isset($dataArray['article_id']) && $dataArray['article_id'] > 0){
        $where = array('article_id'=>$dataArray['article_id']);
        $id = $dataArray['article_id'];
      }
      $articleObj->save($id,$where);
    }else{
      $this->action = 'add';
    }
  }
  
  private function _view($id=0){
    $articleObj  = new \admin\model\Article();
    if($id){
      $res = $articleObj->viewOne($id);
    }else{
      $res = $articleObj->view();
    }
    return $res;
  }
  
}
?>
