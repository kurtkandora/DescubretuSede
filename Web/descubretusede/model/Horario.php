<?php
     class Horario {
 	public $id_horario;
	public $id_seccion;
	public $id_sala;
	public $dia_clases;
	public $hora_inicio;
	public $hora_termino;
	
	function __construct()
	{
	}
 	
	function init($id_horario,$id_seccion,$id_sala,$dia_clases,$hora_inicio,$hora_termino)
	{
		$this->id_horario=$id_horario;
		$this->id_seccion=$id_seccion;
		$this->id_sala=$id_sala;
		$this->dia_clases=$dia_clases;
		$this->hora_inicio=$hora_inicio;
		$this->hora_termino=$hora_termino;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>