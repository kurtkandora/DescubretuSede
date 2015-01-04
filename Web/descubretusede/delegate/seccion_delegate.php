<?php
    require_once '../dao/seccion_dao.php';
	class SeccionDelegate{
		
		public $seccion_dao;
		
		function __construct(){
			$this->seccion_dao = new SeccionDao();
		}
		
		function create($seccion)
		{
			if($this->seccion_dao->create($seccion)){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		
		function LeerSeccion($seccionCod)
		{
			if($this->seccion_dao->read($seccionCod)){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		
		function ModificarSeccion($seccion)
		{
			if($this->seccion_dao->update($seccion)){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		
		function eliminarSeccion($seccionCod)
		{
			if($this->seccion_dao->delete($seccionCod)){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		function selectPorHoraInicio($hora){
			$lista_secciones = $this->seccion_dao->selectPorHoraInicio($hora);
			return $lista_secciones;
		}
		
		function selectPorHoraTermino($hora)
		{
			$lista_secciones = $this->seccion_dao->selectPorHoraTermino($hora);
			return $lista_secciones;
		}
		
		function selectPorSession($seccion)
		{
			$lista_secciones = $this->seccion_dao->selectPorSession($seccion);
			return $lista_secciones;
		}
		
		function selectPorDocente($nombreDocente)
		{
			$lista_secciones = $this->seccion_dao->selectPorDocente($nombreDocente);
			return $lista_secciones;
		}
		
	    function selectPorAsignatura($asignatura){
		 	$lista_secciones = $this->seccion_dao->selectPorAsignatura($asignatura);
			return $lista_secciones;
		}
		 
		function selectPorAula($sala){
		  	$lista_secciones = $this->seccion_dao->selectPorAula($sala);
			return $lista_secciones;
		}
		
		function selectPorJornada($jornada){
			$lista_secciones = $this->seccion_dao->selectPorJornada($jornada);
			return $lista_secciones;
		}
		
		function selectPorDia($dia){
		 	$lista_secciones = $this->seccion_dao->selectPorDia($dia);
			return $lista_secciones;
		}
		 
	    function select(){
		  	$lista_secciones = $this->seccion_dao->select();
			return $lista_secciones;
		}
		  
		function __destruct(){
			$this->seccion_dao->__destruct();
			unset($this);
		}
	}
?>