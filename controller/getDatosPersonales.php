<?php
    session_start();
    include_once('controllerDatosPersonales.php');

    $objControllerDatosPersonales = new ControllerDatosPersonales;
    if(isset($_SESSION["cuenta"])){
        $objControllerDatosPersonales -> getDatosPersonales($_SESSION["cuenta"]);
    }
    else{
        include_once('../shared/formMensaje.php');
		$objformMensaje = new formMensaje;
		$objformMensaje -> formMensajeShow("error.png","Error, Se ha detectado un acceso no permitido","<a href='../index.php'>Ir al inicio </a>");
    }    


?>