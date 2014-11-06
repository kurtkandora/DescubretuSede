<?php
    require_once '../dao/perfil_dao.php';
	require_once '../model/perfil.php';
	
	$perfildao = new PerfilDAO();
	$perfil = new Perfil();
	$lsta = $perfildao->select();
	$perfil = $lsta[0];
	echo 'Holaaaas'.$perfil->tipo_perfil;
?>