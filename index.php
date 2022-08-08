<?php
	include_once("view/formHistorialCompras.php");
	include_once("model/modelOrdenCompra.php");

	$arr = (new ModelOrdenCompra())->listarOrdenesDeCompra();
	
	$obj = new FormHistorialCompras();
	$obj -> showFormHistorialCompras($arr);