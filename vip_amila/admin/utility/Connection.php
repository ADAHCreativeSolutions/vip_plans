<?php
namespace admin\utility;

class Connection {
  //put your code here




	private $businessCategoryId;
		
	private $databasesArray = array(
//      'main'=>
//                                    array('databasename'=>'b22_13487272_viplansdb',
//                                      'username'=>'b22_13487272',
//                                      'password'=>'ganimubs',
//                                      'host'=>'sql107.byethost22.com'),
      'main'=>
                                    array('databasename'=>'icreate3_viplansdb',
                                      'username'=>'icreate3',
                                      'password'=>'GodIsSoGood{9}0',
                                      'host'=>'localhost'),
                                  'main'=>
                                    array('databasename'=>'viplansdb',
                                      'username'=>'root',
                                      'password'=>'',
                                      'host'=>'localhost'),
                                  'admin'=>
                                    array('databasename'=>'smile_again',
                                      'username'=>'admin',
                                      'password'=>'imadmin{2}[5]',
                                      'host'=>'localhost'),
                                  'general'=>
                                    array('databasename'=>'smile_again',
                                      'username'=>'general',
                                      'password'=>'imadmin{2}[5]',
                                      'host'=>'localhost'),
									
										);
	
	public $main;
  public $admin;
  public $general;
	
	function __construct(){
		$this->createConnection();
	}
	
	function isBCNull($bCObjName){
		
		if(is_null($this->{$bCObjName})){
			return true;
		}
		return false;
	}
	
	function getDatabaseDetails($businessCategory=''){
		if($businessCategory == '' || !is_array($this->databasesArray[$businessCategory])){
			$businessCategory = 'main';
		}
		//print_r($this->databasesArray[$businessCategory]);
		
		return $this->databasesArray[$businessCategory];
	}
	
	function createConnection($businessCategory=''){
		if($businessCategory == ''){
			$businessCategory = 'main';
		}
    
		$dbDetails = $this->getDatabaseDetails($businessCategory);
    
		if($this->isBCNull($businessCategory)){
			try{
       	$db = new \PDO("mysql:host=". $dbDetails['host'] .";dbname=". $dbDetails['databasename'] ."", '' . $dbDetails['username'] . '', '' . $dbDetails['password'] . '');
				
        switch($businessCategory){
					case 'main':$this->main = $db;
						break;
          case 'admin':$this->admin = $db;
						break;
          case 'general':$this->general = $db;
						break;				
					default:$this->main = $db;
				}
				
				
			}catch(\PDOException $e){// if any errors will print the exception
				echo $e->getMessage();
			}
		}
    
	}
	
	function isPermitted(){
    if(isset($_SESSION['login']) && is_array($_SESSION['login'])){
        $task = TRUE;
    }else{
        $task = FALSE;
    }
    return $task;
  }
}
?>