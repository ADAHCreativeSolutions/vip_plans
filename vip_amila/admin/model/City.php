<?php
namespace admin\model;

class City extends \admin\utility\Model{
 	public $tableName = 'tbl_city';
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
  
  public function getList(){
    $fieldsArray = array('city_id'=>'city_id','city'=>'city');
    $allA =  $this->retrieveData($fieldsArray);
    $catsArray = array();
    foreach($allA as $keyX=>$valX){
      $catsArray[$valX['city_id']] = $valX['city'];
    }
    
    return $catsArray;
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
    $sql = "SELECT C.city_id,C.city,C.status,P.province 
            FROM tbl_city C, tbl_province P 
            WHERE C.province_id=P.province_id";
    $res = $this->complexQuery($sql, 'selectAll',array());
    return $res;
  }
  
  public function viewOne($id){
    $sql = "SELECT C.city_id,C.city,C.status,C.province_id 
            FROM tbl_city C
            WHERE C.city_id=:city_id";
    $res = $this->complexQuery($sql, 'select', array('city_id'=>$id));
    return $res;
  }
}
?>
