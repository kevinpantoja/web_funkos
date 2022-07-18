<?php 
    include_once('controllerProductos.php');
    
    $objControlProductos = new controllerProductos;
    $objControlProductos -> listarProductos();
    
    
?>