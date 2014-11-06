<?php
    require_once'../model/usuario.php';
	require_once'../dao/usuario_dao.php';
    
    class PerfilDelegate{
    	
	 private $usuario_dao;
	 
	   function __construct(){
	   	
	 	 $this->usuario_dao = new UsuarioDAO();
	   }
	   
	   function registrarUsuario(Usuario $usuario){
	   	  
		  if($this->usuario_dao->create($usuario)){
		  	  return TRUE;
		  }else{
		  	  return FALSE;
		  }
	   }
	  
	   function obtenerUsuario(Usuario $usuario){
	   	
	   	  $usuario = $this->usuario_dao->read($usuario);
		  return $usuario;
	   }
	   
	   function actualizarUsuario(Usuario $usuario){
	      	
	       if($this->perfil_dao->update($usuario)){
	           return TRUE;
	       }else{
	       	   return FALSE;
	       }
		  
	   }
	   
	   function eliminarUsuario(Usuario $usuario){
	     
		   if($this->perfil_dao->delete($usuario)){
		   	  return TRUE;
		   }else{
		   	  return FALSE;
		   }
		  
	   }
	   
	   function listarUsuarios(){
	   	
	      $lista_usuarios = $this->usuario_dao->select();
		  return $lista_usuarios;	
	   }
	   
	   function __destruct() {
	   	
	      $this->usuario_dao->__destruct();
          unset($this);
       }
    }
?>