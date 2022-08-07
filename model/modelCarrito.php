<?php
    include_once("../shared/conexionBD.php");
    class modelCarrito{

        public function verificarExiste($id){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="SELECT id_producto FROM carrito WHERE id_producto='$id'";
            $resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return 1;
			else
				return 0;
        }

        public function agregarCarrito($id,$nombre,$precio,$cantidad,$image,$id_user){
            
            $conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "INSERT INTO carrito(id_producto,id_user, nombre, precio_prod, cantidad, imagen) VALUES('$id','$id_user','$nombre','$precio','$cantidad','$image')";
			$resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return 1;
			else
				return 0;
        }

        public function eliminarProductos($id_user){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="DELETE FROM carrito WHERE id_user='$id_user'";
            $resultado=$conn->prepare($consulta);
            $resultado->execute();
            if($resultado){
                return 1;
            }
            return 0;
        }

        public function eliminarProducto($id){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="DELETE FROM carrito WHERE id_producto='$id'";
            $resultado=$conn->prepare($consulta);
            $resultado->execute();
            if($resultado){
                return 1;
            }
            return 0;
        }

        public function actualizarProducto($id,$cantidad){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="UPDATE carrito SET cantidad='$cantidad' WHERE id_producto='$id'";
            $resultado=$conn->prepare($consulta);
            $resultado->execute();
            if($resultado){
                return 1;
            }
            return 0;
        }
 
        public function cantidadProductos($id_user){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="SELECT * FROM carrito WHERE id_user='$id_user' ";
            $resultado=$conn->prepare($consulta);
            $resultado->execute();
            if($resultado->rowCount()>0){
                return $resultado->rowCount();
            }
            return 0;
        }

        public function listarProductos(){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="SELECT * FROM carrito";
            $resultado=$conn->prepare($consulta);
            $resultado->execute();
            if($resultado->rowCount()>0){
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            }
            return 0;
        }

        public function obtenerStock($id){
            $conn=conexionBD::obtenerInstancia()->conexion;
            $consulta="SELECT stockProducto FROM producto WHERE idProducto='$id'";
            $resultado=$conn->prepare($consulta);
            $resultado->execute();
            if($resultado->rowCount()>0){
                return $resultado->fetch(PDO::FETCH_ASSOC);
            }
            return 0;
        }

    }


?>