<?php 

class Header{
    static private $instancia = null; 
    private function __construct(){
        ?>
        <ul>
            <li><a href=""><img src="../img/logo.jpg" alt=""></a></li>
        </ul>

        <ul>
            <li><a href="">Productos</a></li>
            <li><a href="">Historial</a></li>
            <li><a href="">Datos Personales</a></li>
            <li><a href=""></a></li>
        </ul>

        <ul>
            <li><a href=""><img src="../img/user_logo.png" alt=""></a></li>
            <li><a href=""><img src="../img/carrito_logo.png" alt=""></a></li>
            <li><a href="">Log Out</a></li>
        </ul>
        <?php
    }  
    
    public static function obtenerInstancia()
		{
			if(self::$instancia == null)
				self::$instancia = new Header();	
			return(self::$instancia);
		}		
}

?>