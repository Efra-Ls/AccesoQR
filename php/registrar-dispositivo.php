<?php 

include("con_db.php");

if (isset($_POST['regis'])) {
	    $id_dispositivo = $_POST['cdi'];
	    $entrada = $_POST['nen'];
		$descripcion = $_POST['des'];
	    $id_usuario = "DIS".$id_dispositivo;
		$contrasenia = "1234";

        $destino = "efrainlpzsnchz@gmail.com";

		$contenidoCorreo="El usuario para acceder al dispositivo".$id_dispositivo."en  AccesoITO es ".$id_usuario." y la contraseña es ".$contrasenia;

		$consultaUsuario = "INSERT INTO usuario(nombre_usuario,contrasenia,tipo) 
		VALUES ('$id_usuario','$contrasenia','dispositivo')";
		$resultado = mysqli_query($conex,$consultaUsuario);
		if ($resultado) {	    	
			$consultaEstudiante = "INSERT INTO dispositivo(id_dispositivo,descripcion,numero_posicion,id_usuario) 
			VALUES ('$id_dispositivo','$descripcion','$entrada','$id_usuario')";

			$resultado = mysqli_query($conex,$consultaEstudiante);
			if ($resultado) {
					mail($destino,"Usuario/Contraseña Dispositivo de AccesoITO",$contenidoCorreo);
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