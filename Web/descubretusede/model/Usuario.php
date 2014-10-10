<?php
    class Usuario {
 	public $id_usuario;
	public $id_perfil;
	public $nombres;
	public $ape_materno;
	public $ape_paterno;
	public $rut;
	public $correo_electronico;
	
	function __construct()
	{
	}
 	
	function init($id_usuario,$id_perfil,$nombres,$ape_materno,$ape_paterno,$rut,$correo_electronico)
	{
		$this->id_usuario=$id_usuario;
		$this->id_perfil=$id_perfil;
		$this->nombres=$nombres;
		$this->ape_materno=$ape_materno;
		$this->ape_paterno=$ape_paterno;
		$this->rut=$rut;
		$this->correo_electronico=$correo_electronico;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
    
?>