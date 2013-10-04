<?php
namespace vip\model;

class Event extends \vip\utility\Model{
 	public $tableName = 'tbl_event';
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
  
 
   public function getAllEventsByCity($cityId){
     $sql = "SELECT E.event_id,E.venue_id,E.event_name,E.event_banner,E.description,E.floor_plan_image,E.date,E.starts,E.end,E.street,V.venue_name,C.city  
              FROM tbl_venue V, tbl_event E, tbl_city C 
              WHERE E.city=:cityId 
              AND   E.venue_id=V.venue_id 
              AND   E.city=C.city_id
              ORDER BY E.date ASC, E.starts ASC, V.venue_name ASC";
     
     $res = $this->complexQuery($sql, 'selectAll', array('cityId'=>$cityId));
     
     return $res;
  }
  
  public function getAllEventsByDate($date){
     $sql = "SELECT E.event_id,E.venue_id,E.event_name,E.event_banner,E.description,E.floor_plan_image,E.date,E.starts,E.end,E.street,V.venue_name,C.city  
              FROM tbl_venue V, tbl_event E, tbl_city C  
              WHERE E.date=:date 
              AND   E.venue_id=V.venue_id 
              AND   E.city=C.city_id
              ORDER BY E.date ASC, E.starts ASC, V.venue_name ASC";
     
     $res = $this->complexQuery($sql, 'selectAll', array('date'=>$date));
     
     return $res;
  }
  
  public function viewOne($id){
    
    $sql = "SELECT E.event_id,E.venue_id,E.event_name,E.event_banner,E.description,E.floor_plan_image,E.date,E.starts,E.end,E.street,E.ticket_price,V.venue_name,C.city  
              FROM tbl_venue V, tbl_event E, tbl_city C 
              WHERE E.event_id=:event_id 
              AND   E.venue_id=V.venue_id 
              AND   E.city=C.city_id
              ORDER BY E.date ASC, E.starts ASC, V.venue_name ASC";
     
     $res = $this->complexQuery($sql, 'select', array('event_id'=>$id));
             
    return $res;
  }
}
?>


