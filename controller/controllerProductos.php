<?php 

class ControllerProductos{

    public function buscarProductosPorNombre($buscado){
        $array = explode(" ",$buscado);
        include_once("../model/modelProductos.php");
        $modelProducto = new ModelProductos();
        $resultado = $modelProducto->filtrarNombreProductos($array);
        if($resultado == false){

        }else{
            if(count($resultado) == 0){
                include("../shared/formMensaje.php");
                $formMensaje = new FormMensaje();
                $formMensaje->formMensajeShow("No se encontraron resultados","","../controller/getProductos.php");
            }else{
                include_once("../view/formListaProductos.php");
                $formLista = new FormListaProductos();
                $formLista->showForm($resultado,$buscado);
            }
        }

    }

}


?>