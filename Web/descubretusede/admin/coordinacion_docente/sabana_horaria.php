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
    <link rel="stylesheet" href="../plantilla/css/bootstrap-theme.css">
    
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
			        <li role="presentation" class="active"><a href="../coordinacion_docente/sabana_horaria.php">Sabana Horaria</a></li>
			        <li role="presentation" ><a href="../coordinacion_docente/modifica_sala.php">Modificar Sala</a></li>
			        <li role="presentation"><a href="../coordinacion_docente/modifica_seccion.php">Modificar Sección</a></li>
		      		<li role="presentation" ><a href="../coordinacion_docente/cargar_planilla.php">Cargar planilla EXCEL con sabana horaria</a></li>
		      	</ul>
      			<div class="well"> 
        			<h3 align="center"> Sábana Horaria Académica</h3>
        			
        			<div class="row" align="center">
        				<div class="col-lg-2">
        				</div>
						
						<div class="well col-lg-8" align="center" >
        					<div class="row">
								<form class="" action="#">
									<div class="col-lg-4">
										<p>Seleccione el tipo de busqueda: </p> 
									</div>
									
									<div class="col-lg-3">
										<select id="dllbusqueda" class="form-control">
											<option value="1">Sección</option>
											<option value="2">Asignatura</option>
											<option value="3">Docente</option>
											<option value="4">Sala</option>
											<option value="5">Hora Inicio</option>
											<option value="6">Hora Término</option>
											<option value="7">Jornada</option>
											<option value="8">Día</option>
										</select>
									</div>
									
									<div class="col-lg-4">
										<div class="input-group">
										  <input type="text" id="txtbusqueda" class="form-control">
										  <span class="input-group-btn">
											<button class="btn id="btnbuscar" btn-default" type="submit">Buscar</button>
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
								<th>Sección</th>
								<th>Nombre Asignatura</th>
								<th>Nombre Docente</th>
								<th>Sala</th>
								<th>Hora Inicio</th>
								<th>Hora Término</th>
								<th>Jornada</th>
								<th>Día</th>
							  </tr>
							</thead>
							<tbody>
							  <tr>
								<td>1</td>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>1</td>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							  </tr>
							  
							</tbody>
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