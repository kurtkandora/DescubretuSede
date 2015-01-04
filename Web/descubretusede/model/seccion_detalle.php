<?php
    class SeccionDetalle
    {
    	public $id_seccion;
    	public $jornada;
    	public $profesor;
    	public $nombre_asignatura;
    	public $nombre_aula;
    	public $hora_inicio;
    	public $hora_termino;
    	public $dia_clases;
		
		function __construct()
		{
		  $this->id_seccion='';
		  $this->jornada='';
		  $this->profesor='';
		  $this->nombre_asignatura='';
		  $this->nombre_aula='';
		  $this->hora_inicio='';
		  $this->hora_termino='';
		  $this->dia_clases='';
		  	
		}
		
		function init($id_seccion,$jornada,$profesor,$nombre_asignatura,$nombre_aula,$hora_inicio,$hora_termino,$dia_clases)
		{
		$this->id_seccion=$id_seccion;
		  $this->jornada=$jornada;
		  $this->profesor=$profesor;
		  $this->nombre_asignatura=$nombre_asignatura;
		  $this->nombre_aula=$nombre_aula;
		  $this->hora_inicio=$hora_inicio;
		  $this->hora_termino=$hora_termino;
		  $this->dia_clases=$dia_clases;	
		}
		
		function __destruct(){
			unset($this);
		}
    }
?>