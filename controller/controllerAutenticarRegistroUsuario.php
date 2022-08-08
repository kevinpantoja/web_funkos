<?php
    class controllerAutenticarRegistroUsuario{
        public function  validarRegistroUsuario($usuario,$password,$nombre,$ap_paterno, $ap_materno, $genero, $email, $direccion, $telefono){
            include_once('../model/modelUsuario.php');
			$obUsuario = new modelUsuario();	
			$respuesta = $obUsuario -> validarSoloUsuario($usuario);
            if($respuesta == 1)
			{
                include_once('../shared/formMensaje.php');
				$objformMensaje = new formMensaje;
				$objformMensaje -> formMensajeShow("alert.png","El usuario ya existe<br>intente nuevamente","<a href='../view/formRegistroUsuario.php'>ir al inicio </a>");	
            }
			else
			{
                $respuesta = $obUsuario -> validarSoloCorreo($email);
                if($respuesta == 1){
                    include_once('../shared/formMensaje.php');
				    $objformMensaje = new formMensaje;
				    $objformMensaje -> formMensajeShow("alert.png","El correo ya está registrado <br> intente nuevamente","<a href='../view/formRegistroUsuario.php'>ir al inicio </a>");	
                }else {
                    $respuesta = $obUsuario -> insertarUsuario($usuario,$password,$nombre,$ap_paterno, $ap_materno, $genero, $email, $direccion, $telefono);
                    if ($respuesta == 1){
                        include_once('../shared/formMensaje.php');
				        $objformMensaje = new formMensaje;
				        $objformMensaje -> formMensajeShow("add.png","Usuario registrado con éxito","<a href='../index.php'>Iniciar Sesión</a>");	
                    } else {
                        include_once('../shared/formMensaje.php');
				        $objformMensaje = new formMensaje;
				        $objformMensaje -> formMensajeShow("alert.png","Error al registrar al usuario <br> intente nuevamente","<a href='../index.php'>ir al inicio </a>");	
                    }
                   
                }
			}
        }
    }
?>