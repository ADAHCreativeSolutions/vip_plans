<?php
namespace admin\controller;

class TableController extends \admin\utility\Controller{
  
  public $tableName     = 'tbl_table';
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
    $res = $this->_view(10);
   $breadCrumbObj = new \admin\utility\BreadCrumb();
    $routes = array('module'=>'table','action'=>array('name'=>'Main','link'=>''));
    $crumb = $breadCrumbObj->setCrumb($routes);
    switch($action){
      case 'add': $this->_add();
        break;
      case 'delete': ;
        break;
      case 'view': ;
        break;
    }
      
    
    include 'view/TableView.php';
  }
  private function _add(){
    $tableObj  = new \admin\model\Table();
    
   
    if($this->getParameter('submit')){
      $maxNoOfHeads = $this->getParameter('max_no_of_heads');
      $tableNames   = $this->getParameter('table_names');
      $noOfTables    = $this->getParameter('no_of_tables');
      
      $tableNumbers = $this->generateTableNames($tableNames);
      print_r($tableNumbers);
      $venueId=10;
      if(is_array($tableNumbers)){
        foreach($tableNumbers as $key=>$val){
          $array = array('table_id'=>0,'venue_id'=>$venueId,'table_no'=>$key,'max_no_of_heads'=>$maxNoOfHeads);
          $tableObj->setData($array);
          $tableObj->save();
        }
      }
      
     
    }else{
      $this->action = 'add';
    }
  }
  private function _view($venueId){
    $tableObj  = new \admin\model\Table();
    if($id){
      $res = $tableObj->viewOne($id);
    }else{
      $res = $tableObj->view($venueId);
    }
    return $res;
  }
  
  private function generateTableNames($tableNames){
    $tableNumbers = array();
    if(!is_null($tableNames)){
      if(strstr($tableNames,',') !== FALSE){
        if(strstr($tableNames,'-') !== FALSE){
          $arrayData = explode(',',$tableNames);
          foreach($arrayData as $key=>$val){
            $val = trim($val);
            if(strstr($val,'-') !== FALSE){
              $valArray = explode('-',$val);
              $x = $valArray[0];
              while($x <= $valArray[1]){
                $tableNumbers[$x] = $x; 
                ++$x;
              }
            }else{
               $tableNumbers[$val] = $val; 
            }
          }
          // both random and sequence
        }else{
           $arrayData = explode(',',$tableNames);
           foreach($arrayData as $key=>$val){
             $tableNumbers[$val] = $val; 
           }
          // only random
        }
        
      }else if(strstr($tableNames,'-') !== FALSE){
        if(strstr($tableNames,'-') !== FALSE){
          $valArray = explode('-',$tableNames);
          $x = $valArray[0];
          while($x <= $valArray[1]){
            $tableNumbers[$x] = $x; 
            ++$x;
          }
        }
        // only sequence
      }else{
        $tableNumbers[$tableNames] = $tableNames; 
        //only one table
      }
      return $tableNumbers;
    }
    return false;
  }
  
}
?>
