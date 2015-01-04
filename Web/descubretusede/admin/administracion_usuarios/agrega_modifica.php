<?php
    require_once '../libsigma/sigma.php';
	require_once '../../model/usuario.php';
	require_once '../../model/password.php';
	
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
		
   	$titulo = '
   	<link rel="stylesheet" href="../plantilla/css/estilo.css">
	<link rel="stylesheet" href="../plantilla/css/bootstrap.css">
	<link rel="stylesheet" href="../plantilla/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plantilla/css/bootstrap-theme.min.css">
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
				</div>
   	
   ';
   
   	$front= '
   	<br/>
   	<br/>
   	<div class="comtainer">
   		<div class="row">
   			<div class="col-lg-1" >
   			</div>
   			<div class="col-lg-10" align="center">
		   		<ul class="nav nav-tabs" role="tablist">
		   			<li role="presentation"><a href="../../operadores/llenar_panel.php">Panel Administrador de usuario</a></li>
			   		<li role="presentation" class="active"><a href="../administracion_usuarios/agrega_modifica.php">Agregar o modificar usuario</a></li>
				    </ul>
			  	<div class="well">';
										
				$front.='	
				
				<form class="formulariomodificar" action="../../operadores/mantenedor_usuario.php" method="post">
						<h3 align="center"> Agregar usuario</h3> 
						<br/>
						<br/>
						
						<div class="row">
							<div class="col-lg-3">
							
							</div>
							<div class="col-lg-3 ">
								<p> Seleccione el tipo de usuario</p>		
							</div>
							<div class="col-lg-3">
								<select class="form-control" id="selecttipo" name="selecttipo">
									<option value="1">Administrador</option>
									<option value="2">Cordinación Docente</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p>Run</p>
							</div>
							<div class="col-lg-3">
								<input id="txtrun" name="txtrun" type="text" class="form-control" maxlength="10"  size="10" placeholder="12345678-1" onblur="valrun()" required>
								 
							</div>
							<span id="errcontrasena1" style="color:red"></span>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p>Nombre</p>
							</div>
							<div class="col-lg-3">
								 <input id="txtnombre" name="txtnombre" type="text" class="form-control" maxlength="20"  size="20" onblur="validarnombre()"  required>
								  <span id="errnombre" name="errnombre" style="color:red"></span>
							</div>
							<div class="col-lg-3">
							
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p>Apellido Paterno</p>
							</div>
							<div class="col-lg-3">
								 <input id="txtapellidop" name="txtapellidop" type="text" class="form-control" maxlength="20"  size="20" required>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p>Apellido Materno</p>
							</div>
							<div class="col-lg-3">
								 <input id="txtapellidom" name="txtapellidom"  type="text" class="form-control" maxlength="20"  size="20" required>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p>Correo Electronico</p>
							</div>
							<div class="col-lg-3" >
								<input id="txtcorreo" name="txtcorreo" type="text" class="form-control" maxlength="50"  size="50" required>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						<br/>
						<br/>
						<div class="row">
							<div class="col-lg-3">
							</div>
							
							<div class="col-lg-3">
							<p> Nueva contraseña</p>
							</div>
							
							<div class="col-lg-3">
								<input type="password" id="txtpass" name="txtpass" class="form-control" maxlength="20"  size="20" required>
							</div>
							
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							
							<div class="col-lg-3">
							<p> Repita Nueva contraseña</p>
							</div>
							
							<div class="col-lg-3">
								<input  type="password" id="txtpass2" name="txtpass2" class="form-control" maxlength="20"  size="20" required>
							</div>
							
							<div class="col-lg-3">
							</div>
						</div>
						<br/>
						
						<br/>
						<div class="row">
							<div class="col-lg-3 ">
							</div>
							<div class="col-lg-3">
								
							</div>
							<div class="col-lg-3">
								 <button id="btnguardar" name="btnguardar" type="submit" class="btn btn-sm btn-primary">Guardar</button>
								 <form class="formulariomodificar" action="agrega_modifica.php" method="post">
								 	<button id="btncancelar" name="btncancelar" type="submit"  class="btn btn-sm btn-danger">Cancelar</button>
								 </form>
								 
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						<br/>
						<br/>
						
						
					</form>';
					
	      	$front.='</div>
	      	</div>	
	      	<div class="col-lg-1" >
   			</div>	
		</div>
  	</div>
      ';
   
   	$plantilla->setVariable('cabecera',$titulo);
	$plantilla->setVariable('front',$front);
	$plantilla->parse();
   	$plantilla->show();
	
	}
?>