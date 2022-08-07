<?php
	class controllerLoginUsuario
	{

		public function __construct()
		{
			if(!isset($_SESSION)){
                session_start();
            }
		}
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
								include_once("../model/modelUsuario.php");
								$modelUsuario = new modelUsuario();
								$rol = $modelUsuario->obtenerRol($login);
								if($rol["rol"] == "cliente"){
									$_SESSION['login']=$login;
									include_once('../model/modelProductos.php');
									$objProducto= new ModelProductos();
									$lista = $objProducto -> listarProductos();
									$tipos = $objProducto -> listarFiltros('tipo_producto');
									$categorias = $objProducto -> listarFiltros('categoria_producto');
									$series = $objProducto -> listarFiltros('serie_producto');
									include_once('../view/formProductos.php');
									$obj=new FormProductos();
									$obj->showFormProductos($lista, $tipos, $categorias, $series);	
								}else{
									$_SESSION['login']=$login;
									include_once('../model/modeloUsuarioPrivilegio.php');
									$objUsuarioPrivilegio = new UsuarioPrivilegio();
									$listaPrivilegios = $objUsuarioPrivilegio -> obtenerPrivilegios($login);
									
									include_once('../view/formPrincipal.php');
									$objFormPrincipal = new formPrincipal();
									$objFormPrincipal -> formPrincipalShow($listaPrivilegios);	

								}						
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
					$objformMensaje -> formMensajeShow("alert.png","no se encontro el usuario<br>intente nuevamente","<a href='../index.php'>ir al inicio </a>");	
			}
		}

	}
?>