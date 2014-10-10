<?php
    class Seccion {
 	public $id_seccion;
	public $id_asignatura;
	public $id_sabana;
	public $numero_seccion;
	public $jornada;
	public $profesor;
	
	
	function __construct()
	{
	}
 	
	function init($id_seccion,$id_asignatura,$id_sabana,$numero_seccion,$jornada,$profesor)
	{
		$this->id_seccion=$id_seccion;
		$this->id_asignatura=$id_asignatura;
		$this->id_sabana=$id_sabana;
		$this->numero_seccion=$numero_seccion;
		$this->jornada=$jornada;
		$this->profesor=$profesor;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>