<?php 

class Footer{
    static private $instancia = null; 
    private function __construct(){
        ?>
        <footer>
            <span>Footer 2022</span>    
        </footer>
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