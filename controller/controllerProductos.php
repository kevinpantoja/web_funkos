<?php 

class ControllerProductos{

    public function buscarProductosPorNombre($buscado){
        $array = explode(" ",$buscado);
        include_once("../model/modelProductos.php");
        $objProducto= new ModelProductos();
        $resultado = $objProducto -> filtrarNombreProductos($array);
        $tipos = $objProducto -> listarFiltros('tipo_producto');
        $categorias = $objProducto -> listarFiltros('categoria_producto');
        $series = $objProducto -> listarFiltros('serie_producto');

        if($resultado == false){
            include("../shared/formMensaje.php");
            $formMensaje = new FormMensaje();
            $formMensaje->FormMensajeShow("info.png","No hay resultados con los terminos buscados","<a href='../controller/getProductos.php'>Regresar</a>");
        }else{
            if(count($resultado) == 0){
                include("../shared/formMensaje.php");
                $formMensaje = new FormMensaje();
                $formMensaje->FormMensajeShow("info.png","No hay resultados con los términos buscados","<a href='../controller/getProductos.php'>Regresar</a>");
            }else{
                include_once("../view/formListaProductos.php");
                $formLista = new FormListaProductos();
                $formLista->showFormListaProductos($resultado,$tipos, $categorias, $series, $buscado);
            }
        }

    }

    public function listarProductos()
    {
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

    public function listarProductosFiltrados($tipo, $categoria, $serie)
    {
        include_once('../model/modelProductos.php');
        $objProducto = new ModelProductos();
        $lista = $objProducto -> listarProductosFiltrados($tipo, $categoria, $serie);

        if(count($lista) == 0) {
            include("../shared/formMensaje.php");
            $formMensaje = new FormMensaje();
            $formMensaje->FormMensajeShow("info.png","No hay resultados para los filtros seleccionados","<a href='../controller/getProductos.php'>Regresar</a>");
        } else {
            include_once('../view/formProductos.php');
            $obj=new FormProductos();
            $tipos = $objProducto -> listarFiltros('tipo_producto');
            $categorias = $objProducto -> listarFiltros('categoria_producto');
            $series = $objProducto -> listarFiltros('serie_producto');
            $obj->showFormProductos($lista, $tipos, $categorias, $series);
        }
       
    }

}


?>