<?php
	include_once('../shared/conexionSingleton.php');
	class Producto
	{
		public function listarProductos()
		{
			$db = conexionSingleton::obtenerInstancia();
			$conn = $db->getConexion();
			$resultado=$conn->query('
			SELECT P.nombreProducto, P.precioProducto, T.nombreTipo, P.imgProducto FROM producto P
			INNER JOIN tipo_producto T
			ON P.tipoProducto = T.idTipo');
            $total = [];
			while($productos=mysqli_fetch_assoc($resultado)){
                array_push($total,$productos);		
			}
            return $total;
		}
		
		public function listarFiltros($tabla)
		{
			$db = conexionSingleton::obtenerInstancia();
			$conn = $db->getConexion();
			$resultado=$conn->query('SELECT * FROM '.$tabla);
            $total = [];
			while($resultados=mysqli_fetch_assoc($resultado)){
                array_push($total,$resultados);		
			}
            return $total;
		}	

		public function listarProductosFiltrados($tipo, $categoria, $serie){
			$db = conexionSingleton::obtenerInstancia();
			$conn = $db->getConexion();

			$where = "";
			if($tipo == 0 and $categoria == 0 and $serie == 0)
			{
				$where = "";
			} else
			if($tipo == 0){
				if ($categoria == 0)
					$where = "where serieProducto like '".$serie."'";
				else if ($serie == 0)
					$where = "where categoriaProducto like '".$categoria."'";
				else
					$where = "where categoriaProducto like '".$categoria."' and serieProducto like '".$serie."'";
			} else 
			
			if ($categoria == 0){
				if ($tipo == 0)
					$where = "where serieProducto like '".$serie."'";
				else if ($serie == 0)
					$where = "where tipoProducto like '".$tipo."'";
				else
					$where = "where tipoProducto like '".$tipo."' and serieProducto like '".$serie."'";
			} else 
			
			if($serie == 0){
				if ($tipo == 0)
					$where = "where categoriaProducto like '".$categoria."'";
				else if ($categoria == 0)
					$where = "where tipoProducto like '".$tipo."'";
				else
					$where = "where tipoProducto like '".$tipo."' and categoriaProducto like '".$categoria."'";
			} else 
			{
				$where = "where tipoProducto like '".$tipo."' and categoriaProducto like '".$categoria."' and serieProducto like '".$serie."'";
			}

			$resultado=$conn->query('
			SELECT P.nombreProducto, P.precioProducto, T.nombreTipo, P.imgProducto FROM producto P
			INNER JOIN tipo_producto T
			ON P.tipoProducto = T.idTipo '.$where);
            $total = [];
			while($productos=mysqli_fetch_assoc($resultado)){
                array_push($total,$productos);		
			}
            return $total;
		}
	}

?>
