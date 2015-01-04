<?php
    require_once '../delegate/usuario_delegate.php';
	require_once '../delegate/password_delegate.php';
	require_once '../model/password.php';
	require_once '../model/usuario.php';
	
	$delegate_usuario = new UsuarioDelegate();
	$delegate_password = new PasswordDelegate();
	
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $correo = $_POST['txtcorreo'];
      $contrasena = $_POST['txtpass'];
	  
	  $usuario= new Usuario();
	  
	  $usuario->email_usuario=$correo;
	  $usuario = $delegate_usuario->obtenerUsuario($usuario);
	  
	  $password = new Password();
	  $password-> id_usuario=$usuario->id_usuario;
	  $password->estado_pass="Activa";
	  $password = $delegate_password->obtenerPassword($password);
	  
	
	  if($contrasena == $password->hash_pass){
	  	
		if($usuario->id_perfil == 1)
		{
		  	session_start();
			$_SESSION['usuario']= $usuario;
			
			header('Status: 301 Moved Permanently',false,301);
			header('Location:/descubretusede/operadores/llenar_panel.php');
			exit();
		}
		else{
			session_start();
			//$datos_usuario = $model_usuario->listarInformacionUsuario($correo);
			$_SESSION['usuario']= $usuario;
			
			header('Status: 301 Moved Permanently',false,301);
			header('Location:/descubretusede/admin/coordinacion_docente/sabana_horaria.php');
			exit();
		}
	  }
	  else{
	  	header('Status: 301 Moved Permanently',false,301);
		header('Location:/descubretusede/admin/login.php');
		exit();
	  }
    }
	else{
	  	header('Status: 301 Moved Permanently',false,301);
		header('Location:/descubretusede/admin/login.php');
		exit();
	  }
?>