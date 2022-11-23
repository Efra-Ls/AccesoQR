<?php 

include("con_db.php");

if (isset($_POST['regis'])) {
	    $matricula = $_POST['mat'];
	    $nombre = $_POST['nom'];
		$apellido1 = $_POST['app'];
	    $apellido2 = $_POST['apm'];
		$carrera = $_POST['car'];
	    $correo = $_POST['cor'];
		$telefonopersonal = $_POST['ntp'];
	    $telefonofamiliar = $_POST['ntf'];
		$domicilio = $_POST['dom'];
	    
		

	    $contasenia="1234";

		$contenidoCorreo="El usuario para acceder a tu cuenta AccesoITO es ".$matricula." y la contraseña es ".$contasenia;

		$consultaUsuario = "INSERT INTO usuario(nombre_usuario,contrasenia,tipo) 
		VALUES ('$matricula','$contasenia','estudiante')";
		$resultado = mysqli_query($conex,$consultaUsuario);
		if ($resultado) {	    	
			$consultaEstudiante = "INSERT INTO estudiante(matricula,nombre,apellido1,apellido2,carrera,correo,numero_telefonico,
			numero_emergencia,domicilio,foto,codigoqr,id_usuario) 
			VALUES ('$matricula','$nombre','$apellido1','$apellido2','$carrera','$correo',
					'$telefonopersonal','$telefonofamiliar','$domicilio','NULL','NULL','$matricula')";

			$resultado = mysqli_query($conex,$consultaEstudiante);
			if ($resultado) {
					mail($correo,"Usuario/Contraseña de AccesoITO",$contenidoCorreo);
					//header("Location: ../public/agregar-estudiante.php");
			} else {
				?> 	
				<h3 class="bad">¡Ups ha ocurrido un error! con el estudiante</h3>
   				<?php
			}
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!con el usuario</h3>
           <?php
	    }
	   
}

?>