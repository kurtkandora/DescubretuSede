<?php
    require_once '../model/sala.php';
    require_once 'db_abstract_model.php';
	require_once 'mysqldb.php';
	
	
	class  salaDAO extends DBAbstractModel{
	
		private $mysql_con; 
		
		function __construct(){
	 	$this->mysql_con = new MySqlCon();
	 }
		
		
		function insert($obj){
		try{
			$sala = new Sala();
			$sala = $obj;
		    $query = 'INSERT INTO `sala`(`id_sala`,`nombre_sala`,`ubicacion_sala`,`capacidad`) VALUES (?,?,?,?)'; 
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("issi",$sala->id_sala,$sala->nombre_sala,$sala->ubicacion_sala,$sala->capacidad);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$usuario->__destruct();
		}
		catch(exception $e){
        #exception arrastra solo el mensaje y Exception crea un objeto de si misma con otros atributos
			error_log($e);
			return false;
		}
	}

	function update($obj){
		try{
			$sala = new Sala();
			$sala = $obj;
		    $query = 'UPDATE `sala` SET `nombre_sala`=?,`ubicacion_sala`=?,`capacidad`=? WHERE `id_sala`= ?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("ssi",$sala->nombre_sala,$sala->ubicacion_sala,$sala->capacidad,$sala->id_sala);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$usuario->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function delete($obj){
		try{
			$sala = new Sala();
			$sala = $obj;
			$query = 'DELETE FROM `sala` WHERE `id_sala`=?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$sala->id_sala);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$sala->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function select(){
		$indice=0;
		$lista_salas;
		try{
		
			$query = 'SELECT `id_sala`, `nombre_sala`, `ubicacion_sala`,`capacidad` FROM `sala`';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_sala,$nombre_sala,$ubicacion_sala,$capacidad);					
	            while($sentencia->fetch()){
	            	  $sala = new Sala();
					  $sala->id_sala = $id_sala;
					  $sala->nombre_sala = $nombre_sala;
					  $sala->ubicacion_sala = $ubicacion_sala;
					  $sala->capacidad = $capacidad;
					  $lista_salas[$indice]=$sala;
					  $indice++;
					  $sala->__destruct();
	            }	
			}
			$this->mysql_con->close();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
		return $lista_salas;
	}
	
	

	
	
	
	}
?>