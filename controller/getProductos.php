<?php 

include_once("controllerProductos.php");
if(isset($_POST["buscar"])){

    $buscado = $_POST["buscador"];
    $controlProductos = new ControllerProductos();
    $controlProductos->buscarProductosPorNombre($buscado);
}else{
    if(isset($_POST["filtro"])){

    }else{
        include_once("../view/formProductos.php");
        include_once("../model/modelProductos.php");

        $formProductos = new FormProductos();
        $modelProducto = new ModelProductos();
        /* $array = $modelProducto->filtrarNombreProductos(["thing"]); */
        $array = $modelProducto->obtenerProductos();
        $formProductos->showForm($array);
    }
}





?>