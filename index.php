<?php
	// include_once("view/formHistorialCompras.php");
	// include_once("model/modelOrdenCompra.php");

	// $arr = (new ModelOrdenCompra())->obtenerOrdenCompra();
	
	// $obj = new FormHistorialCompras();
	// $obj -> showFormHistorialCompras($arr);


	include_once('view/formLoginUsuario.php');
	$objForLoginUsuario = new formLoginUsuario();
	$objForLoginUsuario -> formLoginUsuarioShow();
?>