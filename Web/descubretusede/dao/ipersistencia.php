<?php
      interface IPersistencia{
       	  	
        function create($obj);
	    function read($obj);
	    function update($obj);
	    function delete($obj);
	    function select();
	   
	 }
?>