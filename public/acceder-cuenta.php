<?php

        $usuario =$_POST['usuario'];
	    $contrasenia = $_POST['contrasenia'];       
	    if (isset($_POST['entrar'])) {
	    	require("inicio-estudiante.php");
          
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
?>