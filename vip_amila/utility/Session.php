<?php
namespace vip\utility;
/*
 * Session class will handle all the sessions related to application with simple
 * way. Session will automatically initiate when loading the project. 
 */
class Session{
  /**
   *
   * @var type array
   */
  protected $sessions = array(); 
  
  /**
   * creates a session object
   */
  public function __construct() {
    if(!isset($_SESSION['user']) || $_SESSION['user'] == null){
      $_SESSION['user']['fuser'] = 'fuser';
    }
    $this->sessions = $_SESSION['user'];    
  }
 
  public function test(){
    
  }

  public function setSession($key,$val){
    $_SESSION['user'][$key]= $val;
    $this->sessions = $_SESSION['user'];
  }
  
  public function getSession($key){
    return $this->sessions[$key];
  }
  
  public function hasSession($key){
    
    return key_exists($key, $this->sessions);
  }
  
  public function clearSession($key){
    unset($this->sessions[$key]);
    $_SESSION['user'] = $this->sessions;
  }
  
  public function clearAll(){
    unset($_SESSION['user']);
    $this->sessions = null;
  }
}
?>