<?php
    
    require_once '../utils/mysqldb.php';
	require_once '../model/foto_aula.php';
	require_once '../dao/ipersistencia.php';
	
	class FotoAulaDao implements IPersistencia
	{
		 private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	   
	    function create($obj)
	   {
	   	$fotoAula=new FotoAula();
		$fotoAula=$obj;
	   	try{
		    $query ='INSERT INTO `foto_aula`(`ID_FOTO`, `AULA`, `FECHA_FOTO`) VALUES (?,?,?)';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iss",$fotoAula->id_foto,$fotoAula->aula,$fotoAula->fecha_foto);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$fotoAula->__destruct();
		}
		catch(exception $e){
		 	 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	     function read($obj)
		{
	   	$fotoAula=new FotoAula();
		$fotoAula=$obj;
		try{
			$query = 'SELECT `ID_FOTO`, `AULA`, `FECHA_FOTO` FROM `foto_aula` WHERE `ID_FOTO`=? ;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$fotoAula->id_foto);
			if($sentencia->execute()){
				$sentencia->bind_result($id_foto,$foto,$fecha_foto);					
	            while($sentencia->fetch()){
					$fotoAula->__destruct();
					$fotoAula->init($id_foto, $aula, $fecha);
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $fotoAula;
	   }
		
		function update($obj){
	   	$fotoAula=new FotoAula();
		$fotoAula=$obj;
	   	try{
		    $query = 'UPDATE `foto_aula` SET `AULA`=?,`FECHA_FOTO`=? WHERE`ID_FOTO`=?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("ssi",$fotoAula->aula,$fotoAula->fecha_foto,$fotoAula->id_foto);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$fotoAula->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
		
		function delete($obj){
	    $fotoAula=new FotoAula();
		$fotoAula=$obj;
	   	try{
		    $query = '';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$fotoAula->id_foto);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			//$this->mysql_con->close();
			$fotoAula->__destruct();
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