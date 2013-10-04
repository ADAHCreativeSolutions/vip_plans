<?php
namespace admin\model;

class Province extends \admin\utility\Model{
 	public $tableName = 'tbl_province';
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
  
  public function login(){
    $fieldsArray = array('username'=>'username','user_id'=>'user_id','user_role_id'=>'user_role_id');
    $where = array('username'=>$this->data['username'], 'password'=>$this->data['password']);
    return $this->retrieveDatum($fieldsArray,1,$where);
  }
  
   public function getList(){
    $fieldsArray = array('province_id'=>'province_id','province'=>'province');
    $allA =  $this->retrieveData($fieldsArray);
    $catsArray = array();
    foreach($allA as $keyX=>$valX){
      $catsArray[$valX['province_id']] = $valX['province'];
    }
    
    return $catsArray;
  }
  
   public function view(){
    $sql = "SELECT P.province_id,P.province 
            FROM tbl_province P";
    $res = $this->complexQuery($sql, 'selectAll',array());
    return $res;
  }
  
  public function viewOne($id){
    $sql = "SELECT P.province_id,P.province,P.status 
            FROM tbl_province P 
            WHERE P.province_id=:bottle_id";
    $res = $this->complexQuery($sql, 'select', array('bottle_id'=>$id));
    return $res;
  }
}
?>
