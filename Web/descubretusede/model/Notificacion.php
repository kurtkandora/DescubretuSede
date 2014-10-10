<?php
   class Notificacion {
 	public $id_notificacion;
	public $id_actividad;
	
	function __construct()
	{
	}
 	
	function init($id_notificacion,$id_actividad)
	{
		$this->id_notificacion = $id_notificacion;
		$this->id_actividad=$id_actividad;
		
	}
	
	function __destruct() 
	{
        unset($this);
	}
}

?>