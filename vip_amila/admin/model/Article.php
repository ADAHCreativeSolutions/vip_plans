<?php
namespace admin\model;

class Article extends \admin\utility\Model{
 	public $tableName = 'tbl_article';
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
    $sql = "SELECt A.article_id, A.page,A.article_title,A.abstract,A.article,A.version,A.status,A.keywords,A.status
            FROM tbl_article A";
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
