<?php
    require_once '../libsigma/sigma.php';


   $plantilla = new HTML_Template_Sigma('../plantilla/');
   $plantilla->loadTemplateFile('sitio.tlp.html');
   
   
   	session_start();
   if(!isset($_SESSION['usuario'])|!$_SESSION['usuario']){
		header('Status: 301 Moved Permanently',false,301);
		header('Location:../login.php');
		exit();
	} 
	else{
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
							<h4>Sistema de administración de sábana académica</h4>
						</div>
						<div class=" col-lg-3" align="center">
							<h3>
								<span class="label label-primary">Usuario</span> 
								<button type="button" id="btncerrarsesion" class="btn btn-sm btn-primary">Cerrar Sesión</button>
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
			        <li role="presentation" ><a href="../coordinacion_docente/sabana_horaria.php">Sabana Horaria</a></li>
			        <li role="presentation" ><a href="../coordinacion_docente/modifica_sala.php">Modificar Sala</a></li>
			        <li role="presentation" class="active"><a href="../coordinacion_docente/modifica_seccion.php">Modificar Sección</a></li>
		      		<li role="presentation" ><a href="../coordinacion_docente/cargar_planilla.php">Cargar planilla EXCEL con sabana horaria</a></li>
		      	</ul>
      			<div class="well">
        			<h3 align="center"> Actualización de sección </h3>
        			<br/>
		       		<br/>
					<form class="" action="#">
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p> Escuela</p>
							</div>
							<div class="col-lg-3">
								 <select id="ddlescuela" class="form-control">
									<option value="1">Escuela de Turismo</option>
									<option value="2">Escuela de Informática y Telecomunicaciones</option>
									<option value="3">Escuela de Administración y Negocios</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p>Asignatura</p>
							</div>
							<div class="col-lg-3">
								 <select id="ddlasignatura" class="form-control">
									<option value="1">Auditoría Informática</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p> Sección</p>
							</div>
							<div class="col-lg-3">
								 <select id="ddlseccion" class="form-control">
									<option value="1">005D</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<br/>
						<div class="row">
							<div class="col-lg-3 ">
							</div>
							<div class="col-lg-3">
								
							</div>
							<div class="col-lg-3">
								 <button type="submit" id="btnbuscarseccion" class="btn btn-sm btn-primary">Buscar Sección</button>
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
		       		</form>
					<br/>
					<br/>
					<br/>
					<form class="" action="#">
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p> Profesor</p>
							</div>
							<div class="col-lg-3">
								<select id="ddlprofesor" class="form-control">
									<option value="1">David Soto</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3 ">
								<p> Hora de Inicio</p>		
							</div>
							<div class="col-lg-3">
								<input type="time" id="txthorainicio" class="form-control"/>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p> Hora término</p>
							</div>
							<div class="col-lg-3">
								<input type="time" id="txthoratermino" class="form-control"/>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3 ">
							</div>
							<div class="col-lg-3">
								<p> Día Clases</p>
							</div>
							<div class="col-lg-3">
								 <select id="ddldiaclases" class="form-control">
									<option value="1">Lunes</option>
									<option value="1">Martes</option>
									<option value="1">Miércoles</option>
									<option value="1">Jueves</option>
									<option value="1">Viernes</option>
									<option value="1">Sábado</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<br/>
						<div class="row">
							<div class="col-lg-3 ">
							</div>
							<div class="col-lg-3">
								
							</div>
							<div class="col-lg-3">
								 <button type="submit" id="btnactualizar" class="btn btn-sm btn-primary">Actualizar Sección</button>
								 <button type="button" id="btncancelar" class="btn btn-sm btn-primary">Cancelar</button>
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
					</form>
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