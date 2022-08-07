<?php
    session_start();
    include_once('controllerDatosPersonales.php');

    $objControllerDatosPersonales = new ControllerDatosPersonales;
    $objControllerDatosPersonales -> getDatosPersonales($_SESSION["cuenta"]);
?>