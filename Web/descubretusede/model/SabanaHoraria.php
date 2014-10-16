<?php
    class SabanaHoraria {
 	public $id_sabana;
	public $id_sala;
	public $semestre;
	public $fec_inicio;
	public $fec_termino;
	public $fec_creacion;
	public $descrip_sabana;
	
	function __construct()
	{
	}
 	
	function init($id_sabana,$id_sala,$semestre,$fec_inicio,$fec_termino,$fec_creacion,$descrip_sabana)
	{
		$this->id_sabana= $id_sabana;
		$this->id_sala=$id_sala;
		$this->semestre=$semestre;
		$this->fec_inicio=$fec_inicio;
		$this->fec_termino=$fec_termino;
		$this->fec_creacion=$fec_creacion;
		
	}
	
	function __destruct() 
	{
        unset($this);
	}
}
?>