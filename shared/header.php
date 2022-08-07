<?php 
 
class Header{
    static private $instancia = null; 

    private function __construct()
    {

        ?>
        <div class="header">
                <?php
                    include_once("../controller/controllerCarrito.php");
                    $obj=new controllerCarrito();
                    $cantidadproductos=$obj->cantidadProductos();
                ?>
            <ul>
                <li><a href=""><img class="logo" src="../img/logo.png" alt=""></a></li>
            </ul>

            <ul>
                <li><a class="header_direccion" href="">Productos</a></li>
                <li><a class="header_direccion" href="">Historial</a></li>
                <li><a class="header_direccion" href="">Datos Personales</a></li>
                <li><a class="header_direccion" href=""></a></li>
            </ul>
            <ul>
                <li><a href=""><img class="header_icono" src="../img/user_logo.png" alt=""></a></li>
                <li><a href="../view/formCarrito.php"><img class="header_icono carrito" src="../img/carrito_logo.png" alt=""><span class="number_carrito"><?php echo $cantidadproductos?$cantidadproductos:'0' ?></span></a></li>
                <li><a class="header_logout" href="../shared/cerrarSesion.php">Log Out</a></li>
            </ul>    
        </div>
        
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