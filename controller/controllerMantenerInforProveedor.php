<?php 




class ControllerMantenerInforProveedor{

function registrarProveedor($ruc,$nombre,$correo,$telefono){
    include("../model/modelProveedor.php");
    $model = new ModelProveedor();
    $resultado = $model->registrarProveedor($ruc,$nombre,$correo,$telefono);
    if($resultado == 1){
        return true;
    }
    return false;
}
}

?>