<?php
    
    class FotoAula
    {
    	public $id_foto;
		public $aula;
		public $fecha_foto;
		
		function __construct()
		{
			$this -> id_foto=0;
			$this -> aula='';
			$this-> fecha_foto='';
		}
		
		function init($id_foto,$aula,$fecha)
		{
			$this->id_foto=$id_foto;
			$this->aula=$aula;
			$this->fecha_foto=$fecha;
		}
		
		function __destruct(){
			unset($this);
		}
    }
?>