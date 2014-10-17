<?php
    require_once '../model/Seccion.php';
    require_once 'db_abstract_model.php';
	require_once 'mysqldb.php';
	
	
	class seccionDAO extends DBAbstractModel{
	
		private $mysql_con; 
		
		function __construct(){
	 	$this->mysql_con = new MySqlCon();
	 }
		
		
		function insert($obj){
		try{
			$seccion = new Seccion();
			$seccion = $obj;
		    $query = 'INSERT INTO `seccion`(`id_seccion`,`id_asignatura`,`numero_secc`,`jornada`,`profesor`) VALUES (?,?,?,?,?)'; 
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iiiss",$seccion->id_seccion,$seccion->id_asignatura,$seccion->numero_secc,$seccion->jornada,$seccion->profesor);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$seccion->__destruct();
		}
		catch(exception $e){
        #exception arrastra solo el mensaje y Exception crea un objeto de si misma con otros atributos
			error_log($e);
			return false;
		}
	}

	function update($obj){
		try{
			$seccion = new Seccion();
			$seccion = $obj;
		    $query = 'UPDATE `seccion` SET `id_asignatura`=?,`numero_secc`=?,`jornada`=?,`profesor`=? WHERE `id_seccion`= ?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iiss",$seccion->id_asignatura,$seccion->numero_secc,$seccion->jornada,$seccion->profesor);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$seccion->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function delete($obj){
		try{
			$seccion = new Seccion();
			$seccion = $obj;
			$query = 'DELETE FROM `seccion` WHERE `id_seccion`=?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$seccion->id_seccion);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$seccion->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function select(){
		$indice=0;
		$lista_secciones;
		try{
		
			$query = 'SELECT `id_seccion`,`id_asignatura`,`numero_secc`,`jornada`,`profesor` FROM `seccion`';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_seccion,$id_asignatura,$numero_secc,$jornada,$profesor);					
	            while($sentencia->fetch()){
	            	  $seccion = new Seccion();
					  $seccion->id_seccion = $id_seccion;
					  $seccion->id_asignatura = $id_asignatura;
					  $seccion->numero_secc = $numero_secc;
					  $seccion->jornada = $jornada;
					  $seccion->profesor = $profesor;
					  $lista_secciones[$indice]=$seccion;
					  $indice++;
					  $seccion->__destruct();
	            }	
			}
			$this->mysql_con->close();
		}
		catch(exception $e)
		{
			error_log($e);
			return false;
		}
		return $lista_secciones;
	}
	
	}
?>