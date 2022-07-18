<?php
	include_once('../shared/conexionBD.php');
	class modelUsuario 
	{
		public function validarSoloUsuario($login)
		{
			$conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "SELECT login FROM usuarios where login = '$login' ";
			$resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return 1;
			else
				return 0;
		}

		public function obtenerRol($login){
			$conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "SELECT rol FROM usuarios where login = '$login' ";
			$resultado = $conn->prepare($consulta);
            $resultado->execute();
			return $resultado->fetch(PDO::FETCH_ASSOC);
		}
		
		public function validarUsuarioPassword($login,$password)
		{
            $conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "SELECT  login FROM  usuarios where login = '$login' AND password = '$password' ";
			$resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return 1;
			else
				return 0;
		}
		
		public function validarEstadoUsuario($login)
		{
            $conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "SELECT  login FROM  usuarios WHERE login = '$login' and estado = 1 ";
			$resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			if($cantidadRegistros == 1)
				return 1;
			else
				return 0;
		}
	}
?>