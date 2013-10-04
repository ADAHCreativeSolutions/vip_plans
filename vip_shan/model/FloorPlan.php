<?php
 //area_id 	event_id 	area_name 	max_heads 	area_coord_x 	area_coord_y 	area_coord_x2 	area_coord_y2 Ascending 	status 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
namespace vip\model;

class FloorPlan extends \vip\utility\Model{
 	public $tableName = 'tbl_floorplan';
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
  
 
   public function view($eventId){
     $venueArray = array();
     $sql =  "SELECT area_id,event_id,area_name,max_heads,area_coord_x,area_coord_y,area_coord_x2,area_coord_y2,status 
                FROM tbl_floorplan
               WHERE event_id=:event_id
               ";
     $res = $this->complexQuery($sql, 'selectAll',array('event_id'=>$eventId));
     
     
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
