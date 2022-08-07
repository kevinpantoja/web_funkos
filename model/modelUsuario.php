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

		public function validarSoloCorreo($correo)
		{
			$conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "SELECT login FROM usuarios where email = '$correo' ";
			$resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			return $cantidadRegistros;
		}

		public function validarCorreoUsuario($usuario, $correo)
		{
			$conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "SELECT login FROM usuarios where email = '$correo' and login != '$usuario'";
			$resultado = $conn->prepare($consulta);
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();						
			return $cantidadRegistros;
		}

		public function insertarUsuario($usuario,$password,$nombre,$ap_paterno, $ap_materno, $genero, $email, $direccion, $telefono){
			$conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "INSERT INTO usuarios(login,password,nombre,aPaterno,aMaterno,genero,email,direccion,telefono, estado, rol) 
			VALUES('$usuario','$password','$nombre','$ap_paterno', '$ap_materno', '$genero', '$email', '$direccion', '$telefono', 1, 'cliente')";
			$resultado=$conn->prepare($consulta);
			$resultado->execute();
			if($resultado){
                return 1;
            }
            return 0;
		}

		public function getDatosPersonales($login)
		{
			$conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "SELECT  * FROM  usuarios WHERE login = '$login' and estado = 1 ";
			$resultado = $conn->prepare($consulta);
            $resultado->execute();
			$datos = $resultado->fetch(PDO::FETCH_ASSOC);	
			return($datos);		
		}

		public function actualizarDatos($usuario,$nombre,$ap_paterno, $ap_materno, $genero, $email, $direccion, $telefono)
		{
			$conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = "UPDATE usuarios 
			SET login='$usuario', nombre='$nombre', aPaterno='$ap_paterno', aMaterno='$ap_materno', genero='$genero', email='$email', direccion='$direccion', telefono='$telefono'
			WHERE login = '$usuario'";
			$resultado=$conn->prepare($consulta);
			$resultado->execute();
			if($resultado){
                return 1;
            }
            return 0;
		}
	}
?>