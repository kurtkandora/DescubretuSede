<?php
    class Sabana
    {
    	public $id_sabana;
		public $id_usuario;
		public $periodo;
		public $fecha_inicio;
		public $fecha_termino;
		public $fecha_creacion;
		public $descripcion_sabana;
		
		function __construct()
		{
			$this->id_sabana=0;
			$this->id_usuario=0;
			$this->periodo='';
			$this->fecha_inicio='';
			$this->fecha_termino='';
			$this->fecha_creacion='';
			$this->descripcion_sabana='';
		}
		
		function init($id_sabana,$id_usuario,$periodo,$fecha_inicio,$fecha_termino,$fecha_creacion,$descripcion)
		{
			$this->id_sabana=$id_sabana;
			$this->id_usuario=$id_usuario;
			$this->periodo=$periodo;
			$this->fecha_inicio=$fecha_inicio;
			$this->fecha_termino=$fecha_termino;
			$this->fecha_creacion=$fecha_creacion;
			$this->descripcion_sabana=$descripcion;
		}
		
		function __destruct(){
			unset($this);
		}
    }
?>