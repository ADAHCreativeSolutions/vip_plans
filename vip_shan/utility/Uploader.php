<?php
namespace vip\utility;

class Uploader{
  private $path = "../images/";

  public function __construct($path="") {    
      $this->setPath($path);
    
  }
  
  public function setPath($path){
    $this->path .=  $path; 
  }
  
  public function uploadFile($key,$name){
    
    if(isset($_FILES[$key]['name'])){
      $moveimg = $_FILES[$key]['name'];	    
      $extNew  = pathinfo($moveimg, PATHINFO_EXTENSION);
      $newImageName = $this->nameFormatter($name) . '.' . $extNew;
      $pathTo  = $this->path . '/' . $newImageName;
      move_uploaded_file($_FILES[$key]['tmp_name'], $pathTo)or die("can't upload");
      
      return $newImageName;
    }
    return false;
  }
  
  public function nameFormatter($name){
    $name = strtolower($name);
    $name = str_replace(array('-',' ', '"'), '_', $name);
    return $name;
  }

		
		
		
		
}	

?>