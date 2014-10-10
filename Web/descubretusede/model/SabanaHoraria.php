<?php
    class SabanaHoraria {
 	public $id_sabana;
	public $id_sala;
	
	function __construct()
	{
	}
 	
	function init($id_sabana,$id_sala)
	{
		$this->id_sabana= $id_sabana;
		$this->id_sala=$id_sala;
		
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>