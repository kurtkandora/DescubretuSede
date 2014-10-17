<?php
   require_once '../model/SabanaHoraria.php';
    require_once 'db_abstract_model.php';
	require_once 'mysqldb.php';
	
	
	class sabanaHorariaDAO extends DBAbstractModel{
	
		private $mysql_con; 
		
		function __construct(){
	 	$this->mysql_con = new MySqlCon();
	 }
		
		
		function insert($obj){
		try{
			$sabana = new sabanaHoraria();
			$sabana = $obj;
		    $query = 'INSERT INTO `sabana_horaria`(`id_sabana`,`id_sala`,`semestre`,`fec_inicio`,`fec_termino`,`fec_creacion`,`descrip_sabana`) VALUES (?,?,?,?,?,?,?)'; 
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iiissss",$sabana->id_sabana,$sabana->id_sala,$sabana->semestre,$sabana->fec_inicio,$sabana->fec_termino,$sabana->fec_creacion,$sabana->descrip_sabana);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$sabana->__destruct();
		}
		catch(exception $e){
        #exception arrastra solo el mensaje y Exception crea un objeto de si misma con otros atributos
			error_log($e);
			return false;
		}
	}

	function update($obj){
		try{
			$sabana = new SabanaHoraria();
			$sabana = $obj;
		    $query = 'UPDATE `sabana_horaria` SET `id_sala`=?,`semestre`=?,`fec_inicio`=?,`fec_termino`=?,`fec_creacion`=?,`descrip_sabana`=? WHERE `id_foto`= ?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iissss",$sabana->id_sala,$sabana->semestre,$sabana->fec_inicio,$sabana->fec_termino,$sabana->fec_creacion,$sabana->descrip_sabana);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$sabana->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function delete($obj){
		try{
			$sabana = new SabanaHoraria();
			$sabana = $obj;
			$query = 'DELETE FROM `sabana_horaria` WHERE `id_sabana`=?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$sabana->id_sabana);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$sabana->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function select(){
		$indice=0;
		$lista_sabanas;
		try{
		
			$query = 'SELECT `id_sabana`,`id_sala`,`semestre`,`fec_inicio`,`fec_termino`,`fec_creacion`,`descrip_sabana` FROM `sabana_horaria`';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_sabana,$id_sala,$semestre,$fec_inicio,$fec_termino,$fec_creacion,$descrip_sabana);					
	            while($sentencia->fetch()){
	            	  $sabana = new SabanaHoraria();
					  $sabana->id_sabana = $id_sabana;
					  $sabana->id_sala = $id_sala;
					  $sabana->semestre = $semestre;
					  $sabana->fec_inicio = $fec_inicio;
					  $sabana->fec_termino = $fec_termino;
					  $sabana->fec_creacion = $fec_creacion;
					  $sabana->descrip_sabana = $descrip_sabana;
					  $lista_sabanas[$indice]=$sabana;
					  $indice++;
					  $sabana->__destruct();
	            }	
			}
			$this->mysql_con->close();
		}
		catch(exception $e)
		{
			error_log($e);
			return false;
		}
		return $lista_sabanas;
	}
	
	}
?>