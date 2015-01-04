<?php
    require_once '../model/usuario.php';
	require_once '../delegate/usuario_delegate.php';
	
	
	$usuario_delegate = new UsuarioDelegate();
	session_start();
	
	$_SESSION['lista_usuarios']= $usuario_delegate->listarUsuarios();
	header('Status: 301 Moved Permanently', false, 301);
    header('Location:/descubretusede/admin/administracion_usuarios/panel_usuarios.php');
    exit();
	
?>