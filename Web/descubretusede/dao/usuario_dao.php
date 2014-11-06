<?php
   
	require_once '../utils/mysqldb.php';
	require_once '../model/perfil.php';
	require_once '../dao/ipersistencia.php';
	
	class UsuarioDAO implements IPersistencia{
		
		private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	
	   function create($obj){
	   	$usuario = new Usuario();
		$usuario = $obj;
	   	try{
		    $query = 'INSERT INTO `usuario`(`ID_PERFIL`, `NOMBRE_USUARIO`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `RUN`, `EMAIL_USUARIO`) VALUES (?,?,?,?,?,?);';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("isssss",$usuario->id_perfil,$usuario->nombre_usuario,$usuario->apellido_paterno,$usuario->apellido_materno,$usuario->run,$usuario->email_usuario);
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
	   	$usuario = new Usuario();
		$usuario = $obj;
		try{
			   $query = 'SELECT `ID_USUARIO`, `ID_PERFIL`, `NOMBRE_USUARIO`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `RUN`, `EMAIL_USUARIO` FROM `usuario` WHERE `EMAIL_USUARIO`= ?;';
			   $sentencia = $this->mysql_con->prepare($query);
			   $sentencia->bind_param("s",$usuario->email_usuario);
			if($sentencia->execute()){
				$sentencia->bind_result($id_usuario, $id_perfil, $nombre_usuario, $apellido_paterno, $apellido_materno, $run, $email_usuario);					
	            while($sentencia->fetch()){
					$usuario->__destruct();
                    $usuario->init($id_usuario, $id_perfil, $nombre_usuario, $apellido_paterno, $apellido_materno, $run, $email_usuario);
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $usuario;
	   }
	   
	   function update($obj){
	   	$usuario = new Usuario();
		$usuario = $obj;
	   	try{
		    $query = 'UPDATE `usuario` SET `ID_PERFIL`=?,`NOMBRE_USUARIO`=?,`APELLIDO_PATERNO`=?,`APELLIDO_MATERNO`=?,`RUN`=? WHERE `ID_USUARIO`=? AND `EMAIL_USUARIO`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("sssssis",$usuario->id_perfil,$usuario->nombre_usuario,$usuario->apellido_paterno,$usuario->apellido_materno,$usuario->run,$usuario->id_usuario,$usuario->email_usuario);
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
	   
	   function delete($obj){
	   	$usuario = new Usuario();
		$usuario = $obj;
	   	try{
		    $query = 'DELETE FROM `usuario` WHERE `ID_USUARIO`=?;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$usuario->id_usuario);
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
		$lista_usuarios;
		try{
			$query = 'SELECT `ID_USUARIO`, `ID_PERFIL`, `NOMBRE_USUARIO`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `RUN`, `EMAIL_USUARIO` FROM `usuario`;';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_usuario, $id_perfil, $nombre_usuario, $apellido_paterno, $apellido_materno, $run, $email_usuario);					
	            while($sentencia->fetch()){
	            	  $usuario = new Usuario();
					  $usuario->init($id_usuario, $id_perfil, $nombre_usuario, $apellido_paterno, $apellido_materno, $run, $email_usuario);
					  $lista_usuarios[$indice]=$usuario;
					  $indice++;
					  $usuario->__destruct();
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $lista_usuarios;
	   }
	   
	   function __destruct() {
	   	  $this->mysql_con->close();
          unset($this);
       }
	}
?>