<?php
   class Actividades {
 	public $id_actividad;
	public $id_tipo;
	public $id_usuario;
	public $nombre_act;
	public $descripcion_act;
	public $hora_act;
	public $fecha_act;
	public $ubicacion_act;
	
	function __construct()
	{
	}
 	
	function init($id_actividad,$id_tipo,$id_usuario,$nombre_act,$descripcion_act,$hora_act,$fecha_act,$ubicacion_act)
	{
		$this->id_actividad=$id_actividad;
		$this->id_tipo=$id_tipo;
		$this->id_usuario=$id_usuario;
		$this->nombre_act=$nombre_act;
		$this->descripcion_act=$descripcion_act;
		$this->hora_act=$hora_act;
		$this->fecha_act=$fecha_act;
		$this->ubicacion_act = $ubicacion_act;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>