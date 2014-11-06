<?php
    class Password{
		
		public $id_usuario;
	    public $hash_pass;
		public $fecha_caducidad;
		public $estado_pass;
		
		function __construct(){
		  	$this->id_usuario = 0;
	        $this->hash_pass = '';
		    $this->fecha_caducidad = '';
		    $this->estado_pass = '';   
	    }
		
		function init($id_usuario,$hash_pass,$fecha_caducidad,$estado_pass){
			$this->id_usuario = $id_usuario;
	        $this->hash_pass = $hash_pass;
		    $this->fecha_caducidad = $fecha_caducidad;
		    $this->estado_pass = $estado_pass;   
		}
		
		function __destruct(){
			unset($this);
		}
	}
?>