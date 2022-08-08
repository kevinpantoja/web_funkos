<?php 

include_once("controllerProductos.php");
if(isset($_POST["buscar"])){

    $buscado = $_POST["buscador"];
    if(!preg_match("/^\s*$/",$buscado)){
        $controlProductos = new ControllerProductos();
        $controlProductos->buscarProductosPorNombre($buscado);
    }else{
        include("../shared/formMensaje.php");
        $formMensaje = new FormMensaje();
        $formMensaje->FormMensajeShow("error.png","Error: rellene el campo, buscador vacío","<a href='../controller/getProductos.php'>Regresar</a>");
    }
}else{
    if(isset($_POST["filtrar"])){
        $tipo = $_POST['tipo_producto'];
        $categoria = $_POST['categoria_producto'];
        $serie = $_POST['serie_producto'];
        
        include_once('controllerProductos.php');
        $objControllerProductosFiltrados = new ControllerProductos;
        $objControllerProductosFiltrados -> listarProductosFiltrados($tipo, $categoria, $serie);
    }else{
        include_once('../model/modelProductos.php');
        $objProducto= new ModelProductos();
        $lista = $objProducto -> listarProductos();
        $tipos = $objProducto -> listarFiltros('tipo_producto');
        $categorias = $objProducto -> listarFiltros('categoria_producto');
        $series = $objProducto -> listarFiltros('serie_producto');
        include_once('../view/formProductos.php');
        $obj=new FormProductos();
        $obj->showFormProductos($lista, $tipos, $categorias, $series);
    }
}





?>