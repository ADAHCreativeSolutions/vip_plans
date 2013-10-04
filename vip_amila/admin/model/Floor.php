<?php
namespace admin\model;

class Floor extends \admin\utility\Model{
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
  
  
  
   public function view(){
    $sql = "SELECT F.area_id,F.area_name,F.max_heads,F.area_coord_x,F.area_coord_y,F.area_coord_x2,F.area_coord_y2,E.event_name,E.floor_plan_image 
            FROM tbl_floorplan F, tbl_event E 
            WHERE E.event_id=F.event_id  
            GROUP BY event_id";
    $res = $this->complexQuery($sql, 'selectAll',array());
    return $res;
  }
  
  public function viewOne($id){
    $sql = "SELECT tbl_floorplan.* , tbl_event.event_id,tbl_event.event_name,tbl_event.floor_plan_image 
            FROM tbl_event
            LEFT JOIN tbl_floorplan ON tbl_event.event_id = tbl_floorplan.event_id
            WHERE tbl_event.event_id=:bottle_id 
            ";
    $res = $this->complexQuery($sql, 'selectAll', array('bottle_id'=>$id));
    
    return $res;
  }
}
?>
