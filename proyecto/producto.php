<?php 

    function borrar_producto($conexion, $id){
        $query = "DELETE FROM productos WHERE id_producto = ".$id;
        return mysqli_query($conexion, $query);
    }

    function agregar_producto($conexion, $producto){
        $query = "INSERT INTO productos (nombre_producto, imagen_producto) VALUES ('".$producto['nombre_producto']."', '".$producto['imagen_producto']."')";
        return mysqli_query($conexion, $query);
    }
    function editar_producto($conexion, $producto){
        $query = "UPDATE productos SET nombre_producto = '".$producto['nombre_producto']."'";
        if(isset($producto['imagen_producto'])){
            $query .= ", imagen_producto = '".$producto['imagen_producto']."'";
        }
        if(isset($producto['imagen2_producto'])){
            $query .= ", imagen2_producto = '".$producto['imagen2_producto']."'";
        }
        $query .= " WHERE id_producto = ".$producto['id_producto'];
        return mysqli_query($conexion, $query);
    }
?>