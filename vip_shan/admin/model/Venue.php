<?php
namespace admin\model;

class Venue extends \admin\utility\Model{
 	public $tableName = 'tbl_venue';
	public $primaryKey = array();
	public $detailedModel = array();
	public $result = null;	
	public $fieldsArray = array();
  private $required = array('category');
  private $bottles = array();
  
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
    $fieldsArray = array('venue_id'=>'venue_id','venue_name'=>'venue_name');
    $allA =  $this->retrieveData($fieldsArray);
    $catsArray = array();
    foreach($allA as $keyX=>$valX){
      $catsArray[$valX['venue_id']] = $valX['venue_name'];
    }
    
    return $catsArray;
  }
  public function save($id=0,$where=array()){
    $hasError = false;    
   
      if($id){
        $this->updateData($this->data,$where);
      }else{      
        $this->insertData($this->data);
      }

  }
  
  public function getSavedBottles(){
   
    $sql = "SELECT bottle_id
            FROM tbl_venue_bottles 
            WHERE venue_id=:venue_id";
    $res = $this->complexQuery($sql, 'selectAll', array('venue_id'=>$this->data['venue_id']));
    $newArray = array();
    if(sizeof($res) > 0){
      foreach($res as $key=>$val){
        $newArray[$val['bottle_id']] = $val['bottle_id'];
      }
    }
    $this->bottles = $newArray;
   
  }
  
  public function saveBottles($id,$where){
    $this->tableName = 'tbl_venue_bottles';
    
    if(sizeof($this->bottles) > 0){
     
      if(array_key_exists($this->data['bottle_id'],$this->bottles)){
       
        unset($this->bottles[$this->data['bottle_id']]);
        $this->data['status'] = 'ACTIVE';
        $this->save($id,$where);
      }
    }else{
      $this->save();
    }
  }
  
  public function doUpdateRest(){
    if(sizeof($this->bottles) > 0){
      $where['venue_id']=$this->data['venue_id'];
      foreach($this->bottles as $key=>$val){
        $id = $key;
        $where['bottle_id'] = $id;
        $this->data['bottle_id'] = $id;
        $this->data['status'] = 'INACTIVE';
        $this->save($id,$where);
      
      }
    }
  }
  
  public function getBottles(){
    return $this->bottles;
  }



  public function view(){
    $sql = "SELECT V.venue_id,V.venue_name,V.description,V.main_image_path,V.street,V.city,V.email,V.contact_no,V.fax
            FROM tbl_venue V";
    $res = $this->complexQuery($sql, 'selectAll',array());
    return $res;
  }
  
  public function viewOne($id){
    $sql = "SELECT V.venue_id,V.venue_name,V.description,V.main_image_path,V.street,V.city,V.email,V.contact_no,V.fax
            FROM tbl_venue V 
            WHERE V.venue_id=:bottle_id";
    $res = $this->complexQuery($sql, 'select', array('bottle_id'=>$id));
    return $res;
  }
  
  public function saveTypes($id,$where){
    $this->tableName = 'tbl_venue_types';
    
    if(sizeof($this->types) > 0){
     
      if(array_key_exists($this->data['type_id'],$this->types)){
       
        unset($this->types[$this->data['type_id']]);
        $this->data['status'] = 'ACTIVE';
        $this->save($id,$where);
      }
    }else{
      $this->data['status'] = 'ACTIVE';
      $this->save();
    }
  }
  
  public function doUpdateRestTypes(){
    if(sizeof($this->types) > 0){
      $where['venue_id']=$this->data['venue_id'];
      foreach($this->types as $key=>$val){
        $id = $key;
        $where['type_id'] = $id;
        $this->data['type_id'] = $id;
        $this->data['status'] = 'INACTIVE';
        $this->save($id,$where);
      
      }
    }
  }
  public function getSavedTypes(){
   
    $sql = "SELECT type_id
            FROM tbl_venue_types 
            WHERE venue_id=:venue_id";
    $res = $this->complexQuery($sql, 'selectAll', array('venue_id'=>$this->data['venue_id']));
    $newArray = array();
    if(sizeof($res) > 0){
      foreach($res as $key=>$val){
        $newArray[$val['type_id']] = $val['type_id'];
      }
    }
    $this->types = $newArray;
   
  }
  public function getTypes(){
    return $this->types;
  }
}
?>
