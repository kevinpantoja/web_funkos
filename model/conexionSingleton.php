<?php
	class conexionSingleton
	{
		static private $instancia = null;
		public $conexion = null;

		private function __construct()
		{
			$connection = "mysql:host="."localhost".";dbname="."desarrollo_web".";charset="."utf8mb4";
            $pdo = new PDO($connection,"root","");
            $this->conexion = $pdo;
		}	
		public static function obtenerInstancia()
		{
			if(self::$instancia == null)
				self::$instancia = new conexionSingleton();	
			return(self::$instancia);
		}		
	}
?>