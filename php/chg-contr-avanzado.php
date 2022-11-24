<?php 

include("con_db.php");

if (isset($_POST['regis'])) {
        $destino = "efrainlpzsnchz@gmail.com";
	    $nombreUs = $_POST['nus'];
	    $contrA = $_POST['cac'];
		$contrN = $_POST['cnu'];
	    $contrC = $_POST['ccf'];
        $contenidoCorreo="La nueva contraseña para el usuario ".$nombreUs."es ".$contrN;
        $consultaSelec="SELECT * FROM usuario where nombre_usuario='$nombreUs'";
        $resultadoSelec = mysqli_query($conex,$consultaSelec); 
        foreach($resultadoSelec as $resultad) {
            if($resultad['contrasenia']==$contrA){
                if($contrN==$contrC){
                    $consultaUsuario = "UPDATE usuario
		            SET contrasenia= '$contrN' where nombre_usuario='$nombreUs'";
		            $resultado = mysqli_query($conex,$consultaUsuario);
			        if ($resultado) {
    					mail($destino,"Contraseña actualizada AccesoITO",$contenidoCorreo);
				         echo 'Contraseña actualizada';
                        return;
	    				//header("Location: ../public/agregar-estudiante.php");
			        } else {
				        echo 'Error';
			        }
                }else{
                    echo 'No coinciden las contraseñas';
                   return;
                }
               
            }else{
                echo 'Contraseña actual incorrecta';
                return;
            }
                //header("location: ../public/index.php");
            

        }
        

		

		
	   
}

?>