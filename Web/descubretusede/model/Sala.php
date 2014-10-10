<?php
    class Sala{
 	public $id_sala;
	public $nombre_sala;
	public $ubicacion_sala;
	public $capacidad;
	
	
	function __construct()
	{
	}
 	
	function init($id_sala,$nombre_sala,$ubicacion_sala,$capacidad)
	{
		$this->id_sala = $id_sala;
		$this->nombre_sala=$nombre_sala;
		$this->ubicacion_sala=$ubicacion_sala;
		$this->capacidad=$capacidad;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>