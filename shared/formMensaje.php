<?php 

class FormMensaje{
    public function showMensaje($mensaje,$icono,$boton,$boton_link){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mensaje</title>
    </head>
    <body>  
        <h1><?php echo $mensaje; ?></h1> 
        <a href="<?php echo $boton_link; ?>"><?php echo $boton; ?></a>   
    </body>
    </html>
    <?php
    }
}



?>