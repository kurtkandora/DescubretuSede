<?php
require_once '../model/usuario.php';
require_once '../model/password.php';
require_once '../delegate/usuario_delegate.php';
require_once '../delegate/password_delegate.php';

	$usuario = new Usuario();
	$password = new Password();
	$usuario_delegate = new UsuarioDelegate();
	$password_delegate = new PasswordDelegate();

	
    if($_SERVER['REQUEST_METHOD']=='GET' |
	$_SERVER['REQUEST_METHOD']=='POST'){
		
		switch($_SERVER['REQUEST_METHOD']){
			case 'POST':
    	
				$tipo_user = $_POST['selecttipo'];
				$run = $_POST['txtrun'];
		       	$nombre = $_POST['txtnombre'];	
				$ape_paterno = $_POST['txtapellidop'];
				$ape_materno = $_POST['txtapellidom'];
		       	$correo = $_POST['txtcorreo'];
			   	$contrasena1 = $_POST['txtpass'];
			   	$contrasena2 = $_POST['txtpass2'];
			   	$valido = TRUE;
			   
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
				if(strlen($contrasena1)<7){
	   				$valido = $valido && FALSE;
	   			}else{
	   				if($contrasena1 != $contrasena2)
					{
						$valido = $valido && FALSE;
					}
	   			} 
				
				   if($valido){
				   	//registrar usuario
				   	
					   	$usuario_delegate->registrarUsuario($usuario);
						$usuario = $usuario_delegate->obtenerUsuario($usuario);
						// registra pass 
						$password->id_usuario= $usuario->id_usuario;
						$password->estado_pass="Activa";
						$password->fecha_caducidad="2015-11-10";
						$password->hash_pass=$contrasena1;
						
						$password_delegate->registrarPassword($password);
						
					   	session_start();
						
						//$datos_usuario = $model_usuario->listarInformacionUsuario($correo);
					   	//$_SESSION['usuario'] = $datos_usuario;
						
						header('Status: 301 Moved Permanently',false,301);
						header('Location:/descubretusede/operadores/llenar_panel.php');
						exit();
				   }else{
				  	header('Status: 301 Moved Permanently',false,301);
					header('Location:/descubretusede/admin/administracion_usuarios/agrega_modifica.php');
					
	  				}
				   break;
				   
			case 'GET':
				if(!empty($_GET['del'])){
				  	$usuario->id_usuario = $_GET['del'];
					$password->id_usuario= $usuario->id_usuario;
					$password_delegate->suprimirPassword($password);
					$password_delegate->listarPasswords();
					$usuario_delegate->eliminarUsuario($usuario);
					$usuario_delegate->listarUsuarios();
					
					header('Status: 301 Moved Permanently',false,301);	
					header('Location:/descubretusede/operadores/llenar_panel.php');
					exit();
					
				  	}
					else {
						$usuario->email_usuario = $_GET['mod'];
						$usuario = $usuario_delegate->obtenerUsuario($usuario); 
						$password->id_usuario= $usuario->id_usuario;
						$password = $password_delegate->obtenerPassword($password);
						session_start();
						$_SESSION['usu_select']= $usuario;
						$_SESSION['pass']=$password;
						
						header('Status: 301 Moved Permanently',false,301);	
						header('Location:/descubretusede/admin/administracion_usuarios/modificar_usuario.php');
						exit();
					
					}
				
				break;
	  		}
    }
	else{
	  	header('Status: 301 Moved Permanently',false,301);
		header('Location:/descubretusede/admin/administracion_usuarios/agrega_modifica.php');
		exit();
	  }
?>