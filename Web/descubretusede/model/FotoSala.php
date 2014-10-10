<?php
   class FotoSala {
 	public $id_foto;
	public $id_sala;
	public $foto_sala;
	public $fecha_foto;
	
	function __construct()
	{
	}
 	
	function init($id_foto,$id_sala,$foto_sala,$fecha_foto)
	{
		$this->id_foto= $id_foto;
		$this->id_sala=$id_sala;
		$this->foto_sala=$foto_sala;
		$this->fecha_foto=$fecha_foto;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>