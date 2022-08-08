<?php
include_once("../shared/conexionBD.php");
class ModelProductos
{

    function obtenerProductos()
    {
        try {
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $query = $conexion->query("SELECT * FROM producto");
            $items = [];
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = [];
                $item["idProducto"] = $row["idProducto"];
                $item["nombreProducto"] = $row["nombreProducto"];
                $item["precioProducto"] = $row["precioProducto"];
                $item["stockProducto"] = $row["stockProducto"];
                $item["tipoProducto"] = $row["tipoProducto"];
                $item["categoriaProducto"] = $row["categoriaProducto"];
                $item["serieProducto"] = $row["serieProducto"];
                $item["idProveedor"] = $row["idProveedor"];
                $item["imgProducto"] = $row["imgProducto"];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listarFiltros($tabla)
    {
        $conexion = ConexionBD::obtenerInstancia()->conexion;
        $resultado = $conexion->query('SELECT * FROM ' . $tabla);
        $total = [];
        while ($resultados = $resultado->fetch(PDO::FETCH_ASSOC)) {
            array_push($total, $resultados);
        }
        return $total;
    }

    public function listarProductosFiltrados($tipo, $categoria, $serie)
    {
        $conn = ConexionBD::obtenerInstancia()->conexion;

        $where = "";
        if ($tipo == 0 and $categoria == 0 and $serie == 0) {
            $where = "";
        } else
        if ($tipo == 0) {
            if ($categoria == 0)
                $where = "where serieProducto like '" . $serie . "'";
            else if ($serie == 0)
                $where = "where categoriaProducto like '" . $categoria . "'";
            else
                $where = "where categoriaProducto like '" . $categoria . "' and serieProducto like '" . $serie . "'";
        } else 
        
        if ($categoria == 0) {
            if ($tipo == 0)
                $where = "where serieProducto like '" . $serie . "'";
            else if ($serie == 0)
                $where = "where tipoProducto like '" . $tipo . "'";
            else
                $where = "where tipoProducto like '" . $tipo . "' and serieProducto like '" . $serie . "'";
        } else 
        
        if ($serie == 0) {
            if ($tipo == 0)
                $where = "where categoriaProducto like '" . $categoria . "'";
            else if ($categoria == 0)
                $where = "where tipoProducto like '" . $tipo . "'";
            else
                $where = "where tipoProducto like '" . $tipo . "' and categoriaProducto like '" . $categoria . "'";
        } else {
            $where = "where tipoProducto like '" . $tipo . "' and categoriaProducto like '" . $categoria . "' and serieProducto like '" . $serie . "'";
        }

        $resultado = $conn->query('
        SELECT P.*, T.nombreTipo FROM producto P
        INNER JOIN tipo_producto T
        ON P.tipoProducto = T.idTipo ' . $where);
        $total = [];
        while ($productos = $resultado->fetch(PDO::FETCH_ASSOC)) {
            array_push($total, $productos);
        }
        return $total;
    }

    public function listarProductos()
    {
        $conexion = ConexionBD::obtenerInstancia()->conexion;
        $resultado = $conexion->query('
        SELECT P.*, T.nombreTipo FROM producto P
        INNER JOIN tipo_producto T
        ON P.tipoProducto = T.idTipo');
        $total = [];
        while ($productos = $resultado->fetch(PDO::FETCH_ASSOC)) {
            array_push($total, $productos);
        }
        return $total;
    }

    function filtrarNombreProductos($array)
    {
        try {
            $filtro = "WHERE ";
            for ($i = 0; $i < count($array); $i++) {
                if ($i == count($array) - 1) {
                    $filtro = $filtro . "nombreProducto REGEXP '.*" . $array[$i] . ".*';";
                } else {
                    $filtro = $filtro . "nombreProducto REGEXP '.*" . $array[$i] . ".*' OR ";
                }
            }
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $query = $conexion->query("SELECT * FROM producto " . $filtro);
            $items = [];
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = [];
                $item["idProducto"] = $row["idProducto"];
                $item["nombreProducto"] = $row["nombreProducto"];
                $item["precioProducto"] = $row["precioProducto"];
                $item["stockProducto"] = $row["stockProducto"];
                $item["tipoProducto"] = $row["tipoProducto"];
                $item["categoriaProducto"] = $row["categoriaProducto"];
                $item["serieProducto"] = $row["serieProducto"];
                $item["idProveedor"] = $row["idProveedor"];
                $item["imgProducto"] = $row["imgProducto"];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return false;
        }
    }
}
