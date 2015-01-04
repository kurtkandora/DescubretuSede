<?php
require_once '../libsigma/sigma.php';
require_once '../../model/usuario.php';

   $plantilla = new HTML_Template_Sigma('../plantilla/');
   $plantilla->loadTemplateFile('sitio.tlp.html');
   
 
   	session_start();
   if(!isset($_SESSION['usuario'])|!$_SESSION['usuario']){
		header('Status: 301 Moved Permanently',false,301);
		header('Location:../login.php');
		exit();
	} 
	else{
	$usuario = $_SESSION['usuario'];
	$lista_usuarios = $_SESSION['lista_usuarios'];
   	$titulo = '
   	<link rel="stylesheet" href="../plantilla/css/estilo.css">
	<link rel="stylesheet" href="../plantilla/css/bootstrap.css">
    <link rel="stylesheet" href="../plantilla/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plantilla/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../plantilla/css/bootstrap-theme.css">
    
   	<div class="container">
					<div class="row" >
						<div class="col-lg-3" align="center">
							<img src="../plantilla/imagenes/LogoDuoc.jpg" alt="Logo Duoc"  class="imglogo"  />
						</div>
						<div class="col-lg-6" align="center">
							<h1>@Descubre Tu Sede</h1>
							<h4>Sistema de administración de usuarios</h4>
						</div>
						<div class=" col-lg-3" align="center">
							<h3>
								<form action="../../operadores/logout.php">
									<span class="label label-primary">'.$usuario->nombre_usuario.'</span>
									<button type="submit" class="btn btn-sm btn-primary" >Cerrar Sesión</button>
								</form>								
							</h3>
						</div>
					</div>
				</div>';
   $front= '
   <br/>
   <br/>
   <div class="comtainer">
   		<div class="row">
   			<div class="col-lg-1" >
   			</div>
			
   			<div class="col-lg-10" align="center">
   				<ul class="nav nav-tabs" role="tablist">
   				
   				    <li role="presentation" class="active"><a href="../../operadores/llenar_panel.php">Panel Administrador de usuario</a></li>
			        <li role="presentation"><a href="../administracion_usuarios/agrega_modifica.php">Agregar o modificar usuario</a></li>
			   	</ul>
				
      			<div class="well"> 
        			<h3 align="center"> Panel de administracion de usuarios</h3>
        			<div class="row" align="center">
					
        				<div class="col-lg-2">
        				</div>
						
						<div class="well col-lg-8" align="center" >
        					<div class="row">
								
								<form class="formulariobuscar" action="#">
									<div class="col-lg-4">
										<p>Seleccione el tipo de visualizacion o busqueda: </p> 
									</div>
									
									<div class="col-lg-3">
										<select class="form-control">
											<option value="1">R.U.N.</option>
											<option value="2">Nombre</option>
											<option value="3">Apellido Paterno</option>
											<option value="4">Apellido Materno</option>
											<option value="5">Mail</option>
											<option value="6">Perfil</option>
										</select>
											
									</div>
									
									<div class="col-lg-4">
									
										<div class="input-group">
										  <input type="text" class="form-control">
										  <span class="input-group-btn">
											<button class="btn btn-default" type="submit">Buscar</button>
										  </span>
										</div> <!-- /input-group -->
									</div>	
								</form>
        						
								
        					</div>
      					</div> 
						
      					<div class="col-lg-2">
      					</div>
						
						
					</div>
        			<div class="row" align="center">
					
						<div class="col-lg-1">
      					</div>
						
						<div class="col-md-10">
						  <table class="table table-striped">
							<thead>
							  <tr>
								<th>Run</th>
								<th>Nombre</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Mail</th>
								<th>Perfil</th>
								<th>Modificar</th>
								<th>Eliminar</th>
							  </tr>
							</thead> 
							<tbody>';
							
							$size_usuarios = sizeof($lista_usuarios);
							if($size_usuarios>0){
								for ($i=0; $i <$size_usuarios ; $i++) {
									$usuario= new Usuario();
									$usuario= $lista_usuarios[$i];
									
								$front .='
								  <tr>
									<td>'.$usuario->run.'</td>
									<td>'.$usuario->nombre_usuario.'</td>
									<td>'.$usuario->apellido_paterno.'</td>
									<td>'.$usuario->apellido_materno.'</td>
									<td>'.$usuario->email_usuario.'</td>
									<td>'.$usuario->id_perfil.'</td>
									<td> <a href="../../operadores/mantenedor_usuario.php?mod='.$usuario->email_usuario.'">Modifiar</a></td>
									<td> <a href="../../operadores/mantenedor_usuario.php?del='.$usuario-> id_usuario.'">Eliminar </a></td>
								  </tr>';
								 // $usuario->__destruct();
								  }
								  }
								else{
						$front .='	<tr>
									<td>Sin Registros</td>
									<td>Sin Registros</td>
									<td>Sin Registros</td>
									<td>Sin Registros</td>
									<td>Sin Registros</td>
									<td>Sin Registros</td>
									
								  </tr>';
								}
							  
						$front .='</tbody>
						  </table>
						</div>
						
						<div class="col-lg-1">
      					</div>
					  
					</div>
      			</div>   
      		</div>
			
      		<div class="col-lg-1" >
   			</div>
			
		</div>
  	</div>';
   
   	$plantilla->setVariable('cabecera',$titulo);
	$plantilla->setVariable('front',$front);
	$plantilla->parse();
   	$plantilla->show();
   	
   	}
?>