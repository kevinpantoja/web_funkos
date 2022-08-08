<?php
    session_start();
    if(isset($_POST['actualizar'])){
        $nombre=trim($_POST['nombre']);
        $ap_paterno=trim($_POST['apaterno']);
        $ap_materno=trim($_POST['amaterno']);
        $genero=trim($_POST['genero']);
        $email=trim($_POST['email']);
        $direccion=trim($_POST['direccion']);
        $telefono=trim($_POST['telefono']);
        
        include_once('../controller/controllerDatosPersonales.php');
        $objController = new ControllerDatosPersonales;
        $objController -> validarCampos($_SESSION["cuenta"],$nombre,$ap_paterno, $ap_materno, $genero, $email, $direccion, $telefono);
    } else {
        include_once('../shared/formMensaje.php');
		$objformMensaje = new formMensaje;
		$objformMensaje -> formMensajeShow("error.png","Error, Se ha detectado un acceso no permitidos","<a href='../index.php'>Ir al inicio </a>");
    }
?>