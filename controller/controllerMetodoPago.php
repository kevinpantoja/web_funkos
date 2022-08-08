<?php
    class controllerMetodoPago{

        public function realizarPago($id,$pass,$prop,$nProd,$monto){

            include_once("../model/modelMetodoPago.php");
            $obj=new modelMetodoPago();
            $respuesta=$obj->validarid($id);
            if($respuesta==1){
                $respuesta=$obj->validaridPass($id,$pass);
                if($respuesta==1){
                    $respuesta=$obj->obtenerMonto($id);
                    $resultado=$respuesta['monto']-$monto;
                    if($resultado >= 0){
                        $obj->pagar($id,$resultado);
                        include_once("../model/modelCarrito.php");
                        include_once("../model/modelOrdenCompra.php");
                        $modelCarrito=new modelCarrito();
                        $modelCompra = new ModelOrdenCompra();
                        if(!isset($_SESSION))
                            session_start();
                        $modelCompra->registrar($_SESSION["cuenta"],$nProd,$monto);
                        $modelCarrito->eliminarProductos($_SESSION["cuenta"]);
                        echo "<script> 
                            alert('Pagado');
                            window.location='../index.php'; 
                        </script>";    
                    }else{
                        include_once('../shared/formMensaje.php');
                        $objformMensaje = new formMensaje;
                        $objformMensaje -> formMensajeShow("alert.png","Monto insuficiente en la tarjeta","<a href='../index.php'>ir al Inicio</a>");
                    }
                    
                }else{
                    echo "<script> 
                        alert('cuenta o Clave incorrecta');
                        window.location='../index.php'; 
                    </script>";
                }
            }else{
                echo "<script> 
                    alert('cuenta incorrecta');
                    window.location='../index.php'; 
                </script>";
            }

        }

        public function regresarEfectuarPago(){
            
        }
    }

?>

<!-- 
ID TARJETA: 4557880561812912
CLAVE: 2022
PROPIETARIO: Pepe Lucas
MONTO_TOTAL: 1
 -->
