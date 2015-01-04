<?php
    class Asignatura
    {
    	public $id_asignatura;
		public $nombre_asignatura;
		public $sigla_asignatura;
		
		function __construct(){
			$this->id_asignatura=0;
			$this->nombre_asignatura='';
			$this->sigla_asignatura='';
		}
		
		function init($id_asignatura,$nombre_asignatura,$sigla_asignatura){
			$this->id_asignatura=$id_asignatura;
			$this->nombre_asignatura=$nombre_asignatura;
			$this->sigla_asignatura=$sigla_asignatura;
		}
		
		function __destruct(){
			unset($this);
		}
    }
	
?>