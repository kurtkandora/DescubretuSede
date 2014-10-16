<?php
   class Notificacion {
 	public $id_notificacion;
	public $id_actividad;
	public $fecha_notificacion;
	public $descrip_notifi;
	
	function __construct()
	{
	}
 	
	function init($id_notificacion,$id_actividadpublic,$fecha_notificacion,$descrip_notifi)
	{
		$this->id_notificacion = $id_notificacion;
		$this->id_actividad=$id_actividad;
		$this->fecha_notificacion=$fecha_notificacion;
		$this->descrip_notifi=$descrip_notifi;
		
	}
	
	function __destruct() 
	{
        unset($this);
	}
}

?>