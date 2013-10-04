<?php
namespace vip\utility;
/*
 * important class to bu'ld easier navigation via the system
 */
class BreadCrumb{
  
  private $depth = 0; // how many levels of links
  private $route = array();
  
  public function __construct(){}
  
  public function setCrumb($route){ // accepts array of links
    $depth = sizeof($route);
    
    $modulesObj = new Configs();
    $moduleArray= $modulesObj->getModules();
    
    $breadCrumbArray = array();
    
    if($depth > -1){ // generating the breadcrumb array
      $this->depth = $depth;
      if(sizeof($depth) > 0){
        foreach($route as $key=>$val){
          switch($key){
            case 'module': $breadCrumbArray[$key]['name'] = $moduleArray[$val];
                           $breadCrumbArray[$key]['link'] = $val;
              break;
            case 'action': $breadCrumbArray[$key]['name'] = $val['name'];
                           $breadCrumbArray[$key]['link'] = $val['link'];
              break;
            case 'task':   $breadCrumbArray[$key]['name'] = $val['name'];
                           $breadCrumbArray[$key]['link'] = $val['link'];
              break;
            case 'record': $breadCrumbArray[$key]['name'] = $val['name'];                           
              break;
          }
          
        }
      }
    }
    
    return $breadCrumbArray;
  }
}
?>
