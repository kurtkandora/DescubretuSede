<?php
   class Aula
   {
   	 public $id_aula;
	 public $id_sabana;
	 public $id_foto;
	 public $nombre_aula;
	 public $denominacion_aula;
	 public $capacidad_aula;
	 
	 function __contruct()
	 {
	 	$this->id_aula=0;
		$this->id_sabana=0;
		$this->id_foto=0;
		$this->nombre_aula='';
		$this->denominacion_aula='';
		$this->capacidad_aula='';
	 }
	 
	 function init($id_aula,$id_sabana,$id_foto,$nombre_aula,$denominacion_aula,$capacidad_aula)
	 {
	 	$this->id_aula=$id_aula;
		$this->id_sabana=$id_sabana;
		$this->id_foto=$id_foto;
		$this->nombre_aula=$nombre_aula;
		$this->denominacion_aula=$denominacion_aula;
		$this->capacidad_aula=$capacidad_aula;
	 }
	 
	 function __destruct(){
			unset($this);
     }
   }
