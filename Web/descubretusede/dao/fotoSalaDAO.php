<?php
    require_once '../model/FotoSala.php';
    require_once 'db_abstract_model.php';
	require_once 'mysqldb.php';
	
	
	class  fotoSalaDAO extends DBAbstractModel{
	
		private $mysql_con; 
		
		function __construct(){
	 	$this->mysql_con = new MySqlCon();
	 }
		
		
		function insert($obj){
		try{
			$fotosala = new FotoSala();
			$fotosala = $obj;
		    $query = 'INSERT INTO `foto_sala`(`id_foto`,`id_sala`,`foto_sala`,`fecha_foto`) VALUES (?,?,?,?)'; 
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iiss",$fotosala->id_foto,$fotosala->id_sala,$fotosala->foto_sala,$fotosala->fecha_foto);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$fotosala->__destruct();
		}
		catch(exception $e){
        #exception arrastra solo el mensaje y Exception crea un objeto de si misma con otros atributos
			error_log($e);
			return false;
		}
	}

	function update($obj){
		try{
			$fotosala = new FotoSala();
			$fotosala = $obj;
		    $query = 'UPDATE `foto_sala` SET `id_sala`=?,`foto_sala`=?,`fecha_foto`=? WHERE `id_foto`= ?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iss",$fotosala->id_sala,$fotosala->foto_sala,$fotosala->fecha_foto);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$fotosala->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function delete($obj){
		try{
			$fotosala = new FotoSala();
			$fotosala = $obj;
			$query = 'DELETE FROM `foto_sala` WHERE `id_foto`=?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$fotosala->id_foto);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return true;
			}else{
				$this->mysql_con->rollback();
				return false;
			}
			$this->mysql_con->close();
			$fotosala->__destruct();
		}
		catch(exception $e){
			error_log($e);
			return false;
		}
	}
	
	function select(){
		$indice=0;
		$lista_fotosalas;
		try{
		
			$query = 'SELECT `id_foto`, `id_sala`, `foto_sala`,`fecha_foto` FROM `foto_sala`';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_foto,$id_sala,$foto_sala,$fecha_foto);					
	            while($sentencia->fetch()){
	            	  $fotosala = new FotoSala();
					  $fotosala->id_foto = $id_foto;
					  $fotosala->id_sala = $id_sala;
					  $fotosala->foto_sala = $foto_sala;
					  $fotosala->fecha_foto = $fecha_foto;
					  $lista_fotosalas[$indice]=$fotosala;
					  $indice++;
					  $fotosala->__destruct();
	            }	
			}
			$this->mysql_con->close();
		}
		catch(exception $e)
		{
			error_log($e);
			return false;
		}
		return $lista_fotosalas;
	}
	
	}
?>