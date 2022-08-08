<?php
	// include_once("view/formHistorialCompras.php");
	// include_once("model/modelOrdenCompra.php");

	// $arr = (new ModelOrdenCompra())->obtenerOrdenCompra();
	
	// $obj = new FormHistorialCompras();
	// $obj -> showFormHistorialCompras($arr);


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