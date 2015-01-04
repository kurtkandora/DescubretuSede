<?php
    require_once '../utils/mysqldb.php';
	require_once '../model/password.php';
	require_once '../dao/ipersistencia.php';
	
	class PasswordDAO implements IPersistencia{
		
		private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	
	   function create($obj){
	   	$password = new Password();
	    $password = $obj;
	   	try{
		    $query = 'INSERT INTO `password`(`ID_USUARIO`, `HASH_PASS`, `FECHA_CADUCIDAD`, `ESTADO_PASS`) VALUES (?,?,?,?);';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("isss",$password->id_usuario,$password->hash_pass,$password->fecha_caducidad,$password->estado_pass);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$password->__destruct();
		}
		catch(exception $e){
		 	 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function read($obj){
	   	$password = new Password();
		$password = $obj;
		try{
			$query = 'SELECT `ID_USUARIO`, `HASH_PASS`, `FECHA_CADUCIDAD`, `ESTADO_PASS` FROM `password` WHERE `ID_USUARIO` = ? AND `ESTADO_PASS` = ?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("is",$password->id_usuario,$password->estado_pass);
			if($sentencia->execute()){
				$sentencia->bind_result($id_usuario, $hash_pass, $fecha_caducidad, $estado_pass);					
	            while($sentencia->fetch()){
					$password->__destruct();
                    $password->init($id_usuario, $hash_pass, $fecha_caducidad, $estado_pass);
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $password;
	   }
	   
	   function update($obj){
	   	$password = new Password();
		$password = $obj;
	   	try{
		    $query = 'UPDATE `password` SET `HASH_PASS`=?,`FECHA_CADUCIDAD`=?,`ESTADO_PASS`=? WHERE `ID_USUARIO`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("sssi",$password->hash_pass,$password->fecha_caducidad,$password->estado_pass,$password->id_usuario);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$password->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function delete($obj){
	   	$password = new Password();
		$password = $obj;
	   	try{
		    $query = 'DELETE FROM `password` WHERE `ID_USUARIO`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$password->id_usuario);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$password->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function select(){
	   	$password = new Password();
	//	$password = $obj;
		try{
			$query = 'SELECT `ID_USUARIO`, `HASH_PASS`, `FECHA_CADUCIDAD`, `ESTADO_PASS` FROM `password`;';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_usuario, $hash_pass, $fecha_caducidad, $estado_pass);					
	            while($sentencia->fetch()){
					$password->__destruct();
                    $password->init($id_usuario, $hash_pass, $fecha_caducidad, $estado_pass);
	            }	
			}
			$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $password;
	   }
	   
	   function __destruct() {
	   	 // $this->mysql_con->close();
          unset($this);
       }
	}
?>