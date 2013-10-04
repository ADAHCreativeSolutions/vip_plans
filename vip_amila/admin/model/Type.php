<?php
namespace admin\model;

class Type extends \admin\utility\Model{
 	public $tableName = 'tbl_types';
	public $primaryKey = array();
	public $detailedModel = array();
	public $result = null;	
	public $fieldsArray = array();
  private $required = array('category');
  
  public function __construct() {
    parent::__construct($this->tableName);
  }
  
  public function setData($data){
    if(sizeof($data) > 0){
      foreach($data as $key=>$value){
        $this->data[$key] = $value;
      }
    }
  }
  
  public function save($id=0,$where=array()){
    $hasError = false;
     //print_r($this->data);
     
//    foreach($this->required as $key=>$val){
//      if(is_null($this->key) || $this->$key == ""){
//        $_SESSION['user']['smuser']['error'][$key] = 'required';
//        $hasError = true;
//      }
//              
//    }
//    if($hasError){
//   
//      return false;
//    }else{
   
      if($id){
        $this->updateData($this->data,$where);
      }else{      
        $this->insertData($this->data);
      }
//    }
  }
  
  
  
   public function view(){
    $sql = "SELECT T.type_id,T.type 
            FROM tbl_types T ";
    $res = $this->complexQuery($sql, 'selectAll',array());
    return $res;
  }
  
  public function viewOne($id){
    $sql = "SELECT T.type_id,T.type,T.status
            FROM tbl_types T 
            WHERE T.type_id=:bottle_id";
    $res = $this->complexQuery($sql, 'select', array('bottle_id'=>$id));
    return $res;
  }
}
?>
