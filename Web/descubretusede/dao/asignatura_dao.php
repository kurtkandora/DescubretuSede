<?php
require_once '../utils/mysqldb.php';
	require_once '../model/asignatura.php';
	require_once '../dao/ipersistencia.php';
	
	class AsignaturaDAO implements IPersistencia{
		
		private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	
	   function create($obj){
	   	$asignatura = new Asignatura();
		$asignatura = $obj;
	   	try{
		    $query = 'INSERT INTO `asignatura`(`ID_ASIGNATURA`,`NOMBRE_ASIGNATURA`, `SIGLA_ASIGNATURA`) VALUES (?,?,?);';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iss",$asignatura->id_asignatura,$asignatura->nombre_asignatura,$asignatura->sigla_asignatura);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$usuario->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function read($obj){
	   	$asignatura = new Asignatura();
		$asignatura = $obj;
		try{
			   $query = 'SELECT `ID_ASIGNATURA`, `NOMBRE_ASIGNATURA`, `SIGLA_ASIGNATURA` FROM `asignatura` WHERE `ID_ASIGNATURA`=?;';
			   $sentencia = $this->mysql_con->prepare($query);
			   $sentencia->bind_param("i",$asignatura->id_asignatura);
			if($sentencia->execute()){
				$sentencia->bind_result($id_asignatura,$nombre_asignatura, $sigla_asignatura);					
	            while($sentencia->fetch()){
					$asignatura->__destruct();
                    $asignatura->init($id_asignatura,$nombre_asignatura, $sigla_asignatura);
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $asignatura;
	   }
	   
	   function update($obj){
	   	$asignatura = new Asignatura();
		$asignatura = $obj;
	   	try{
		    $query = 'UPDATE `asignatura` SET `NOMBRE_ASIGNATURA`=?,`SIGLA_ASIGNATURA`=? WHERE `ID_ASIGNATURA`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("ssi",$asignatura->nombre_asignatura,$asignatura->sigla_asignatura,$asignatura->id_asignatura);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$sentencia->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function delete($obj){
	   	$asignatura = new Asignatura();
		$asignatura = $obj;
	   	try{
		    $query = 'DELETE FROM `asignatura` WHERE `ID_ASIGNATURA`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$asignatura->id_asignatura);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$asignatura->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function select(){
	   	$indice=0;
		$lista_asignaturas;
		try{
			$query = 'SELECT `ID_ASIGNATURA`, `NOMBRE_ASIGNATURA`, `SIGLA_ASIGNATURA` FROM `asignatura`;';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_asignatura,$nombre_asignatura, $sigla_asignatura);					
	            while($sentencia->fetch()){
	            	  $asignatura = new Asignatura();
					  $asignatura->init($id_asignatura, $nombre_asignatura, $sigla_asignatura);
					  $lista_asignaturas[$indice]=$asignatura;
					  $indice++;
					  $asignatura->__destruct();
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $lista_asignaturas;
	   }
	   
	   function __destruct() {
	   	  $this->mysql_con->close();
          unset($this);
       }
	}
?>