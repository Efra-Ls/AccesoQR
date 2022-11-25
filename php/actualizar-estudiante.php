<?php 
    include ("con_db.php");
    $usuario=$_GET['usuario']; 

    $nombre = $_POST["input-nombre"];
	$apellido1 = $_POST["input-apellido1"];
	$apellido2 = $_POST["input-apellido2"];
	$carrera = $_POST["input-carrera"];
	$correo = $_POST["input-correo"];
	$telefono = $_POST["input-telefono"];
	$telefono2 = $_POST["input-telefono2"];
	$domicilio = $_POST["input-direccion"];

    $consulta = "SELECT * FROM estudiante WHERE id_usuario='$usuario';";
    $resultado = mysqli_query($conex,$consulta);
    $rows = mysqli_fetch_assoc($resultado);

    echo "correcto xd";

    $query = "UPDATE `estudiante` SET ";

    if ($rows["nombre"]!=$nombre) {$query = $query . "`nombre`='$nombre', ";}
    if ($rows["apellido1"]!=$apellido1) {$query = $query . "`apellido1`='$apellido1', ";}
    if ($rows["apellido2"]!=$apellido2) {$query = $query . "`apellido2`='$apellido2', ";}
    if ($rows["carrera"]!=$carrera) {$query = $query . "`carrera`='$carrera', ";}
    if ($rows["correo"]!=$correo) {$query = $query . "`correo`='$correo', ";}
    if ($rows["numero_telefonico"]!=$telefono) {$query = $query . "`numero_telefonico`='$telefono', ";}
    if ($rows["numero_emergencia"]!=$telefono2) {$query = $query . "`numero_emergencia`='$telefono2', ";}
    if ($rows["domicilio"]!=$domicilio) {$query = $query . "`domicilio`='$domicilio' ";}

    $query = $query . " WHERE `id_usuario`='$usuario'";

    echo "";
    echo $query;

    if ($conex->query($query) === TRUE) {
        echo "Registro actualizado con éxito";
    } else {
        echo "Error al actualizar registro: ";
    }
      
    $conex->close();

?>