<?php
    require_once 'libsigma/sigma.php';


   $plantilla = new HTML_Template_Sigma('plantilla/');
   $plantilla->loadTemplateFile('login.tlp.html');
   
   
   $titulo ='
     <link href="plantilla/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="plantilla/css/estilo.css">
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
							<h2> @Descubre Tu Sede</h2>
						</div>
						<div class="col-lg-4">
						</div>
					</div>
				</div>';
   $login =' 
   
   		<form class="form-signin" action="../operadores/autentificar.php" method="post" role="form">
        	<h2 class="form-signin-heading">Inicie sesión</h2>
        	<input type="text" class="form-control" name="txtcorreo" id="txtcorreo" placeholder="Correo Electronico" required autofocus>
        	<input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Password" required>
        	<div class="checkbox">
          		
        	</div>
        	<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
      	</form>

    </div> 


    
    <script src="plantilla/js/ie10-viewport-bug-workaround.js"></script>';
			
			$plantilla->setVariable('cabecera',$titulo);
			$plantilla->setVariable('formulario',$login);
			$plantilla->parse();
   			$plantilla->show();

?>