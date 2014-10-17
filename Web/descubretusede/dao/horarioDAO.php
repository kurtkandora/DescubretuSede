<?php
    require_once '../model/Horario.php';
    require_once 'db_abstract_model.php';
	require_once 'mysqldb.php';
	
	
	class horarioDAO extends DBAbstractModel{
	
		private $mysql_con; 
		
		function __construct(){
	 	$this->mysql_con = new MySqlCon();
	 }
		
		
		function insert($obj){
		try{
			$horario = new Horario();
			$horario = $obj;
		    $query = 'INSERT INTO `horario`(`id_horario`,`id_seccion`,`id_sala`,`dia_clases`,`hora_inicio`,`hora_termino`) VALUES (?,?,?,?,?,?)'; 
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iiisss",$horario->id_horario,$horario->id_seccion,$horario->id_sala,$horario->dia_clases,$horario->hora_inicio,$horario->hora_termino);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$horario->__destruct();
		}
		catch(exception $e){
        #exception arrastra solo el mensaje y Exception crea un objeto de si misma con otros atributos
			error_log($e);
			return false;
		}
	}

	function update($obj){
		try{
			$horario = new Horario();
			$horario = $obj;
		    $query = 'UPDATE `horario` SET `id_seccion`=?,`id_sala`=?,`dia_clases`=?,`hora_inicio`=?,`hora_termino`=? WHERE `id_horario`= ?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iisss",$horario->id_seccion,$horario->id_sala,$horario->dia_clases,$horario->hora_inicio,$horario->hora_termino);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$horario->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function delete($obj){
		try{
			$horario = new Horario();
			$horario = $obj;
			$query = 'DELETE FROM `horario` WHERE `id_horario=?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$horario->id_horario);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$horario->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function select(){
		$indice=0;
		$lista_horarios;
		try{
		
			$query = 'SELECT `id_horario`,`id_seccion`,`id_sala`,`dia_clases`,`hora_inicio`,`hora_termino` FROM `horario`';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_horario,$id_seccion,$id_sala,$dia_clases,$hora_inicio,$hora_termino);					
	            while($sentencia->fetch()){
	            	  $horario = new Horario();
					  $horario->id_horario = $id_horario;
					  $horario->id_seccion = $id_seccion;
					  $horario->id_sala = $id_sala;
					  $horario->dia_clases = $dia_clases;
					  $horario->hora_inicio = $hora_inicio;
					  $horario->fec_termino = $fec_termino;
					  
					  $lista_horarios[$indice]=$horario;
					  $indice++;
					  $horario->__destruct();
	            }	
			}
			$this->mysql_con->close();
		}
		catch(exception $e)
		{
			error_log($e);
			return false;
		}
		return $lista_horarios;
	}
	
	}
?>