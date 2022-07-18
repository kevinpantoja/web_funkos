<?php
	function validarCampos($login,$password)
	{
		if(strlen($login)>=4 && strlen($password)>=4)
			return 1;
		else
			return 0;	
	}

	$boton = $_POST['bntAceptar'];
	if(isset($boton))
	{
		$login = strtolower(trim($_POST['txtLogin']));
		$password = trim($_POST['txtPassword']);
		$resultado = validarCampos($login,$password);
		if($resultado == 1)
		{
			$password = md5($password);
			include_once('controllerLoginUsuario.php');
			$objControllerLoginusuario = new controllerLoginUsuario();
			$objControllerLoginusuario -> validarUsuario($login,$password);	
		}
		else
		{
			include_once('../shared/formMensaje.php');
			$objformMensaje = new formMensaje;
			$objformMensaje -> formMensajeShow("close.png","Los datos ingresados no son validos<br>intente nuevamente","<a href='../index.php'>ir al inicio </a>");
		}
	}
	else
	{
		include_once('../shared/formMensaje.php');
		$objformMensaje = new formMensaje;
		$objformMensaje -> formMensajeShow("error.png","Error, Se ha detectado un acceso no permitido","<a href='../index.php'>ir al inicio </a>");
	}
?>