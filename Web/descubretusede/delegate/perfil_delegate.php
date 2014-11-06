<?php
    require_once'../model/perfil.php';
	require_once'../dao/perfil_dao.php';
    
    class PerfilDelegate{
    	
	 private $perfil_dao;
	 
	   function __construct(){
	 	 $this->perfil_dao = new PerfilDAO();
	   }
	   
	   function obtenerPerfil(Perfil $perfil){
	   	
	   	  $perfil = $this->perfil_dao->read($perfil);
		  return $perfil;
	   }
	   
	   function listarPerfiles(){
	   	
	      $lista_reg_perfiles = $this->perfil_dao->select();
		  return $lista_reg_perfiles;	
	   }
	   
	   function __destruct() {
	   	
	      $this->perfil_dao->__destruct();
          unset($this);
       }
    }
?>