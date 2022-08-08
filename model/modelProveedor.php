<?php
include_once('../shared/conexionBD.php');
class ModelProveedor{

    function registrarProveedor($ruc,$nombre,$correo,$telefono){
        $conn=conexionBD::Obtenerinstancia()->conexion;
        $consulta = "INSERT INTO proveedor(ruc,nombre,correo,telefono) 
        VALUES('$ruc','$nombre','$correo','$telefono')";
        $resultado=$conn->prepare($consulta);
        $resultado->execute();
        if($resultado){
            return 1;
        }
        return 0;
    }

}


?>