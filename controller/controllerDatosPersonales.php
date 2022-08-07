<?php
    class ControllerDatosPersonales{
        public function getDatosPersonales($codigo){
            include_once("../model/modelUsuario.php");
			$modelUsuario = new modelUsuario();
            $datos = $modelUsuario -> getDatosPersonales($codigo);

            include_once("../view/formDatosPersonales.php");
            $objFormDatosPersonales = new FormDatosPersonales;
            $objFormDatosPersonales ->formDatosPersonalesShow($datos);
        }

        public function  validarCampos($usuario,$nombre,$ap_paterno, $ap_materno, $genero, $email, $direccion, $telefono){
            include_once('../model/modelUsuario.php');
			$obUsuario = new modelUsuario();	
		
            $respuesta = $obUsuario -> validarCorreoUsuario($usuario, $email);
            if($respuesta == 1){
                include_once('../shared/formMensaje.php');
                $objformMensaje = new formMensaje;
                $objformMensaje -> formMensajeShow("alert.png","El correo ya está registrado <br> intente nuevamente","<a href='../controller/getDatosPersonales.php'>Ir a datos personales</a>");	
            }else {
                $respuesta = $obUsuario -> actualizarDatos($usuario,$nombre,$ap_paterno, $ap_materno, $genero, $email, $direccion, $telefono);
                if ($respuesta == 1){
                    include_once('../shared/formMensaje.php');
                    $objformMensaje = new formMensaje;
                    $objformMensaje -> formMensajeShow("personal-information.ico","Datos Actualizados con éxito","<a href='../controller/getProductos.php'> Ver Productos </a>");	
                } else {
                    include_once('../shared/formMensaje.php');
                    $objformMensaje = new formMensaje;
                    $objformMensaje -> formMensajeShow("alert.png","Error al actualizar datos <br> intente nuevamente","<a href='../index.php'>ir al inicio </a>");	
                }
            
            }
			
        }
    }
?>