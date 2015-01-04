<?php
    class Horario
    {
    	public $id_horario;
		public $dia_clase;
		public $hora_inicio;
		public $hora_termino;
		
		function __construct()
		{
			$this->id_horario=0;
			$this->dia_clase='';
			$this->hora_inicio='';
			$this->hora_termino='';
		}
		
		function init($id_horario,$dia_clase,$hora_inicio,$hora_termino)
		{
			$this->id_horario=$id_horario;
			$this->dia_clase=$dia_clase;
			$this->hora_inicio=$hora_inicio;
			$this->hora_termino=$hora_termino;
		}
		
		function __destruct(){
			unset($this);
		}
    }
?>