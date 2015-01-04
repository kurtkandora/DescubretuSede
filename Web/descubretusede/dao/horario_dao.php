<?php
    require_once '../utils/mysqldb.php';
	require_once '../model/horario.php';
	require_once '../dao/ipersistencia.php';
	
	class HorarioDao implements IPersistencia
	{
	   private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	   
	   function create($obj)
	   {
	   	$horario = new Horario();
	    $horario= $obj;
	   	try{
		    $query ='INSERT INTO horario(ID_HORARIO, DIA_CLASES, HORA_INICIO, HORA_TERMINO) VALUES (?,?,?,?)';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("isss",$horario->id_horario,$horario->dia_clase,$horario->hora_inicio,$horario->hora_termino);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$horario->__destruct();
		}
		catch(exception $e){
		 	 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function read($obj){
	   	$horario = new Horario();
	    $horario= $obj;
		try{
			$query = 'SELECT `ID_HORARIO`, `DIA_CLASES`, `HORA_INICIO`, `HORA_TERMINO` FROM `horario` WHERE `ID_HORARIO`= ? ;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$horario->id_horario);
			if($sentencia->execute()){
				$sentencia->bind_result($id_horario,$dia_clase, $hora_inicio, $hora_termino);					
	            while($sentencia->fetch()){
					$horario->__destruct();
                    $horario->init($id_horario,$dia_clase, $hora_inicio, $hora_termino);
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $horario;
	   }
	   
	   function update($obj){
	   	$horario = new Horario();
	    $horario= $obj;
	   	try{
		    $query = 'UPDATE `horario` SET `DIA_CLASES`=?,`HORA_INICIO`=?,`HORA_TERMINO`=? WHERE `ID_HORARIO`= ? ; ';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("sssi",$horario->dia_clase,$horario->hora_inicio,$horario->hora_termino,$horario->id_horario);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$horario->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function delete($obj){
	    $horario = new Horario();
	    $horario= $obj;
	   	try{
		    $query = 'DELETE FROM `horario` WHERE `ID_HORARIO`=? ;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$horario->id_horario);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$horario->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function select(){
	   	
	   }
	   
	   function __destruct() {
	   	  $this->mysql_con->close();
          unset($this);
       }
	}

?>