<?php
    require_once'../model/password.php';
	require_once'../dao/password_dao.php';
    
    class PasswordDelegate{
    	
	 private $password_dao;
	 
	   function __construct(){
	   	
	 	 $this->password_dao = new PasswordDAO();
	   }
	   
	   function registrarPassword(Password $password){
	   	
	   	if($this->password_dao->create($password)){
	   	  	return TRUE;
		  }else{
		  	return FALSE;
		  }
	   }
	   
	   function obtenerPassword(Password $password){
	   	
	   	    $password = $this->password_dao->read($password);
			return $password;
	   }
	   
	   function actualizarPassword(Password $password){
	   	
	   	if($this->password_dao->update($password)){
	   	  	return TRUE;
		  }else{
		  	return FALSE;
		  }
	   }
	   
	   function suprimirPassword(Password $password){
	   	
	    if($this->password_dao->delete($password)){
	   	  	return TRUE;
		  }else{
		  	return FALSE;
		  }
	   }
	   
	   function listarPasswords()
	   {
	   	 $listadoPasswords=$this->password_dao->select();
		 return $listadoPasswords;
	   }
	   
	    function __destruct() {
	    	
	      $this->password_dao->__destruct();
          unset($this);
       }
    }
?>