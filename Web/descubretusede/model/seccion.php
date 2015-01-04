<?php
    
    class Seccion
    {
    	public $id_seccion;
		public $id_asignatura;
		public $id_aula;
		public $id_horario;
		public $jornada;
		public $profesor;
		
		function __construct(){
			$this->id_seccion='';
			$this->id_asignatura=0;
			$this->id_horario=0;
			$this->id_aula=0;
			$this->jornada='';
			$this->profesor='';
		}
		
		function init($id_seccion,$id_asignatura,$id_aula,$id_horario,$jornada,$profesor){
			$this->id_seccion=$id_seccion;
			$this->id_asignatura=$id_asignatura;
			$this->id_aula=$id_aula;
			$this->id_horario=$id_horario;
			$this->jornada=$jornada;
			$this->profesor=$profesor;
		}
		
		function __destruct(){
			unset($this);
		}
    }
?>