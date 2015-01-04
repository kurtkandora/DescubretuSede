<?php	
    require_once '../dao/asignatura_dao.php';
	class AsignaturaDelegate{
		
		public $asignatura_dao;
		
		function __construct(){
			$this->asignatura_dao = new AsignaturaDAO();
		}
		
		function eliminarAsignatura(Asignatura $asignatura)
		{
			if($this->asignatura_dao->delete($asignatura)){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
		
	    function select(){
		  	$lista_asignatura = $this->asignatura_dao->select();
			return $lista_asignatura;
		}
		
		function update(Asignatura $asignatura){
			$lista_asignatura = $this->asignatura_dao->update($asignatura);
			return $lista_asignatura;
		}
		  
		function __destruct(){
			$this->asignatura_dao->__destruct();
			unset($this);
		}
	}
?>