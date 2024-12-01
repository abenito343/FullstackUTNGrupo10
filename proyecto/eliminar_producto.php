<?php 

require 'conexion_base.php';
require 'producto.php';
/*
include 'conexion_base.php';
require_once 'conexion_base.php';
include_once 'conexion_base.php';
*/

/*
//SIEMPRE ANDABA PERFECTO? NO!!! si no existe la posicion ID, esto tira un warning!
$id_producto = $_GET["id"];
*/

/*
if(isset($_GET["id"])){
    $id_producto = $_GET["id"];
}
else{
    //aca veo que hago
}
*/

// if ternario => (condicion) ? accion verdadero : accion falso
$id_producto = ((isset($_GET["id"]) ? ($_GET["id"]) : 0));

if(!empty($id_producto)){
    if(is_numeric($id_producto)){
        //VAMOS A ELIMINAR EL PRODUCTO!!
        $conexion = conectar_base();

        $resultado = borrar_producto($conexion, $id_producto);
        //if($resultado){
        if(!empty($resultado)){
            //salio bien!
            echo "Salio todo bien!";
            echo "<br>";
            header('Location: productos.php');
        }
        else{
            //salio mal!
            echo "Salio todo mal!";
            echo "<br>";
        }

        desconectar_base($conexion);
    }
    else{
        echo "Hubo un error al pasar los datos!";
        echo "<br>";
    }
}
else{
    echo "Hubo un error al pasar los datos!";
    echo "<br>";
}








?>