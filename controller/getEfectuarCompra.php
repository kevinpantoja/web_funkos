<?php 


if(isset($_POST["btnCompra"])){
    include("../model/modelCarrito.php");
    $modelCarrito = new modelCarrito();
    session_start();
    $datos = $modelCarrito->datosCarro($_SESSION["cuenta"]);
    $getCompra = new GetEfectuarCompra();
    $monto = $getCompra->costoTotal($datos);
    include("../view/formEfectuar.php");
    $formEfectuar = new FormEfectuar();
    $formEfectuar->showFormComprar($datos,$monto);
}else{
    include_once('../shared/formMensaje.php');
    $objformMensaje = new formMensaje;
    $objformMensaje->formMensajeShow("error.png", "Error, acceso no permitido.", "<a href='../index.php'>Regresar</a>");
}

class GetEfectuarCompra{
    public function costoTotal($datos){
        $monto = 0;
        foreach($datos as $fila){
            $monto = $monto + $fila["precio_prod"]*$fila["cantidad"];
        }
        return $monto;
    }
}

?>