<?php
namespace admin\utility;

class Controller extends Session {
  
  private $requestArray = array('headers'=>array(),
                                'body'=>array(),
                                'post'=>array(),
                                'get'=>array());
  private $response = array();
  
  function __construct(){ 
   if(sizeof($_SERVER) > 0){
      $this->requestArray['headers'] = $_SERVER;
      if(key_exists('REQUEST_METHOD', $_SERVER)){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          $this->requestArray['post'] = $_REQUEST;
        }else{
          $this->requestArray['get'] = $_REQUEST;
        }        
        $this->requestArray['body'] = $_REQUEST;
      }
    }   
    
    parent::__construct();
  }
  
  function getParameter($paramName){
    if(key_exists($paramName, $this->requestArray['body'])){
      return $this->requestArray['body'][$paramName];
    }
    return false;
  }
  
  function getPostParameter($paramName){
    if(key_exists($paramName, $this->requestArray['post'])){
      return $this->requestArray['post'][$paramName];
    }
    return false;
  }
  
  function setResponse($array){
    $this->response = $array;
  }
}
?>
