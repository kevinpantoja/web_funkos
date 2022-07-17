<?php 
include("../shared/conexionBD.php");
class ModelProductos{
     
    function obtenerProductos(){
        try{
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $query = $conexion->query("SELECT * FROM producto");
            $items = [];
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
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
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            return false;
        }
    }

    function filtrarNombreProductos($array){
        try{
            $filtro = "WHERE ";
            for($i = 0; $i < count($array); $i++){
                if($i == count($array) - 1){
                    $filtro = $filtro . "nombreProducto REGEXP '.*".$array[$i].".*';";
                }else{
                    $filtro = $filtro . "nombreProducto REGEXP '.*".$array[$i].".*' OR ";
                }
            }
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $query = $conexion->query("SELECT * FROM producto ".$filtro);
            $items = [];
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
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
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            return false;
        }
    }
}


?>