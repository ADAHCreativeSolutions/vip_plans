<?php
namespace admin\utility\html;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Element
 *
 * @author Shashika
 */
class Element {
  //put your code 
  private $element = array();
  
  function __construct($array=array()) {
    if(sizeof($array) > 0){
      if($array['element'] != ""){
        
      }else{
        echo "Element name cannot be empty";
      }
    }
    
  }
  
  private function renderElement($array){
    $elementName = $array['element'];
    
    switch($elementName){
      case 'input': ;
        break;
      case 'select': ;
        break;
      case 'textarea': ;
        break;
    }
    
  }
  
  private function input(){}
  
  private function select(){}
  
  private function textarea($array){    
    $str = '<textarea';
    $val = $array['value'];
    unset($array['value']);
    foreach ($array as $attr=>$val){
      if($attr == 'value'){
      $str .= ' ' .$attr . '="' . $val . '"';
      }
    }
    $str .= '>' . $val . '</textarea>';
   
    echo $str;
  }
}

?>
