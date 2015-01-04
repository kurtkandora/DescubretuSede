<?php

    class Usuario {
		
		public $id_usuario;
	    public $id_perfil;
		public $nombre_usuario;
		public $apellido_paterno;
		public $apellido_materno;
		public $run;
		public $email_usuario;
		
		function __construct(){
		   $this->id_usuario = 0;
	       $this->id_perfil = 0;
		   $this->nombre_usuario = '';
		   $this->apellido_paterno = '';
		   $this->apellido_materno = '';
		   $this->run = '';
		   $this->email_usuario = ''; 
	    }
		
		function init($id_usuario,$id_perfil,$nombre_usuario,$apellido_paterno,$apellido_materno,$run,$email_usuario){
		   $this->id_usuario = $id_usuario;
	       $this->id_perfil = $id_perfil;
		   $this->nombre_usuario = $nombre_usuario;
		   $this->apellido_paterno = $apellido_paterno;
		   $this->apellido_materno = $apellido_materno;
		   $this->run = $run;
		   $this->email_usuario = $email_usuario; 
		}
		
		function __destruct(){
			unset($this);
		}
	}
?>