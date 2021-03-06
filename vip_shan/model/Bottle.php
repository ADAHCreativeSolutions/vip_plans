<?php
namespace vip\model;

class Bottle extends \vip\utility\Model{
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
  
  public function save($id=0,$where=array()){
    $hasError = false;
     
   
      if($id){
        $this->updateData($this->data,$where);
      }else{      
        $this->insertData($this->data);
      }

  }
  
 
   public function view(){
     $venueArray = array();
     $sql =  "SELECT city_id,city
                FROM tbl_city
               WHERE status='ACTIVE'  
               ";
     $res = $this->complexQuery($sql, 'selectAll',array());
     
     return $res;
  }
  
  public function viewOne($id){
    
    $sql = "SELECT member_id,member_name,member_email,member_phone 
            FROM tbl_member
            FROM tbl_event E  
            WHERE E.event_id=:bottle_id";
    $res = $this->complexQuery($sql, 'select', array('bottle_id'=>$id));
    
    return $res;
  }
}
?>
