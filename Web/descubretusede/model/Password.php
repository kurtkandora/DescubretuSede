<?php
    class Perfil {
 	public $id_usuario;
	public $hash_pass;
	public $fecha_caducidad;
	public $estado_password;
	
	function __construct()
	{
	}
 	
	function init($id_usuario,$hash_pass,$fecha_caducidad,$estado_password)
	{
		$this->id_usuario = $id_usuario;
		$this->hash_pass=$hash_pass;
		$this->fecha_caducidad=$fecha_caducidad;
		$this->estado_password=$estado_password;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>