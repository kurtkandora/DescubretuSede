<?php
    require_once '../delegate/seccion_delegate.php';
	header("Content-type: application/json; charset=utf-8");
	if($_SERVER['REQUEST_METHOD']=='GET'|| $_SERVER['REQUEST_METHOD']=='POST'){
		if(!empty($_REQUEST['send'])){
		 $jsonRecibido=$_REQUEST['send'];
	     $data = json_decode(utf8_encode($jsonRecibido));
	     $opcion = $data->{'indice'};
	     $controladorSeccion = new SeccionDelegate(); 
	       
	       switch($opcion){
	       	
		     case 1:
	         //{"indice":1}
		     $listado= $controladorSeccion->select();
			 if(!is_null($listado)){
			     echo(json_encode($listado));	 	
			 }else{
			 	 $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			     echo(json_encode($mensaje));	
			 }
		     break;
		 
		     case 2:
		     //{"indice":2,"seccion":"005D"}
		     $seccion=$data->{'seccion'};
		     $listado=$controladorSeccion->selectPorSession(utf8_decode($seccion));
			 if(!is_null($listado)){
		          echo(json_encode($listado));	
		     }else{
			 	  $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			      echo(json_encode($mensaje));	
			 }
	         break;
		  
		     case 3:
		     //{"indice":3,"docente":"david soto"}
		     $nombreDocente=$data->{'docente'};
		     $listado=$controladorSeccion->selectPorDocente(utf8_decode($nombreDocente));
			 if(!is_null($listado)){
		          echo(json_encode($listado));
			 }else{
			 	  $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			      echo(json_encode($mensaje));	
			 }
		     break;
		
		     case 4:
		     //{"indice":4,"asignatura":"dai"}
		     $asignatura=$data->{'asignatura'};
		     $listado=$controladorSeccion->selectPorAsignatura(utf8_decode($asignatura));
			 if(!is_null($listado)){
		          echo(json_encode($listado));
		     }else{
			 	  $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			      echo(json_encode($mensaje));	
			 }
		     break;
			 //REVISAR ESTE CASO
			 case 5:
		     //{"indice":5,"aula":"L57"}
		     $aula=$data->{'aula'};
		     $listado=$controladorSeccion->selectPorAula(utf8_decode($aula));
			 if(!is_null($listado)){
		          echo(json_encode($listado));
		     }else{
			 	  $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			      echo(json_encode($mensaje));	
			 }
		     break;
			 //REVISAR ESTE CASO
			 case 6:
		     //{"indice":6,"jornada":"vespertina"}
		     $jornada=$data->{'jornada'};
		     $listado=$controladorSeccion->selectPorJornada(utf8_decode($jornada));
			 if(!is_null($listado)){
		          echo(json_encode($listado));
		     }else{
			 	  $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			      echo(json_encode($mensaje));	
			 }
		     break;
			 //REVISAR ESTE CASO
			 case 7:
		     //{"indice":7,"dia_de_clases":"viernes"}
		     $dia=$data->{'dia_de_clases'};
		     $listado=$controladorSeccion->selectPorDia(utf8_decode($dia));
			 if(!is_null($listado)){
		          echo(json_encode($listado));
		     }else{
			 	  $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			      echo(json_encode($mensaje));	
			 }
		     break;
			 
		     case 8:
		     //{"indice":8,"hora_inicio":"2:00"}
		     $hora=$data->{'hora_inicio'};
		     $listado=$controladorSeccion->selectPorHoraInicio($hora);
			 if(!is_null($listado)){
		         echo(json_encode($listado));
		     }else{
			 	  $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			      echo(json_encode($mensaje));	
			 }
		     break;
			 
			 case 9:
		     //{"indice":9,"hora_termino":"2:00"}
		     $hora=$data->{'hora_termino'};
		     $listado=$controladorSeccion->selectPorHoraTermino($hora);
			 if(!is_null($listado)){
		         echo(json_encode($listado));
		     }else{
			 	  $mensaje["mensajes"]=utf8_encode('No fue posible desplegar el listado de sección');
			      echo(json_encode($mensaje));	
			 }
		     break;
		}
         $controladorSeccion->__destruct();
		 exit();
	}
}
?>