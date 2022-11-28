<?php
    include('con_db.php');
if(isset($_GET['matri'])){
    $matricula=$_GET['matri']; 
    $usuario=$_GET['usuario']; 
    $fecha=date('y/m/d');      
    $hora = date('h:i:s');   
    $tipoReg="ENTRADA";
    $consulta="SELECT * FROM dispositivo WHERE id_usuario='$usuario'";
    $resultado = mysqli_query($conex,$consulta);  
    $rows = mysqli_fetch_assoc($resultado);
    $NE=0;
    $NS=0;
    $consultaReg="SELECT * FROM registros WHERE matricula='$matricula' AND fecha='$fecha'";
    $resultadoReg = mysqli_query($conex,$consultaReg);  
    foreach($resultadoReg as $resultad) {			
        if($resultad['tipo_registro']=='ENTRADA'){
            $NE=$NE+1;
        }
        if($resultad['tipo_registro']=='SALIDA'){
            $NS=$NS+1;
        }
    }
    if($NE==$NS){
        $tipoReg="ENTRADA";
    }else if($NE>$NS){
        $tipoReg="SALIDA";
    }

    $insertar = "INSERT INTO registros(matricula,dispositivo,fecha,hora,tipo_registro) 
      VALUES ('$matricula','$rows[id_dispositivo]','$fecha','$hora','$tipoReg')";
    $resultado = mysqli_query($conex,$insertar);
    if($resultado){
        echo 'Registrado correctamente';        
    }else{
        echo 'error!!';
    }
}            
?>