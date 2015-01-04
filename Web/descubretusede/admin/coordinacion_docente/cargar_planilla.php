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
								<button type="button"  id="btncerrarsesion" class="btn btn-sm btn-primary">Cerrar Sesión</button>
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
			        <li role="presentation"><a href="../coordinacion_docente/modifica_seccion.php">Modificar Sección</a></li>
		      		<li role="presentation" class="active"><a href="../coordinacion_docente/cargar_planilla.php">Cargar planilla EXCEL con sabana horaria</a></li>
		      	</ul>
			  	<div class="well">
		       		<h3 align="center"> Cargar planilla EXCEL con sábana horaria</h3>
		       		<form class="" action="#"> 
						<br/>
						<br/>
						<div class="row">
							<div class="col-lg-2">
							</div>
							<div class="col-lg-4">
								<p> Selecione el semestre de 2015</p>
							</div>
							<div class="col-lg-3">
								<select id="ddlsemestre" class="form-control" required>
									<option value="1">Primer Semestre</option>
									<option value="12">Segundo Semestre</option>
								</select>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-2">
							</div>
							<div class="col-lg-4 ">
								<p> Seleccione la fecha de inicio del semestre</p>		
							</div>
							<div class="col-lg-3">
								<input id="txtfechainicio" type="date"  class="form-control " required/>
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-2">
							</div>
							<div class="col-lg-4">
								<p> Seleccione la fecha de termino del semestre</p>
							</div>
							<div class="col-lg-3">
								<input type="date" id="txtfechatermino"  class="form-control "required/>
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-2">
							</div>
							<div class="col-lg-4">
								<p> Observación </p>
							</div>
							<div class="col-lg-3">
								<textarea id="txtareaobservacion" cols="20" rows="2" class="form-control" placeholder="Actualización de la sábana horaria" required ></textarea>
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-2">
							</div>
							<div class="col-lg-4">
								<p> Planilla sábana horaria </p>
							</div>
							<div class="col-lg-3">
								<input id="fileplantilla" type="file"  required/>
							</div>
							<div class="col-lg-3">
							</div>
							
						</div>
						<br/>
						<div class="row">
							<div class="col-lg-2">
							</div>
							<div class="col-lg-4">
								
							</div>
							<div class="col-lg-3">
								 <button type="submit" id="btnguardarsabana" class="btn btn-sm btn-primary">Guaradar sábana</button>
								 <button type="button" id="btncancelarsabana" class="btn btn-sm btn-primary">Cancelar</button>
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