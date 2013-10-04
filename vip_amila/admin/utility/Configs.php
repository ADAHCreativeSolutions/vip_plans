<?php
namespace admin\utility;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Configs
 *
 * @author Shashika
 */
class Configs {
   
   private $modules = array('article'=>'Article',
                            'bottle'=>'Bottle',
                            'category'=>'Category',
                            'city'=>'City',
                            'event'=>'Event',
                            'floor'=>'Floor',
                            'province'=>'Province',
                            'user'=>'User',
                            'venue'=>'Venue',
                            'table'=>'Table',
                            'type'=>'Venue Type',
                            'Error');
  
   public function __construct(){
     
   }
   
   public function isModule($moduleName){
     return in_array($moduleName,$this->modules);
   }
   
   public function getModules(){
     return $this->modules;
   }
   
}

?>
