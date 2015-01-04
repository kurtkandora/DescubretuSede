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
			        <li role="presentation" class="active"><a href="../coordinacion_docente/modifica_sala.php">Modificar Sala</a></li>
			        <li role="presentation"><a href="../coordinacion_docente/modifica_seccion.php">Modificar Sección</a></li>
		      		<li role="presentation" ><a href="../coordinacion_docente/cargar_planilla.php">Cargar planilla EXCEL con sabana horaria</a></li>
		      	</ul>
			  	<div class="well">
					<form class="" action="#">
						<h3 align="center"> Modificar sala de clases</h3> 
						<br/>
						<br/>
						
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3 ">
								<p> Ubicación de la sala</p>		
							</div>
							<div class="col-lg-3">
								<select id="ddlubicacionsala" class="form-control">
									<option value="-1">Subterraneo</option>
									<option value="1">Piso 1</option>
									<option value="2">Piso 2</option>
									<option value="3">Piso 3</option
									<option value="4">Piso 4</option>
									<option value="5">Piso 5</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p> Seleccione sala a modificar</p>
							</div>
							<div class="col-lg-3">
								<select id="ddlselecionarsala" class="form-control">
									<option value="1">L11</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-3">
								<p> Nuevo nombre</p>
							</div>
							<div class="col-lg-3">
								 <input type="text" id="txtnuevonombre"  class="form-control">
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-3 ">
							</div>
							<div class="col-lg-3">
								<p> Nueva capacidad </p>
							</div>
							<div class="col-lg-3">
								 <input id="txtnuevacapacidad" type="number" value="1" min="1" class="form-control"/>
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
								 <button type="submit" id="btnmodificar" class="btn btn-sm btn-primary">Modificar</button>
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
  	</div>
      ';
   
   	$plantilla->setVariable('cabecera',$titulo);
	$plantilla->setVariable('front',$front);
	$plantilla->parse();
   	$plantilla->show();
   	}
?>