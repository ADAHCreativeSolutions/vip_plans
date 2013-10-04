<?php
namespace vip\controller;

class MemberController extends \vip\utility\Controller{
  
  function __construct() {
    parent::__construct();
    
    $this->task = $this->getParameter('task');
    
      switch($this->task){
        case 'register': $this->_register();
          break;
        case 'contact-us': $this->_contact_us();
          break;
         case 'register': $memberController =  new MemberController();
          break;
        case 'user': $userController =  new UserController();
          break;
        case 'error': $this->_error();
          break;
        case 'my-account': $this->_my_account();
          break;
        case 'login': $this->_login();
          break;
        case 'logout': $this->_logout();
          break;
        default: $this->_error();
      }
    
  }
  
  private function _register(){
    if(isset($_POST) && isset($_POST['module'])){
      $memberObj = new \vip\model\Member();
      
      $member = $this->getPostParameter('member');
      $memberObj->setData($member);
      $memberObj->save();
      $errMsg = 'Your regsitration successful. You can sign in!';
      $this->setSession('error', $errMsg);
      header('location: index.php?module=member&task=register');
      exit;
    }
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'views/member/register.php';
    include 'templates/footer.php';
  }
  
  private function _error(){
    include '404.php';
  }
  
  private function _login(){
    if(isset($_POST) && isset($_POST['module'])){
      $memberObj = new \vip\model\Member();      
      
      $member = $this->getPostParameter('member');
       
      $memberObj->setData($member);
      $data = $memberObj->login($member);
    
      $this->setSession('login', $data);      
      header('location: index.php?module=member&task=my-account');
      exit;
    }
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    
    include 'home.php';
    include 'templates/footer.php';
  }
  
  private function _my_account(){
    $memberObj = new \vip\model\Member();
    $loginArray = $this->getSession('login');
    $memberDetails =  $memberObj->viewOne($loginArray['member_id']);
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'views/member/my-account.php';
    include 'templates/footer.php';
  }
  
  private function _about_us(){
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'about-us.php';
    include 'templates/footer.php';
  }
  
  private function _logout(){
    if($this->hasSession('login')){
      $this->clearAll();
      header('location: index.php?module=home');
      exit;
    }
  }
  
 
}

?>
