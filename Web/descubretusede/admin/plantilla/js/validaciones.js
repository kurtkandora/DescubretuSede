function valrun(){
	var M=0, S=1, dvcomp;
	var dv = document.getElementById("dv").value;
	var run = document.getElementById("rut").value;
	switch(dv){
	case 'k':
		dv='K';
		break;
	default:
		break;
	}
	for(;run;run=Math.floor(run/10))
	S=(S+run%10*(9-M++%6))%11;
	dvcomp=S?S-1:'K';
	if(dv==dvcomp){
		document.getElementById("err_rut").innerHTML='';
	}
	else{
		document.getElementById("err_rut").innerHTML='Run Incorrecto'; 
	}
}

function validarnombre() {
	var nombre = document.getElementById("txtnombre").value;
    var patrondenombre = /([a-z ñáéíóú]{2,60})$/;
    if ((nombre.match(patrondenombre)) && (nombre.toString()!='')) {
        document.getElementById("errnombre").innerHTML='';
         return true;
    } else {
		document.getElementById("errnombre").innerHTML='(*)';
		 return false;
      } 
 }
 
 function validarcorreo() {
	var correo = document.getElementById("correo").value;
    var patrondecorreo = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if ((correo.match(patrondecorreo)) && (correo.toString()!='')) {
        document.getElementById("errcorreo").innerHTML='';
         return true;
    } else {
		document.getElementById("errcorreo").innerHTML='(*)';
         return false;
      } 
  }
  
  function validarcontrasena() {
	 var contrasena = document.getElementById("password").value;
    if ((contrasena.length > 7) && (contrasena.toString()!='')) {
        document.getElementById("errcontrasena1").innerHTML='';
        return true;
    } else {
		document.getElementById("errcontrasena1").innerHTML='(*)';
        return false;
      } 
    }
    