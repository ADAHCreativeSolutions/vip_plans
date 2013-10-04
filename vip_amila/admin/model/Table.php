<?php
namespace admin\model;

class Table extends \admin\utility\Model{
 	public $tableName = 'tbl_table';
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
  
   public function view($venueId){
    $sql = "SELECT E.table_id,E.table_no,E.max_no_of_heads,E.status   
            FROM tbl_table E 
            WHERE venue_id=:venue_id";
    $res = $this->complexQuery($sql, 'selectAll',array('venue_id'=>$venueId));
       
    return $res;
  }
  
  public function viewOne($id){
    
    $sql = "SELECT E.event_id,E.venue_id,E.event_name,E.event_banner,E.description,E.floor_plan_image,E.date,E.starts,E.end,E.street,E.city,E.total_heads,E.ticket_price,E.status 
            FROM tbl_event E  
            WHERE E.event_id=:bottle_id";
    $res = $this->complexQuery($sql, 'select', array('bottle_id'=>$id));
    
    return $res;
  }
}
?>
