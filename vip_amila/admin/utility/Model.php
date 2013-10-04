<?php
namespace admin\utility;

class Model{
	public $tableName = '';
	public $primaryKey = array();
	public $detailedModel = array();
	public $result = null;	
	public $fieldsArray = array();
  public $conObj = null;

	function __construct($tableName){
    $conObj = new Connection();
    $this->conObj = $conObj->main;
		$this->tableName = $tableName;
					
	} // sets table name and primary key
	
	function entityGenerator(){
		$numericArray = array('TINYINT','SMALLINT','MEDIUMINT','INT','BIGINT');
		$dateTimeArray= array('DATE','DATETIME','TIME');
		$textArray    = array('CHAR','VARCHAR','TINYTEXT','TEXT','LONGTEXT','TINYBLOB','MEDIUMBLOB','BLOB','LONGBLOB','ENUM');
		
		$sql = "DESCRIBE " . $this->tableName;
		$stmt = $this->conObj->prepare($sql);
		$stmt->execute();
		$rowAll = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$fieldsArray = array();
		foreach($rowAll as $key=>$val){
			$typeVar = explode('(',strtoupper($val['Type']));	
			
			if(in_array($typeVar[0],$numericArray)){
				$type = 'Numeric';
				$maxLength = explode(')',$typeVar[1]);
				
			}else if(in_array($typeVar[0],$textArray)){
				$type = 'String';
				if($typeVar[0] == 'ENUM'){
					$type = 'Enum';
					$maxLength = explode(')',$typeVar[1]);
					$maxLength2 = str_replace("'", "", $maxLength[0]);
					$enumsArr = explode(',',$maxLength2);
					$maxLength[0] = 1;
					
				}else{
					$maxLength = explode(')',$typeVar[1]);
				}
			}else if(in_array($typeVar[0],$dateTimeArray)){
				$type = 'Date';
			}else{
				$type = 'Undefined';
			}
			if($val['Default'] == '' && $val['Null'] == 'NO'){
				switch($type){
					case 'Numeric' : $default = 0;
					break;
					case 'String' : $default = ' ';
					break;
					case 'Date' : $default = '';
					break;
					default : $default = '';
				}
			}else{
				$default = $val['Default'];
			}
			if($val['Key'] == 'PRI'){
				$this->primaryKey[$val['Field']] = $val['Field'];
				$default = 'undefined';
			}
			
			//$fieldsArray[$this->tableName][$val['Field']]['type'] 	=  $type;
			if($type == 'Enum'){
				$fieldsArray[$this->tableName][$val['Field']]['type'][$type] = $enumsArr;
			}else{
				$fieldsArray[$this->tableName][$val['Field']]['type'] 	=  $type;
			}
			$fieldsArray[$this->tableName][$val['Field']]['max']  	=  $maxLength[0];
			$fieldsArray[$this->tableName][$val['Field']]['default']= $default;
		}
		$this->fieldsArray = $fieldsArray;
		return $fieldsArray;
	}
	function insertData($dataArray){
    
		$fields = '';
		$values = '';
		$sql    = '';
		if(sizeof($dataArray) > 0){
			$j = sizeof($dataArray);
			$i = 1;
      $keysOnly = array_keys($dataArray);
      
      $fields = implode(',', $keysOnly);
      $keysOnly[0] = ':' . $keysOnly[0];      
      $values = implode(',:', $keysOnly);			
			$sql = "INSERT INTO " . $this->tableName . " (" . $fields . ") VALUES(" . $values . ")";
	
			$stmt = $this->conObj->prepare($sql);
     
			try{
				$stmt->execute($dataArray);
				$resultArray['SuccessID'] = $this->conObj->lastInsertId();
			}catch(Exception $e){
				echo($e->getMessage());
			
			}
			
      
			
		}else{
			//throw an Exception;
			$resultArray = array("Error"=>"Required information missing");
		}
		//$rowAll = array('elakiri'=>1);
		
		//$this->result =json_encode($resultArray);
		//echo($resultArray);
		return $resultArray;
	}
	
	function retrieveData($fieldsArray,$numofRecs=10){
		
		$j = sizeof($fieldsArray);
		$i = 1;
		$valI = "";
		if($j > 0){
			
			foreach($fieldsArray as $key=>$val){
				$valI .= $key;
				if($j==$i){
					
				}else{
					$valI .= ',';
				}
				++$i;
			}
		}else{
			$valI = ' * ';
		}
			$sql = "SELECT " . $valI . " FROM " . $this->tableName . " LIMIT " . $numofRecs;
			
			$stmt = $this->conObj->prepare($sql);
			$stmt->execute($fieldsArray);
			$rowAll = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			//print_r($rowAll);
			//$rowAll['123'] = 'aas';
			//print_r();
			//echo(json_encode($rowAll));
			//$this->result = json_encode($rowAll);
			return  $rowAll;
		
		
	}
	
	function retrieveDatum($fieldsArray,$numofRec=10,$where=array()){
		
		if(sizeof($where)< 1){
			$rowAll = $this->retrieveData($fieldsArray,$numofRec);
		}else{
			$j = sizeof($fieldsArray);
			$i = 1;
			$valI = "";
			if($j > 0){				
				foreach($fieldsArray as $key=>$val){
					$valI .= $key;
					if($j==$i){
						
					}else{
						$valI .= ',';
					}
					++$i;
				}
			}else{
				$valI = ' * ';
			}
			
			$k = sizeof($where);
			$l = 1;
			$whrSt = '';
			if($k > 0){
					$whrSt .= ' WHERE ';
				foreach($where as $kk=>$vv){
					//if(!is_null($dataArray[$vv])){
						if($l == $k || $l == 0){
							$whrSt .= $kk . '=:' . $kk . ' ';		
						}else{
							$whrSt .= $kk . '=:' . $kk . ' AND ';	
						}
						++$l;
					//}else{
						//throw an exception
						
					//}
					
				}
				
			}
			
			$sql = "SELECT " . $valI . " FROM " . $this->tableName . " " . $whrSt . " LIMIT " . $numofRec;
			//echo $sql;
			$stmt = $this->conObj->prepare($sql);
			try{
				$stmt->execute($where);
				if($numofRec > 1){
					$rowAll = $stmt->fetchAll(\PDO::FETCH_ASSOC);
				}else{
					$rowAll = $stmt->fetch(\PDO::FETCH_ASSOC);
				}
				//print_r($rowAll);
			}catch(\PDOException $e){
				print_r($e);
			}			
		}
		$this->result = json_encode($rowAll);
		return  $rowAll;
	}
	
	function updateData($dataArray,$where){
			
		$fields = '';
		$values = '';
		$sql    = '';
		if(sizeof($dataArray) > 0){
			$j = sizeof($dataArray);
			$i = 1;
									
			foreach($dataArray as $key=>$val){
				if(in_array($key,$where)){
					
				}else{
				$fields .= $key . '=:' . $key;
				if($i == $j){
					
				}else{
					$fields .= ',';
				}			
				}
			
				++$i;
				
			}
			$k = sizeof($where);
			$l = 1;
			$whrSt = '';
			if($k > 0){
					$whrSt .= ' WHERE ';
				foreach($where as $kk=>$vv){
					//if(!is_null($dataArray[$vv])){
						if($l == $k || $l == 0){
							$whrSt .= $kk . '=:' . $kk . ' ';		
						}else{
							$whrSt .= $kk . '=:' . $kk . ' AND ';	
						}
						++$l;
					//}else{
						//throw an exception
						
					//}
					
				}
				
			}
			
			
			$sql = "UPDATE " . $this->tableName . " SET " . $fields . " " . $whrSt . "";
			
			
			$stmt = $this->conObj->prepare($sql);
			try{
				$stmt->execute($dataArray);
				//$rowAll = array('Success'=>'Successfully Updated');
				$rowAll['SuccessID'] = 'Successfully Updated';
			}catch(\PDOException $e){
				print_r($e);
			}
			//print_r($rowAll);
			//echo($sql);
			
		}else{
			$rowAll = array('Error'=>'Required Information Missing');
		}
		
		$this->result = json_encode($rowAll);
		return  json_encode($rowAll);
	}
	
	function deleteData(){
	
	}

	function complexQuery($sql,$type,$dataArray,$num=0){
		
		if($num > 0){
			$type="selectAll";
		}
		$stmt = $this->conObj->prepare($sql);
		try{
			$stmt->execute($dataArray);
			switch($type){
				case 'select': $rowAll = $stmt->fetch(\PDO::FETCH_ASSOC);
					break;
				case 'selectAll': $rowAll = $stmt->fetchAll(\PDO::FETCH_ASSOC);
					break;
				case 'insert': ;
					break;
				case 'update': $rowAll = array('Success'=>'Successfully Updated');
					break;
			}
			return $rowAll;
		}catch(\Exception $e){
			print_r($e);
		}
		
		
	}
	

}

?>