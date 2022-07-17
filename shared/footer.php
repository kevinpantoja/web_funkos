<?php 

class Footer{
    static private $instancia = null; 
    private function __construct(){
        ?>
        <p>Footer 2022</p>
        <?php
    }  
    
    public static function obtenerInstancia()
		{
			if(self::$instancia == null)
				self::$instancia = new Footer();	
			return(self::$instancia);
		}		
}

?>