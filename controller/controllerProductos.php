<?php 

class ControllerProductos{

    public function buscarProductosPorNombre(){

    }

    public function listarProductos()
    {
        include_once('../model/modelProductos.php');
        $objProducto= new Producto;
        $lista = $objProducto -> listarProductos();
        $tipos = $objProducto -> listarFiltros('tipo_producto');
        $categorias = $objProducto -> listarFiltros('categoria_producto');
        $series = $objProducto -> listarFiltros('serie_producto');
        include_once('../view/formProductos.php');
        $obj=new formProducto();
        $obj->showProductos($lista, $tipos, $categorias, $series);
    }
    
    public function listarProductosFiltrados($tipo, $categoria, $serie)
    {
        include_once('../model/modelProductos.php');
        $objProducto = new Producto;
        $lista = $objProducto -> listarProductosFiltrados($tipo, $categoria, $serie);

        if(count($lista) == 0) {
            include("../shared/formMensaje.php");
            $formMensaje = new FormMensaje();
            $formMensaje->showMensaje("No hay resultados para los filtros seleccionados","","Regresar","../controller/getProductos.php");
        } else {
            include_once('../view/formProductos.php');
            $obj=new formProducto();
            $tipos = $objProducto -> listarFiltros('tipo_producto');
            $categorias = $objProducto -> listarFiltros('categoria_producto');
            $series = $objProducto -> listarFiltros('serie_producto');
            $obj->showProductos($lista, $tipos, $categorias, $series);
        }
       
    }
}
?>