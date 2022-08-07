<?php

if (isset($_POST['agregar_carrito'])) {
    $prod_id = $_POST['producto_id'];

    if ($prod_id > 0) {
        $prod_nombre = $_POST['producto_nombre'];
        $prod_precio = $_POST['producto_precio'];
        $prod_cantidad = $_POST['producto_cantidad'];
        $prod_image = $_POST['producto_image'];

        if ($prod_precio > 0 && $prod_cantidad > 0) {
            include_once("./controllerCarrito.php");
            $obj = new controllerCarrito();
            $obj->agregarCarrito($prod_id, $prod_nombre, $prod_precio, $prod_cantidad, $prod_image);
        }
    }
}

if (isset($_POST['update_carrito'])) {
    $id = $_POST['carrito_id'];
    $cantidad = $_POST['carrito_cantidad'];

    if (!empty($id)) {
        include_once("./controllerCarrito.php");
        $obj = new controllerCarrito();
        $obj->actualizarProducto($id, $cantidad);
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    
    include_once("./controllerCarrito.php");
     $obj = new controllerCarrito();
     $obj->eliminarProducto($delete_id);

}

if (isset($_GET['delete_all'])) {
    $delete_id = $_GET['delete_all'];
    include_once("./controllerCarrito.php");
    $obj = new controllerCarrito();
    $obj->eliminarProductos();
}


if (isset($_POST['btnContinuarComprando'])) {
    include_once("./controllerCarrito.php");
    $obj = new controllerCarrito();
    $obj->showProductos();
}
