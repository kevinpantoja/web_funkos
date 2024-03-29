<?php

class ControllerOrdenCompra
{
    public function cancelarOrdenCompra($idOrdenCompra)
    {
        include_once("../model/modelOrdenCompra.php");
        include("../shared/formMensaje.php");

        $objOrdenCompra = new ModelOrdenCompra();
        $respuesta = $objOrdenCompra->obtenerEstadoOrdenCompra($idOrdenCompra);
        $formMensaje = new FormMensaje();

        switch ($respuesta["estado"]) {
            case -1:
                $formMensaje->FormMensajeShow("error.png", "Error, inténtelo más tarde.", "<a href='../controller/getOrdenCompra.php'>Regresar</a>");
                break;
            case "en proceso de entrega":
                $formMensaje->FormMensajeShow("info.png", "El pedido está en proceso de entrega.", "<a href='../controller/getOrdenCompra.php'>Regresar</a>");
                break;
            case "entregado":
                $formMensaje->FormMensajeShow("info.png", "El pedido ha sido entregado.", "<a href='../controller/getOrdenCompra.php'>Regresar</a>");
                break;
            default:
                $objOrdenCompra->eliminarOrdenCompra($idOrdenCompra);
                $formMensaje->FormMensajeShow("check.png", "Orden de compra cancelada con éxito.", "<a href='../controller/getOrdenCompra.php'>Regresar</a>");
                break;
        }
    }
}
