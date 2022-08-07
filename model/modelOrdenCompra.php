<?php
include_once("../shared/conexionBD.php");

class ModelOrdenCompra
{

    function obtenerEstadoOrdenCompra($idOrdenCompra)
    {
        try {
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $sql = "SELECT estado FROM OrdenCompra WHERE idOrdenCompra = $idOrdenCompra";
            $query = $conexion->query($sql);
            $respuesta = $query->fetch(PDO::FETCH_ASSOC);

            return $respuesta;
        } catch (PDOException $e) {
            return -1;
        }
    }

    function eliminarOrdenCompra($idOrdenCompra) {
        try {
            $conexion = ConexionBD::obtenerInstancia()->conexion;
            $sql = "DELETE FROM OrdenCompra WHERE idOrdenCompra = $idOrdenCompra";
            $query = $conexion->query($sql);
            $respuesta = $query->fetch(PDO::FETCH_ASSOC);

            return $respuesta;
        } catch (PDOException $e) {
            return -1;
        }
    }
}
