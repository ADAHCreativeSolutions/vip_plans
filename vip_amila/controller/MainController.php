<?php
namespace vip\controller;

class MainController extends \vip\utility\Controller{
  
  function __construct() {
    parent::__construct();
   
    $this->module = $this->getParameter('module');
    
    
      switch($this->module){
        case 'about-us': $this->_about_us();
          break;
        case 'contact-us': $this->_contact_us();
          break;
         case 'member': $memberController =  new MemberController();
          break;
        case 'user': $userController =  new UserController();
          break;
        case 'error': $this->_error();
          break;
        case '': $this->_home();
          break;
        case 'home': $this->_home();
          break;
        case 'search': $searchController = new SearchController();
          break;
        case 'faq': $this->_faq();
          break;
        case 'blog': $this->_blog();
          break;
        case 'venue': $venueController = new VenueController();
          break;  
        case 'event': $eventController = new EventController();
          break;
        default: $this->_error();
      }
    
  }
  
  private function _default(){
    $moduleTitle  = 'Administration Home'; 
    $subTasks     = array();
    $module = $this->module;
    include 'templates/header.php';
    include 'templates/main_bar.php';
    include 'templates/modules.php';
    include 'templates/module_body.php';
    include 'view/index.php';
    include 'templates/footer.php';
  }
  
  private function _error(){
    include '404.php';
  }
  
  private function _home(){
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    
    include 'home.php';
    include 'templates/footer.php';
  }
  
  private function _contact_us(){
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'contact-us.php';
    include 'templates/footer.php';
  }
  
  private function _about_us(){
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'about-us.php';
    include 'templates/footer.php';
  }
  
  private function _faq(){
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'faq.php';
    include 'templates/footer.php';
  }
  
  private function _blog(){
    include 'templates/header.php';
    include 'templates/navigation.php'; 
    include 'templates/search.php'; 
    include 'blog.php';
    include 'templates/footer.php';
  }
  
 
}

?>
