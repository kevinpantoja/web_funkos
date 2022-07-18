<?php
	class conexionSingleton
	{	
		private $conexion;
		private static $instancia = null;

		public static function obtenerInstancia()
		{
			if(self::$instancia == null)
				self::$instancia = new conexionSingleton();	
			return(self::$instancia);
		}	
		
		private function __construct()
		{
			$this->conexion = new mysqli('localhost:3310','root','','tienda_funkos');
			$this->conexion->set_charset('utf8');
			if(mysqli_connect_error()){
				trigger_error("Fallto al conectar a MySQL: " . mysqli_connect_error(), E_USER_ERROR);
			}
		}
		
		public function getConexion(){
			return $this -> conexion;
		}

	}
?>