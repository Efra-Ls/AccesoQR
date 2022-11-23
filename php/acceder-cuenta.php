<?php
include("con_db.php");
        $usuario =$_POST['usuario'];
	    $contrasenia = $_POST['contrasenia'];   
		$consulta="SELECT * FROM usuario";
            
	    if (isset($_POST['entrar'])) {
			$resultado = mysqli_query($conex,$consulta);  

			foreach($resultado as $resultad) {
			
				if($resultad['nombre_usuario']==$usuario && $resultad['contrasenia']==$contrasenia && $resultad['tipo']=='estudiante'){
					header("location: ../public/inicio-estudiante.php");
					return;
				}else if($resultad['nombre_usuario']==$usuario && $resultad['contrasenia']==$contrasenia && $resultad['tipo']=='dispositivo'){
					header("location: ../public/inicio-dispositivo.php");
					return;
				}else if($resultad['nombre_usuario']==$usuario && $resultad['contrasenia']==$contrasenia && $resultad['tipo']=='avanzado'){
					header("location: ../public/mostrar-registros.php");
					return;
				}

					header("location: ../public/index.php");
				

			}
	    	
          
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
?>