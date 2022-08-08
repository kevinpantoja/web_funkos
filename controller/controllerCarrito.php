<?php
    class controllerCarrito{

        public function __construct(){
            if(!isset($_SESSION)){
                session_start();
            }
            if(empty($_SESSION['login'])){
                echo "<script> 
                    window.location='../view/formCarrito.php'; 
                </script>";
            }
        }

        public function agregarCarrito($id,$nombre,$precio,$cantidad,$image){
            if(!empty($id) && !empty($nombre) && !empty($precio) && !empty($cantidad)){
                include_once("../model/modelCarrito.php");
                $obj=new modelCarrito();
                $respuesta=$obj->verificarExiste($id);
                if($respuesta!=1){
                    $id_user=$_SESSION['login'];
                    include_once("../model/modelCarrito.php");
                    $obj=new modelCarrito();
                    $respuesta=$obj->agregarCarrito($id,$nombre,$precio,$cantidad,$image,$id_user);
                    if($respuesta==1){
                        $this->showProductos();
                    }else{
                        echo "<script> 
                                alert('No se pudo agrear correctamente');
                                window.location='../view/formCarrito.php'; 
                            </script>";
                            $this->showProductos();
                    }
                }else{
                    echo "<script> 
                        alert('Ya se agregó el producto anteriormente');
                        window.location='../view/formCarrito.php'; 
                    </script>";
                    $this->showProductos();
                }
            }
        }

        public function actualizarProducto($id,$cantidad){
            if($cantidad>0){
                include_once("../model/modelCarrito.php");
                $obj=new modelCarrito();
                $respuesta=$obj->obtenerStock($id);
                if($cantidad<$respuesta['stockProducto']){
                    $respuesta=$obj->actualizarProducto($id,$cantidad);
                    if($respuesta==1){
                        echo "<script> 
                            alert('actualizado exitosamente');
                            window.location='../view/formCarrito.php'; 
                        </script>";
                    }else{
                        echo "<script> 
                            alert('No se pudo actualizar correctamente');
                            window.location='../view/formCarrito.php'; 
                        </script>";
                    }
                }else{
                    echo "<script> 
                        alert('El Stock es insuficiente');
                        window.location='../view/formCarrito.php'; 
                    </script>";
                }
            }

        }

        public function eliminarProducto($id){
            include_once("../model/modelCarrito.php");
            $obj=new modelCarrito();
            $respuesta=$obj->verificarExiste($id);
            if($respuesta==1){
                $respuesta=$obj->eliminarProducto($id);
                if($respuesta==1){
                    echo "<script> 
                        alert('Eliminado exitosamente');
                        window.location='../view/formCarrito.php'; 
                    </script>";
                }else{
                    echo "<script> 
                        alert('No se pudo eliminar correctamente');
                        window.location='../view/formCarrito.php'; 
                    </script>";
                }
            }else{	
                echo "<script> 
                    alert('El producto no existe, verifique nuevamente');
                    window.location='../view/formCarrito.php'; 
                </script>";
            }
        }

        public function eliminarProductos(){
            $id_user=$_SESSION['login'];
            include_once("../model/modelCarrito.php");
            $obj=new modelCarrito();
            $respuesta=$obj->eliminarProductos($id_user);
            if($respuesta==1){
                echo "<script> 
                    alert('productos eliminados correctamente');
                    window.location='../view/formCarrito.php'; 
                </script>";
            }else{
                echo "<script> 
                    alert('No se pudo eliminar correctamente);
                    window.location='../view/formCarrito.php'; 
                </script>";
            }
        }

        public function cantidadProductos(){
            $id_user=$_SESSION['login'];
            include_once("../model/modelCarrito.php");
            $obj=new modelCarrito();
            $respuesta=$obj->cantidadProductos($id_user);
            if($respuesta>0){
                return $respuesta;
            }
        }

        public function showProductos(){
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

    }

?>