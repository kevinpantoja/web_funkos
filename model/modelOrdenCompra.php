<?php
include_once("../shared/conexionBD.php");

class ModelOrdenCompra
{
    public function obtenerOrdenCompra()
    {
        include_once("shared/conexionBD.php");

        try {
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $sql = "SELECT * FROM orden_compra";
            $query = $conexion->query($sql);
            $items = [];

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = [];
                $item["idOrdenCompra"] = $row["idOrdenCompra"];
                $item["idCliente"] = $row["idCliente"];
                $item["idOrdenProductos"] = $row["idOrdenProductos"];
                $item["fechaDePedido"] = $row["fechaDePedido"];
                $item["estado"] = $row["estado"];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
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
}
