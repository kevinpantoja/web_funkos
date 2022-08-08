<?php
session_start();

if (isset($_POST['btnHistorial'])) {
    include_once("view/formHistorialCompras.php");
    include_once("model/modelOrdenCompra.php");

    $arr = (new ModelOrdenCompra())->listarOrdenesDeCompra($idCliente);

    $obj = new FormHistorialCompras();
    $obj->showFormHistorialCompras($arr);
} else if (isset($_POST['btnCancelar'])) {
    $idOrdenCompra = $_POST['txtIdOrdenCompra'];

    include_once('controllerOrdenCompra.php');

    $objControllerOrdenCompra = new ControllerOrdenCompra();
    $objControllerOrdenCompra->cancelarOrdenCompra($idOrdenCompra);
} else {
    include_once('../shared/formMensaje.php');

    $objformMensaje = new formMensaje;
    $objformMensaje->formMensajeShow("error.png", "Error, se ha detectado un acceso no permitido.", "<a href='../index.php'>Ir al inicio</a>");
}
