<?php
    include_once("../shared/conexionBD.php");
    class modelMetodoPago{

        public function validarid($id){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="SELECT idTarjeta FROM tarjeta WHERE idTarjeta='$id'";
            $resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return 1;
			else
				return 0;
        }

        public function validaridPass($id,$key){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="SELECT idTarjeta FROM tarjeta WHERE idTarjeta='$id' AND clave='$key'";
            $resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return 1;
			else
				return 0;
        }

        public function obtenerMonto($id){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="SELECT monto FROM tarjeta WHERE idTarjeta='$id'";
            $resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return $resultado->fetch(PDO::FETCH_ASSOC);
			else
				return 0;
        }

        public function pagar($id,$monto){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="UPDATE tarjeta SET monto='$monto' WHERE idTarjeta='$id'";
            $resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return $resultado->fetch(PDO::FETCH_ASSOC);
			else
				return 0;
        }


    }
?>