<?php
   require_once '../dao/sabana_dao.php';
	class SabanaDelegate{
		
		public $sabana_dao;
		
		function __construct(){
			$this->sabana_dao = new SabanaDAO();
		}
		
		function eliminarSabana(Sabana $sabana)
		{
			if($this->sabana_dao->delete($sabana)){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		
	    function select(){
		  	$lista_sabana = $this->sabana_dao->select();
			return $lista_sabana;
		}
		
		function update(Sabana $sabana){
			$lista_sabana = $this->sabana_dao->update($sabana);
			return $lista_sabana;
		}
		  
		function __destruct(){
			$this->sabana_dao->__destruct();
			unset($this);
		}
	}
?>