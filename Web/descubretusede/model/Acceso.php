<?php
    class Acceso {
 	public $id_acceso;
	public $id_perfil;
	public $descripcion_acce;
	
	function __construct()
	{
	}
 	
	function init($id_acceso,$id_perfil,$descripcion_acce)
	{
		$this->id_acceso = $id_acceso;
		$this->id_perfil=$id_perfil;
		$this->descripcion_acce=$descripcion_acce;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
    
?>