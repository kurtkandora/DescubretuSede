<?php
    
    require_once '../utils/mysqldb.php';
	require_once '../model/perfil.php';
	require_once '../dao/ipersistencia.php';
	
	class PerfilDAO implements IPersistencia{
		
	   private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	
	   function create($obj){
	   	
	   }
	   
	   function read($obj){
	   	$perfil = new Perfil();
		$perfil = $obj;
		try{
			$query = 'SELECT `ID_PERFIL`, `TIPO_PERFIL` FROM `perfil` WHERE `ID_PERFIL`= ?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$perfil->id_perfil);
			if($sentencia->execute()){
				$sentencia->bind_result($id_perfil,$tipo_perfil);					
	            while($sentencia->fetch()){
	            	  $perfil->__destruct();
					  $perfil->init($id_perfil, $tipo_perfil);
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $perfil;
	   }
	   
	   function update($obj){
	   	
	   }
	   
	   function delete($obj){
	   	
	   }
	   
	   function select(){
	   	$indice=0;
		$lista_perfiles;
		try{
			$query = 'SELECT `ID_PERFIL`, `TIPO_PERFIL` FROM `perfil`;';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_perfil,$tipo_perfil);					
	            while($sentencia->fetch()){
	            	  $perfil = new Perfil();
					  $perfil->init($id_perfil, $tipo_perfil);
					  $lista_perfiles[$indice]=$perfil;
					  $indice++;
					  $perfil->__destruct();
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $lista_perfiles;
	   }
	   
	   function __destruct() {
	   	  $this->mysql_con->close();
          unset($this);
       }
	}
?>