<?php

    if (isset($_POST["filtrar"])){
        $tipo = $_POST['tipo_producto'];
        $categoria = $_POST['categoria_producto'];
        $serie = $_POST['serie_producto'];
        
        include_once('controllerProductos.php');
        $objControllerProductosFiltrados = new ControllerProductos;
        $objControllerProductosFiltrados -> listarProductosFiltrados($tipo, $categoria, $serie);
    }
?>