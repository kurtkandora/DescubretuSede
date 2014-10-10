<?php

 class Perfil {
 	public $id_perfil;
	public $nombre;
	public $descripcion;
	
	function __construct()
	{
	}
 	
	function init($id_perfil,$nombre,$descripcion)
	{
		$this->id_perfil = $id_perfil;
		$this->nombre=$nombre;
		$this->descripcion=$descripcion;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}

 
?>