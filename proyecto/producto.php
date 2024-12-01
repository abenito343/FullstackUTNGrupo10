<?php 

    function borrar_producto($conexion, $id){
        $query = "DELETE FROM productos WHERE id_producto = ".$id;
        return mysqli_query($conexion, $query);
    }

    function agregar_producto($conexion, $producto){
        $query = "INSERT INTO productos (nombre_producto, imagen_producto) VALUES ('".$producto['nombre_producto']."', '".$producto['imagen_producto']."')";
        return mysqli_query($conexion, $query);
    }

?>