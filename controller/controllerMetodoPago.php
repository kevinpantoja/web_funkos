<?php
    class controllerMetodoPago{

        public function realizarPago($id,$pass,$prop,$monto){

            include_once("../model/modelMetodoPago.php");
            $obj=new modelMetodoPago();
            $respuesta=$obj->validarid($id);
            if($respuesta==1){
                $respuesta=$obj->validaridPass($id,$pass);
                if($respuesta==1){
                    $respuesta=$obj->obtenerMonto($id);
                    $resultado=$respuesta['monto']-$monto;
                    $obj->pagar($id,$resultado);
                    echo "<script> 
                        alert('Pagado');
                        window.location='../view/formMetodoPago.php'; 
                    </script>";
                }else{
                    echo "<script> 
                        alert('Id o Clave incorrecta');
                        window.location='../view/formMetodoPago.php'; 
                    </script>";
                }
            }else{
                echo "<script> 
                    alert('Id  incorrecta');
                    window.location='../view/formMetodoPago.php'; 
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
