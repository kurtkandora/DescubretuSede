<?php
require_once 'libsigma/Sigma.php';


   $plantilla = new HTML_Template_Sigma('plantilla/');
   $plantilla->loadTemplateFile('login.tlp.html');
   
   
   $titulo ='<link rel="stylesheet" href="plantilla/css/estilo.css">
			<link rel="stylesheet" href="plantilla/css/bootstrap.css">
   				<div class="container">
   					<div class="row">
						<div class="col-lg-4">
						</div>
						<div class="col-lg-4" align="center">
							<img src="plantilla/imagenes/LogoDuoc.jpg" alt="Logo Duoc"  class="imgportada"  />
						</div>
						<div class="col-lg-4">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
						</div>
						<div class="col-lg-4 " align="center">
							<h3> @Descubre Tu Sede</h3>
						</div>
						<div class="col-lg-4">
						</div>
					</div>
				</div>';
   $login =' 
   			<form class="formulario" action=" " method="post" onsubmit="return validarFormulario()">
   				<br/>
   				<br/>
   				<br/>
   				<div class="container">
					<div class="row">
						<div class="col-lg-4">
						</div>
						<div class="col-lg-4 " align="center">
							<h4> Iniciar sesión </h4>
						</div>
						<div class="col-lg-4">
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-lg-4">	
						</div>
						<div class="col-lg-1">
							<h6>Usuario</h6>
						</div>
						<div class="col-lg-3 ">
							<input type="text" name="txtuser" id="txtuser" required />
						</div>
						<div class="col-lg-4">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
						</div>
						<div class="col-lg-1">
							<h6>Contraseña</h6>
						</div>
						<div class="col-lg-3 ">
							<input type="password" name="txtpass" id="txtpass" required />
						</div>
						<div class="col-lg-4">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5">
						</div>
						<div class="col-lg-1" align="center">
							<button class="submit" type="submit" name="iniciar">Iniciar</button>
						</div>
						<div class="col-lg-1" align="center">
							<button class="submit" type="submit" name="cancelar">Cancelar</button>
						</div>
						<div class="col-lg-5">
						</div>
					</div>
			</div>
			</form>';
			
			$plantilla->setVariable('cabecera',$titulo);
			$plantilla->setVariable('formulario',$login);
			$plantilla->parse();
   			$plantilla->show();
?>