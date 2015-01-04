<?php
    require_once '../utils/mysqldb.php';
	require_once '../model/aula.php';
	require_once '../dao/ipersistencia.php';
	
	class AulaDao implements IPersistencia
	{
	   private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	   
	    function create($obj)
	   {
	   	$aula=new Aula();
		$aula=$obj;
	   	try{
		    $query ='INSERT INTO `aula`(`ID_AULA`, `ID_SABANA`, `ID_FOTO`, `NOMBRE_AULA`, `DENOMINACION_AULA`, `CAPACIDAD_AULA`) VALUES (?,?,?,?,?,?)';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iiissi",$aula->id_aula,$aula->id_sabana,$aula->id_foto,$aula->nombre_aula,$aula->denominacion_aula,$aula->capacidad_aula);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$aula->__destruct();
		}
		catch(exception $e){
		 	 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
		
		function read($obj)
		{
	    $aula=new Aula();
		$aula=$obj;
		try{
			$query = 'SELECT `ID_AULA`, `ID_SABANA`, `ID_FOTO`, `NOMBRE_AULA`, `DENOMINACION_AULA`, `CAPACIDAD_AULA` FROM `aula` WHERE `ID_AULA`=? ;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$aula->id_aula);
			if($sentencia->execute()){
				$sentencia->bind_result($id_aula,$id_sabana,$id_foto,$nombre_aula,$denominacion_aula,$capacidad_aula);					
	            while($sentencia->fetch()){
					$aula->__destruct();
                    $aula->init($id_aula, $id_sabana, $id_foto, $nombre_aula, $denominacion_aula, $capacidad_aula);
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $aula;
	   }
		
	   function update($obj){
	   	$aula=new Aula();
		$aula=$obj;
	   	try{
		    $query = 'UPDATE `aula` SET `ID_SABANA`= ?,`ID_FOTO`=?,`NOMBRE_AULA`=?,`DENOMINACION_AULA`=?,`CAPACIDAD_AULA`=? WHERE `ID_AULA`=? ;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iissii",$aula->id_sabana,$aula->id_foto,$aula->nombre_aula,$aula->denominacion_aula,$aula->capacidad_aula,$aula->id_aula);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$aula->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function delete($obj){
	   	$aula=new Aula();
		$aula=$obj;
	   	try{
		    $query = 'DELETE FROM `aula` WHERE `ID_AULA`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$aula->id_aula);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$aula->__destruct();
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