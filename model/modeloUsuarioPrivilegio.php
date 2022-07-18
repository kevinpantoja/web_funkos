<?php
	include_once('../shared/conexionBD.php');
	class UsuarioPrivilegio 
	{
		public function obtenerPrivilegios($login)
		{
			$conn=conexionBD::Obtenerinstancia()->conexion;
			$consulta = " SELECT P.labelPrivilegio,P.pathPrivilegio,P.iconPrivilegio
			                      FROM usuarios U, privilegios P, usuarioprivilegios UP
								    WHERE U.rol = UP.rol AND P.idPrivilegio = UP.idPrivilegio AND U.login = '$login' ";
			$resultado = $conn->prepare($consulta);        
            $resultado->execute();
			$cantidadRegistros = $resultado->rowCount();	
			for($i = 0; $i < $cantidadRegistros; $i++)
			{
				$listaPrivilegios[$i] = $resultado->fetch(PDO::FETCH_ASSOC);	
			}
			return($listaPrivilegios);			
		}		
	}
?>