<?php
    
	require_once '../model/usuario.php';
	require_once '../model/password.php';
	require_once '../delegate/usuario_delegate.php';
	require_once '../delegate/password_delegate.php';

	$usuario = new Usuario();
	$password = new Password();
	$usuario_delegate = new UsuarioDelegate();
	$password_delegate = new PasswordDelegate();

	
    
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
    	
		     	$tipo_user = $_POST['selecttipo'];
				$id_usuario = $_POST['id_usuario'];
				$run = $_POST['txtrun'];
		       	$nombre = $_POST['txtnombre'];	
				$ape_paterno = $_POST['txtapellidop'];
				$ape_materno = $_POST['txtapellidom'];
		       	$correo = $_POST['txtcorreo'];
			   	
			   	$valido = TRUE;
			   
			  	$usuario->id_usuario=$id_usuario;
			   	$usuario->id_perfil=$tipo_user;
				$usuario->run=$run;
				$usuario->nombre_usuario=$nombre;
				$usuario->apellido_paterno=$ape_paterno;
				$usuario->apellido_materno=$ape_materno;
				$usuario->email_usuario=$correo;
				
				if(! preg_match('/([a-z ñáéíóú]{2,60})$/', $nombre)){
	   	   			$valido = $valido && FALSE;
		  		}
				if(! preg_match('/([a-z ñáéíóú]{2,60})$/', $ape_paterno)){
	   	   			$valido = $valido && FALSE;
		  		}
				if(! preg_match('/([a-z ñáéíóú]{2,60})$/', $ape_materno)){
	   	   			$valido = $valido && FALSE;
		  		}
	   			if(! preg_match('/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/', $correo)){
	      			$valido = $valido && FALSE;
	   			}
				
				if($valido){
				   	//Modificar usuario
				   	
					   	$usuario_delegate->actualizarUsuario($usuario);
						$usuario = $usuario_delegate->obtenerUsuario($usuario);
						
						$valor=$_POST['checkpass'];
						
						if($valor)
						{
							$contrasena1 = $_POST['txtpass'];
			   				$contrasena2 = $_POST['txtpass2'];
							
							if($contrasena1 == $contrasena2)
							{
								$password->id_usuario = $usuario->id_usuario;
								$password->hash_pass=$contrasena1;
								$password->estado_pass="Activa";
								
								$password_delegate->actualizarPassword($password);
							}
							
						}
						else{	
				  		header('Status: 301 Moved Permanently',false,301);
						header('Location:/descubretusede/admin/administracion_usuarios/agrega_modifica.php');
						}
						
					   	//session_start();
						
						
						header('Status: 301 Moved Permanently',false,301);
						header('Location:/descubretusede/operadores/llenar_panel.php');
						exit();
				   }else{
				  	header('Status: 301 Moved Permanently',false,301);
					header('Location:/descubretusede/admin/administracion_usuarios/agrega_modifica.php');
					
	  				}
		
	}
	else{
	  	header('Status: 301 Moved Permanently',false,301);
		header('Location:/descubretusede/admin/administracion_usuarios/agrega_modifica.php');
		exit();
	  }
?>