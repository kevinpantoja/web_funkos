<?php
	// include_once('view/formLoginUsuario.php');
	// $objForLoginUsuario = new formLoginUsuario();
	// $objForLoginUsuario -> formLoginUsuarioShow();

	include_once('view/formLoginUsuario.php');
	session_start();
	if(!isset($_SESSION["rol"])){
		$objForLoginUsuario = new formLoginUsuario();
		$objForLoginUsuario -> formLoginUsuarioShow();
	}else{
		if($_SESSION["rol"] == "admin"){
			header('location: controller/adminActivo.php');
		}
		if($_SESSION["rol"] == "cliente"){
			header('location: controller/clienteActivo.php');
		}
	}
?>