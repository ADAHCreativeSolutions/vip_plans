<?php
namespace vip\model;

class Member extends \vip\utility\Model{
 	public $tableName = 'tbl_member';
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
  
  public function login($data){
     $sql = "SELECT member_id,member_name,member_email,member_phone 
            FROM tbl_member 
            WHERE member_email=:member_email AND member_password=:member_password 
            AND status='ACTIVE'";
     $res = $this->complexQuery($sql, 'select', $data);
     return $res;
  }
  
   public function view(){
    $sql = "SELECT E.event_id,E.event_name,E.date,E.starts,E.end  
            FROM tbl_event E";
    $res = $this->complexQuery($sql, 'selectAll',array());
    return $res;
  }
  
  public function viewOne($id){
    
    $sql = "SELECT member_id,member_name,member_email,member_phone 
            FROM tbl_member
            
            WHERE member_id=:member_id";
    $res = $this->complexQuery($sql, 'select', array('member_id'=>$id));
    return $res;
  }
}
?>
