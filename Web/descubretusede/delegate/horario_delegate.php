<?php
require_once '../dao/horario_dao.php';
	class horarioDelegate{
		
		public $horario_dao;
		
		function __construct(){
			$this->horario_dao = new HorarioDao;
		}
		
		function eliminarHorario(Horario $horario)
		{
			if($this->horario_dao->delete($horario)){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		
	    function select(){
		  
		}
		
		function update(Horario $horario){
			$lista_horario = $this->horario_dao->update($horario);
			return $lista_horario;
		}
		  
		function __destruct(){
			$this->horario_dao->__destruct();
			unset($this);
		}
	}
?>