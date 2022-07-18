<?php
	class controllerLoginUsuario
	{
		public function validarUsuario($login,$password)	
		{
			include_once('../model/modelUsuario.php');
			$obUsuario = new modelUsuario();	
			$respuesta = $obUsuario -> validarSoloUsuario($login);
			if($respuesta == 1)
			{
					$respuesta = $obUsuario -> validarUsuarioPassword($login,$password);
					if($respuesta == 1)
					{
							$respuesta = $obUsuario -> validarEstadoUsuario($login);
							if($respuesta == 1)
							{
								include_once('../model/modeloUsuarioPrivilegio.php');
								$objUsuarioPrivilegio = new UsuarioPrivilegio();
								$listaPrivilegios = $objUsuarioPrivilegio -> obtenerPrivilegios($login);
								
								include_once('../view/formPrincipal.php');
								$objFormPrincipal = new formPrincipal();
								$objFormPrincipal -> formPrincipalShow($listaPrivilegios);								
							}
							else
							{
								include_once('../shared/formMensaje.php');
								$objformMensaje = new formMensaje;
								$objformMensaje -> formMensajeShow("alert.png","el usuario esta deshabilitado, por favor <br>contacte con el administrador","<a href='../index.php'>ir al inicio </a>");
							}
					}
					else
					{
						include_once('../shared/formMensaje.php');
						$objformMensaje = new formMensaje;
						$objformMensaje -> formMensajeShow("alert.png","el password del usuario no es correcto<br>intente nuevamente","<a href='../index.php'>ir al inicio </a>");	
					}
			}
			else
			{
					include_once('../shared/formMensaje.php');
					$objformMensaje = new formMensaje;
					$objformMensaje -> formMensajeShow("alert.png","no se encontró el usuario<br>intente nuevamente","<a href='../index.php'>ir al inicio </a>");	
			}
		}
	}
?>