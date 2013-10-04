<?php
namespace vip\model;

class Venue extends \vip\utility\Model{
 	public $tableName = 'tbl_venue';
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
  public function all(){
     
     $sql =  "SELECT V.venue_id,V.venue_name,V.description,V.main_image_path,V.street,V.city,V.email,V.contact_no,V.fax,C.city
                FROM tbl_venue V, tbl_city C
               WHERE V.city=C.city_id 
               ORDER BY C.city ASC
               ";
     $res = $this->complexQuery($sql, 'selectAll',array());
     return $res;
  }
  
  public function getVenuesLike($venueName,$city=''){
    if($city == '' || $city == null){
      $sql = "SELECT V.venue_id,V.venue_name,V.description,V.main_image_path,V.street,V.city,V.email,V.contact_no,V.fax,C.city
            FROM tbl_venue V, tbl_city C  
            WHERE V.venue_name LIKE '%" . $venueName . "%'
            AND V.city=C.city_id";
      
      $res = $this->complexQuery($sql, 'selectAll',array(),5);
      
    }else{
      $sql = "SELECT V.venue_id,V.venue_name,V.description,V.main_image_path,V.street,V.city,V.email,V.contact_no,V.fax,C.city
            FROM tbl_venue V, tbl_city C  
            WHERE V.venue_name LIKE '%" . $venueName . "%' 
            AND V.city=:city_id
            AND V.city=C.city_id 
            ";
      
      $res = $this->complexQuery($sql, 'selectAll',array('city_id'=>$city),5);
      
    }
 
    return $res;
  }
 
   public function view($venueId){
     $venueArray = array();
     $sql =  "SELECT V.venue_id,V.venue_name,V.description,V.main_image_path,V.street,V.email,V.contact_no,V.fax,C.city
                FROM tbl_venue V, tbl_city C
               WHERE V.venue_id=:venue_id   
               AND V.city=C.city_id 
               LIMIT 1";
     $res = $this->complexQuery($sql, 'select',array('venue_id'=>$venueId));
     $venueArray['venue'] = $res;
     $res = array();

     $sql = "SELECT H.day_of_week, H.start_time,H.end_time 
               FROM tbl_venue_hours H
              WHERE H.venue_id=:venue_id   
              ";
     $res = $this->complexQuery($sql, 'selectAll',array('venue_id'=>$venueId));
     $venueArray['hours'] = $res;
     $res = array();
     
      $sql = "SELECT T.venu_types_id,T.venue_id,T.type_id,S.type 
              FROM tbl_venue_types T, tbl_types S 
              WHERE T.venue_id=:venue_id 
              AND T.type_id=S.type_id";
     $res = $this->complexQuery($sql, 'selectAll',array('venue_id'=>$venueId));
     $venueArray['types'] = $res;
     $res = array();
     
     $sql = "SELECT I.venue_image_path
               FROM tbl_venue_images I
               AND I.venue_id =:venue_id
              ";
     $res = $this->complexQuery($sql, 'selectAll',array('venue_id'=>$venueId));
     $venueArray['images'] = $res;
     
     return $venueArray;
  }
  
  public function viewOne($venueId){
    
    $sql =  "SELECT V.venue_id,V.venue_name,V.description,V.main_image_path,V.street,V.email,V.contact_no,V.fax,C.city
                FROM tbl_venue V, tbl_city C 
               WHERE V.venue_id=:venue_id  
               AND V.city=C.city_id
               LIMIT 1";
     $res = $this->complexQuery($sql, 'select',array('venue_id'=>$venueId));
    
    return $res;
  }
}
?>
