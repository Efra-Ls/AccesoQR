<?php 
    include ("con_db.php");
    $usuario=$_GET['usuario']; 

    $datos = array();
    $names = array("nombre", "apellido1", "apellido2", "carrera", "correo", "numero_telefonico", "numero_emergencia", "domicilio","foto");

    array_push($datos,$_POST["input-nombre"]);
    array_push($datos,$_POST["input-apellido1"]);
    array_push($datos,$_POST["input-apellido2"]);
    array_push($datos,$_POST["input-carrera"]);
    array_push($datos,$_POST["input-correo"]);
    array_push($datos,$_POST["input-telefono"]);
    array_push($datos,$_POST["input-telefono2"]);
    array_push($datos,$_POST["input-direccion"]);
    array_push($datos,$_POST["input-img"]);

    $consulta = "SELECT nombre, apellido1, apellido2, carrera, correo, numero_telefonico, numero_emergencia, domicilio, foto FROM estudiante WHERE id_usuario='$usuario';";
    $resultado = mysqli_query($conex,$consulta);
    $rows = mysqli_fetch_array($resultado);

    $query = "UPDATE `estudiante` SET ";

    $c = 0;

    for ($x = 0; $x < 9; $x++) {
        if ($rows[$x] != $datos[$x]) {
            if ($c != 0) {
                $query = $query . ",";
            }
            $query = $query . " $names[$x] = '$datos[$x]'";
            $c++;
        }
    }

    $query = $query . " WHERE `id_usuario`='$usuario'";

    //echo "";
    //echo $query;

    if ($conex->query($query) === TRUE) {
        header("location: ../public/inicio-estudiante.php?usuario=$usuario");
        echo "Registro actualizado con éxito";
    } else {
        echo "Error al actualizar registro: ";
    }
      
    $conex->close();

?>