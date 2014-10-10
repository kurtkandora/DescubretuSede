<?php
     class Password {
 	public $id_asignatura;
	public $nombre_asig;
	public $sigla_asig;
	
	
	function __construct()
	{
	}
 	
	function init($id_asignatura,$nombre_asig,$sigla_asig)
	{
		$this->id_asignatura = $id_asignatura;
		$this->nombre_asig=$nombre_asig;
		$this->sigla_asig=$sigla_asig;
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>