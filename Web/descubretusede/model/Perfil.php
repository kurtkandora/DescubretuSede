<?php
    
	class Perfil {
		
		public $id_perfil;
	    public $tipo_perfil;
		
		function __construct(){
		   $this->id_perfil = 0;
		   $this->tipo_perfil = '';	   
	    }
		
		function init($id_perfil,$tipo_perfil){
			$this->$id_perfil  = $id_perfil;
			$this->tipo_perfil = $tipo_perfil;
		}
		
		function __destruct(){
			unset($this);
		}
	}
?>