<?php
   
 class Afiche {
 	public $id_perfil;
	public $id_actividad;
	public $afiche;
	public $fecha_publicacion;
	
	function __construct()
	{
	}
 	
	function init($id_perfil,$id_actividad,$afiche,$fecha_publicacion)
	{
		$this->id_perfil = $id_perfil;
		$this->id_actividad=$id_actividad;
		$this->afiche=$afiche;
		$this->fecha_publicacion=$fecha_publicacion;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}

?>