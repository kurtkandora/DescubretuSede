<?php
    require_once '../utils/mysqldb.php';
	require_once '../model/sabana.php';
	require_once '../dao/ipersistencia.php';
	
	class SabanaDAO implements IPersistencia{
		
		private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	
	   function create($obj){
	   	$sabana = new Sabana();
		$sabana = $obj;
	   	try{
		    $query = 'INSERT INTO `sabana`(`ID_SABANA`, `ID_USUARIO`, `PERIODO`, `FECHA_INICIO`, `FECHA_TERMINO`, `FECHA_CREACION`, `DESCRIPCION_SABANA`) VALUES (?,?,?,?,?,?,?);';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iisssss",$sabana->id_sabana,$sabana->id_usuario,$sabana->periodo,$sabana->fecha_inicio,$sabana->fecha_termino,$sabana->fecha_creacion,$sabana->descripcion_sabana);
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
	   	$sabana = new Sabana();
		$sabana = $obj;
		try{
			   $query = 'SELECT `ID_SABANA`, `ID_USUARIO`, `PERIODO`, `FECHA_INICIO`, `FECHA_TERMINO`, `FECHA_CREACION`, `DESCRIPCION_SABANA` FROM `sabana` WHERE `ID_SABANA` = ?;';
			   $sentencia = $this->mysql_con->prepare($query);
			   $sentencia->bind_param("i",$sabana->id_sabana);
			if($sentencia->execute()){
				$sentencia->bind_result($id_sabana,$id_usuario, $periodo, $fecha_inicio, $fecha_termino, $fecha_creacion, $descripcion_sabana);					
	            while($sentencia->fetch()){
					$sabana->__destruct();
                    $sabana->init($id_sabana,$id_usuario, $periodo, $fecha_inicio, $fecha_termino, $fecha_creacion, $descripcion_sabana);
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $sabana;
	   }
	   
	   function update($obj){
	   	$sabana = new Sabana();
		$sabana = $obj;
	   	try{
		    $query = 'UPDATE `sabana` SET `ID_SABANA`=?,`ID_USUARIO`=?,`PERIODO`=?,`FECHA_INICIO`=?,`FECHA_TERMINO`=?,`FECHA_CREACION`=?,`DESCRIPCION_SABANA`=? WHERE `ID_SABANA`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("isssssi",$sabana->id_usuario,$sabana->periodo,$sabana->fecha_inicio,$sabana->fecha_termino,$sabana->fecha_creacion,$sabana->descripcion_sabana,$sabana->id_sabana);
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
	   	$sabana = new Sabana();
		$sabana = $obj;
	   	try{
		    $query = 'DELETE FROM `sabana` WHERE `ID_SABANA`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$sabana->id_sabana);
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
	   
	   function select(){
	   	$indice=0;
		$lista_sabana;
		try{
			$query = 'SELECT `ID_SABANA`, `ID_USUARIO`, `PERIODO`, `FECHA_INICIO`, `FECHA_TERMINO`, `FECHA_CREACION`, `DESCRIPCION_SABANA` FROM `sabana`;';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_sabana,$id_usuario, $periodo, $fecha_inicio, $fecha_termino, $fecha_creacion, $descripcion_sabana);					
	            while($sentencia->fetch()){
	            	  $sabana = new Sabana();
					  $sabana->init($id_sabana,$id_usuario, $periodo, $fecha_inicio, $fecha_termino, $fecha_creacion, $descripcion_sabana);
					  $lista_sabana[$indice]=$sabana;
					  $indice++;
					  $sabana->__destruct();
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $lista_sabana;
	   }
	   
	   function __destruct() {
	   	  $this->mysql_con->close();
          unset($this);
       }
	}
?>