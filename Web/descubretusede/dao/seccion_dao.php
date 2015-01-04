<?php
    require_once '../utils/mysqldb.php';
	require_once '../model/seccion.php';
	require_once '../dao/ipersistencia.php';
	require_once'../model/seccion_detalle.php';
	
	class SeccionDao implements IPersistencia
	{
		 private $mysql_con;
	 
	   function __construct(){
	 	 $this->mysql_con = new MySqlConnection();
	   }
	   
	    function create($obj)
	   {
	   	$seccion=new Seccion();
		$seccion=$obj;
	   	try{
		    $query ='INSERT INTO `seccion`(`ID_SECCION`, `ID_ASIGNATURA`, `ID_AULA`,`ID_HORARIO`,`JORNADA`, `PROFESOR`) VALUES (?,?,?,?,?,?);';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iiiiss",$seccion->id_seccion,$seccion->id_asignatura,$seccion->id_aula,$seccion->id_horario,$seccion->jornada,$seccion->profesor);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			$seccion->__destruct();
		}
		catch(exception $e){
		 	 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	   
	   function read($obj)
		{
	   $seccion=new Seccion();
		$seccion=$obj;
		try{
			$query = 'SELECT `ID_SECCION`, `ID_ASIGNATURA`, `ID_AULA`, `ID_HORARIO`, `JORNADA`, `PROFESOR` FROM `seccion` WHERE `ID_SECCION`=? ;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$seccion->id_seccion);
			if($sentencia->execute()){
				$sentencia->bind_result($id_seccion,$id_asignatura,$id_aula,$id_horario,$jornada,$profesor);					
	            while($sentencia->fetch()){
					$seccion->__destruct();
					$seccion->init($id_seccion, $id_asignatura, $id_aula, $id_horario, $jornada, $profesor);
	            }	
			}
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return FALSE;
		  }
		 return $seccion;
	   }
		
		function update($obj){
	    $seccion=new Seccion();
		$seccion=$obj;
	   	try{
		    $query = 'UPDATE `seccion` SET `ID_ASIGNATURA`=?,`ID_AULA`=?,`ID_HORARIO`=?,`JORNADA`=?,`PROFESOR`= ? WHERE `ID_SECCION`=?';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("iissi",$seccion->id_asignatura,$seccion->id_aula,$seccion->id_horario,$seccion->jornada,$seccion->profesor,$seccion->id_seccion);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			$seccion->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
		
		function delete($obj){
	   	$seccion=new Seccion();
		$seccion=$obj;
	   	try{
		    $query = 'DELETE FROM `seccion` WHERE `ID_SECCION` = ? ;';
			$sentencia = $this->mysql_con->prepare($query);
			$sentencia->bind_param("i",$seccion->id_seccion);
			$sentencia->execute();
			if($this->mysql_con->affected_rows){
				$this->mysql_con->commit();
				return TRUE;
			}else{
				$this->mysql_con->rollback();
				return FALSE;
			}
			$seccion->__destruct();
		}
		catch(exception $e){
			 $this->mysql_con->close();
			 error_log($e);
			 return FALSE;
		 }
	   }
	 function select(){
	   	$indice=0;
		$datos_seccion=null;
		try{
			$query = 'SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
             FROM seccion sec , asignatura asig , aula aul , horario hor 
             WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO;';
			$sentencia = $this->mysql_con->prepare($query);
			if($sentencia->execute()){
				$sentencia->bind_result($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);					
	            while($sentencia->fetch()){
	            	  $seccion = new SeccionDetalle();
					  $seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
					  $datos_seccion[$indice]=$seccion;
					  $indice++;
					  $seccion->__destruct();
	            }	
			}
			//$this->mysql_con->close();
		}
		catch(exception $e){
			$this->mysql_con->close();
			error_log($e);
			return false;
		  }
		 return $datos_seccion;
	   }
	   
	   
	  function selectPorSession($seccion){
	    $datos_seccion=null;
	    $indice=0;
	   try {
             $query='SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
             FROM seccion sec , asignatura asig , aula aul , horario hor 
             WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO AND sec.ID_SECCION = ?';
             $sentencia = $this->mysql_con->prepare($query);
	         $sentencia->bind_param("i",$seccion);
             if($sentencia->execute()){
             $sentencia->bind_result($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);					
	         while($sentencia->fetch()){
                $detalle_seccion = new SeccionDetalle();
			    $detalle_seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
                $datos_seccion[$indice]=$detalle_seccion;
				$indice++;
                $detalle_seccion->__destruct();
                
	         }
          }
          //$this->mysql_con->close();
       }
      catch(Exception $e){
          $this->mysql_con->close();
		  error_log($e);
        }
        return $datos_seccion;	
	   }

	   function selectPorDocente($nombreDocente){
	   	 $datos_seccion=null;
		 $indice=0;
	    try {  
              $query='SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
              FROM seccion sec , asignatura asig , aula aul , horario hor 
              WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO AND sec.PROFESOR LIKE ?';
              $sentencia = $this->mysql_con->prepare($query);
			  $like_nombre = "%".$nombreDocente."%";
	          $sentencia->bind_param("s",$like_nombre);
              if($sentencia->execute()){
              $sentencia->bind_result($id_seccion,$jornada,$profesor,$nombre_asignatura,$nombre_aula,$hora_inicio,$hora_termino,$dia_clases);					
	          while($sentencia->fetch()){
                $detalle_seccion = new SeccionDetalle();
			    $detalle_seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
                $datos_seccion[$indice]=$detalle_seccion;
                $detalle_seccion->__destruct();
                $indice++;
	        }
          }
           // $this->mysql_con->close();
        }
       catch(Exception $e){
          $this->mysql_con->close();
		  error_log($e);
        }
        return $datos_seccion;	
	   }

	   function selectPorAsignatura($asignatura){
	   	 $datos_seccion=null;
		 $indice=0;
	    try {  
              $query='SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
              FROM seccion sec , asignatura asig , aula aul , horario hor 
              WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO AND asig.NOMBRE_ASIGNATURA LIKE ?';
              $sentencia = $this->mysql_con->prepare($query);
			  $like_asignatura = "%".$asignatura."%";
	          $sentencia->bind_param("s",$like_asignatura);
              if($sentencia->execute()){
              $sentencia->bind_result($id_seccion,$jornada,$profesor,$nombre_asignatura,$nombre_aula,$hora_inicio,$hora_termino,$dia_clases);					
	          while($sentencia->fetch()){
                $detalle_seccion = new SeccionDetalle();
			    $detalle_seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
                $datos_seccion[$indice]=$detalle_seccion;
                $detalle_seccion->__destruct();
                $indice++;
	        }
          }
            //$this->mysql_con->close();
        }
       catch(Exception $e){
          $this->mysql_con->close();
		  error_log($e);
         }
          return $datos_seccion;	
	   }

	   function selectPorAula($sala){
	   	 $datos_seccion=null;
		 $detalle_seccion = null;
		 $indice=0;
	    try{  
             $query='SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
             FROM seccion sec , asignatura asig , aula aul , horario hor 
             WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO AND aul.NOMBRE_AULA LIKE ?';
             $sentencia = $this->mysql_con->prepare($query);
			 $like_sala = "%".$sala."%";
	         $sentencia->bind_param("s",$like_sala);
             if($sentencia->execute()){
             $sentencia->bind_result($id_seccion,$jornada,$profesor,$nombre_asignatura,$nombre_aula,$hora_inicio,$hora_termino,$dia_clases);					
	         while($sentencia->fetch()){
	         	$detalle_seccion = new SeccionDetalle();
			    $detalle_seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
                $datos_seccion[$indice]=$detalle_seccion;
                $detalle_seccion->__destruct();
                $indice++;
	          }
           }
             //$this->mysql_con->close();
        }
        catch(Exception $e){
            $this->mysql_con->close();
		    error_log($e);
         }
         return $datos_seccion;	
	   }

	   function selectPorJornada($jornada){
	   	 $datos_seccion=null;
		 $indice=0;
	    try{  
             $query='SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
             FROM seccion sec , asignatura asig , aula aul , horario hor 
             WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO AND sec.JORNADA LIKE ?';
             $sentencia = $this->mysql_con->prepare($query);
			 $like_jornada = "%".$jornada."%";
	         $sentencia->bind_param("s",$like_jornada);
             if($sentencia->execute()){
             $sentencia->bind_result($id_seccion,$jornada,$profesor,$nombre_asignatura,$nombre_aula,$hora_inicio,$hora_termino,$dia_clases);					
	         while($sentencia->fetch()){
	           $detalle_seccion = new SeccionDetalle();
			   $detalle_seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
               $datos_seccion[$indice]=$detalle_seccion;
               $detalle_seccion->__destruct();
               $indice++;
	        }
          }
           //$this->mysql_con->close();
        }
        catch(Exception $e){
          $this->mysql_con->close();
		  error_log($e);
         }
         return $datos_seccion;	
	   }

	  function selectPorDia($dia){
	  	 $datos_seccion=null;
		 $indice=0;
	    try{  
             $query='SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
             FROM seccion sec , asignatura asig , aula aul , horario hor 
             WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO AND hor.DIA_CLASES LIKE ?';
             $sentencia = $this->mysql_con->prepare($query);
			 $like_dia = "%".$dia."%";
	         $sentencia->bind_param("s",$like_dia);
             if($sentencia->execute()){
             $sentencia->bind_result($id_seccion,$jornada,$profesor,$nombre_asignatura,$nombre_aula,$hora_inicio,$hora_termino,$dia_clases);					
	         while($sentencia->fetch()){
	           $detalle_seccion = new SeccionDetalle();
			   $detalle_seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
               $datos_seccion[$indice]=$detalle_seccion;
               $detalle_seccion->__destruct();
               $indice++;
	         }
           }
              $this->mysql_con->close();
         }
        catch(Exception $e){
          $this->mysql_con->close();
		  error_log($e);
          }
        return $datos_seccion;	
	   }

	   
	  function selectPorHoraInicio($HoraInicio){
	  	 $datos_seccion=null;
		 $indice=0;
	    try{  
             $query='SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
             FROM seccion sec , asignatura asig , aula aul , horario hor 
             WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO AND hor.HORA_INICIO LIKE ?';
             $sentencia = $this->mysql_con->prepare($query);
			 $like_hora_inicio = "%".$HoraInicio."%";
	         $sentencia->bind_param("s",$like_hora_inicio);
             if($sentencia->execute()){
             $sentencia->bind_result($id_seccion,$jornada,$profesor,$nombre_asignatura,$nombre_aula,$hora_inicio,$hora_termino,$dia_clases);					
	         while($sentencia->fetch()){
	           $detalle_seccion = new SeccionDetalle();
			   $detalle_seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
               $datos_seccion[$indice]=$detalle_seccion;
               $detalle_seccion->__destruct();
               $indice++;
	        }
          }
            //$this->mysql_con->close();
        }
        catch(Exception $e){
            $this->mysql_con->close();
		    error_log($e);
         }
        return $datos_seccion;	
	   }

	  function selectPorHoraTermino($HoraTermino){
	  	 $datos_seccion=null;
		 $indice=0;
	    try{ 
             $query='SELECT sec.ID_SECCION,sec.JORNADA,sec.PROFESOR,asig.NOMBRE_ASIGNATURA,aul.NOMBRE_AULA,hor.HORA_INICIO,hor.HORA_TERMINO,hor.DIA_CLASES 
             FROM seccion sec , asignatura asig , aula aul , horario hor 
             WHERE sec.ID_ASIGNATURA = asig.ID_ASIGNATURA AND sec.ID_AULA = aul.ID_AULA AND hor.ID_HORARIO = sec.ID_HORARIO AND hor.HORA_TERMINO LIKE ?';
             $sentencia = $this->mysql_con->prepare($query);
			 $like_hora_termino = "%".$HoraTermino."%";
	         $sentencia->bind_param("s",$like_hora_termino);
             if($sentencia->execute()){
             $sentencia->bind_result($id_seccion,$jornada,$profesor,$nombre_asignatura,$nombre_aula,$hora_inicio,$hora_termino,$dia_clases);					
	         while($sentencia->fetch()){
               $detalle_seccion = new SeccionDetalle();
			   $detalle_seccion->init($id_seccion, $jornada, $profesor, $nombre_asignatura, $nombre_aula, $hora_inicio, $hora_termino, $dia_clases);
               $datos_seccion[$indice]=$detalle_seccion;
               $detalle_seccion->__destruct();
               $indice++;
			 }
           } 
              //$this->mysql_con->close();
         }
       catch(Exception $e){
             $this->mysql_con->close();
		     error_log($e);
           }
          return $datos_seccion;	
	   }

	   function __destruct() {
          unset($this);
       }
	}
?>