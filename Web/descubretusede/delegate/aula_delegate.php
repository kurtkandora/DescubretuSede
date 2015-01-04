<?php
	require_once '../dao/aula_dao.php';
	class AulaDelegate{
		
		public $aula_dao;
		
		function __construct(){
			$this->aula_dao = new AulaDao();
		}
		
		function eliminarAula(Aula $aula)
		{
			if($this->aula_dao->delete($aula)){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		
	    function select(){
		  	$lista_aula = $this->aula_dao->select();
			return $lista_aula;
		}
		
		function update(Aula $aula){
			$lista_aula = $this->aula_dao->update($aula);
			return $lista_aula;
		}
		  
		function __destruct(){
			$this->aula_dao->__destruct();
			unset($this);
		}
	}
?>