<?php
namespace admin\controller;

class UserController extends \admin\utility\Controller{
  
  public $tableName = 'tbl_user';
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
    $userRoleObj = new \admin\model\UserRole();
    $listObj = $userRoleObj->getList();
    $id = $this->getParameter('id');
    $res = $this->_view($id);
    switch($action){
      case 'login': $this->_login();
        break;
      case 'add':$this->_add();
        break;
      case 'delete': ;
        break;
      case 'approve': ;
        break;
      case 'view': ;
        break;
    }
      
    
    include 'view/UserView.php';
  }
  
  private function _login(){
    $userObj = new \admin\model\User();
    $userObj->setData($this->getParameter('user'));
    $res = $userObj->login();        
    $this->setSession('login', $res);
    header('location: index.php?module=home');
  }
  
  private function _add(){
    $userObj  = new \admin\model\User();
    
   
    if($this->getParameter('submit')){
      $dataArray = $this->getParameter('user');
      if(!isset($dataArray['status'])){
        $dataArray['status'] = 'INACTIVE';
      }
      $dataArray['created_date'] = date('Y-m-d H:i:s');
      $dataArray['last_login_date'] = '0000-00-00 00:00:00';
      $dataArray['last_updated'] = '0000-00-00 00:00:00';
      $userObj->setData($dataArray);
      if(isset($dataArray['user_id']) && $dataArray['user_id'] > 0){
        $where = array('user_id'=>$dataArray['user_id']);
        $id = $dataArray['user_id'];
      }
      $userObj->save($id,$where);
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
