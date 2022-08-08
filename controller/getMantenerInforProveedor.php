<?php 

if(isset($_POST["btnProveedor"])){
    $registrar = new GetMantenerInforProveedor();
    $ruc = $_POST["ruc"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $validacionCampos = $registrar->validarCampos($ruc,$nombre,$correo,$telefono);
    if($validacionCampos){

    }else{
        include_once('../shared/formMensaje.php');
        $objformMensaje = new formMensaje;
        $objformMensaje->formMensajeShow("error.png", "Error, formato inválido de los datos enviados.", "<a href='../index.php'>Regresar</a>");
    }

}else{
    include_once('../shared/formMensaje.php');
    $objformMensaje = new formMensaje;
    $objformMensaje->formMensajeShow("error.png", "Error, se ha detectado un acceso no permitido.", "<a href='../index.php'>Ir al inicio</a>");
}

class GetMantenerInforProveedor{
    function validarCampos($ruc,$nombre,$correo,$telefono){
        $regRuc = "/^[0-9]{11}$/";
        $regNombre = "/^([a-zA-Z]{3,30}\s*)+$/";
        $regCorreo = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
        if(preg_match($regRuc,$ruc) && preg_match($regNombre,$nombre) && preg_match($regCorreo,$correo) && ($telefono >= 100000000) && ($telefono <= 999999999)){
            return true;
        }else{
            return false;
        }
    }
}


?>