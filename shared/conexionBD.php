<?php
class conexionBD
{
    static private $instancia = null;
    public $conexion = null;

    private function __construct()
    {
        $connection = "mysql:host=" . "localhost:3310" . ";dbname=" . "desarollo_web" . ";charset=" . "utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        $pdo = new PDO($connection, "root", "", $options);
        $this->conexion = $pdo;
    }

    public static function obtenerInstancia()
    {
        if (self::$instancia == null)
            self::$instancia = new conexionBD();
        return (self::$instancia);
    }
}
