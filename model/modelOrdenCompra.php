<?php
include_once("../shared/conexionBD.php");

class ModelOrdenCompra
{
    public function listarOrdenesDeCompra($idCliente)
    {
        try {
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $sql = "SELECT * FROM orden_compra WHERE idCliente = '{$idCliente}'";
            $query = $conexion->query($sql);
            $items = [];

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = [];
                $item["idOrdenCompra"] = $row["idOrdenCompra"];
                $item["productos"] = $row["productos"];
                $item["estado"] = $row["estado"];
                $item["fechaDePedido"] = $row["fechaDePedido"];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }

    public function obtenerEstadoOrdenCompra($idOrdenCompra)
    {
        try {
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $sql = "SELECT estado FROM orden_compra WHERE idOrdenCompra = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$idOrdenCompra]);
            $respuesta = $stmt->fetch();

            return $respuesta;
        } catch (PDOException $e) {
            return -1;
        }
    }

    public function eliminarOrdenCompra($idOrdenCompra)
    {
        try {
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $sql = "DELETE FROM orden_compra WHERE idOrdenCompra = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$idOrdenCompra]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            return -1;
        }
    }

    public function registrar($idCliente,$numProductos,$monto){
        try {
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $fecha = date("d/m/Y");
            $sql = "INSERT INTO orden_compra(fechaDePedido,estado,idCliente,productos,monto) values('$fecha','en almacen','$idCliente','$numProductos','$monto')";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            return -1;
        }
    }
}
