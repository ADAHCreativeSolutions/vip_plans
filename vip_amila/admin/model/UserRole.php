<?php
namespace admin\model;

class UserRole extends \admin\utility\Model{
 	public $tableName = 'tbl_user_role';
	public $primaryKey = array();
	public $detailedModel = array();
	public $result = null;	
	public $fieldsArray = array();
  private $required = array('username','password','user_role_id');
  
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
    $fieldsArray = array('user_role_id'=>'user_role_id','user_role'=>'user_role');
    $allA =  $this->retrieveData($fieldsArray);
    $catsArray = array();
    foreach($allA as $keyX=>$valX){
      $catsArray[$valX['user_role_id']] = $valX['user_role'];
    }
    
    return $catsArray;
  }
  
   public function view(){
    $sql = "SELECT B.bottle_id,B.bottle_name,B.status,C.category 
            FROM tbl_bottles B, tbl_product_category C 
            WHERE B.category_id=C.prod_cat_id";
    $res = $this->complexQuery($sql, 'selectAll',array());
    return $res;
  }
  
  public function viewOne($id){
    $sql = "SELECT B.bottle_id,B.bottle_name,B.status,B.category_id 
            FROM tbl_bottles B 
            WHERE B.bottle_id=:bottle_id";
    $res = $this->complexQuery($sql, 'select', array('bottle_id'=>$id));
    return $res;
  }
  
}
?>
