<?php 

    function conectar_base(){
        $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "full_stack");
        return $conexion;
    }

    function desconectar_base($conexion){
        mysqli_close($conexion);
    }

?>