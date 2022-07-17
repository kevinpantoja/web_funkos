<?php 

include_once("../shared/header.php");
include_once("../shared/footer.php");
class FormListaProductos{
    public function showForm($array,$buscado){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Producto Buscado</title>
    </head>
    <body>    
        <?php Header::obtenerInstancia(); ?>
        <div>
            <form method="POST" action="getProductos.php">
                <input type="text" name="buscador">
                <input type="submit" value="buscar" name="buscar">
            </form>
        </div>
        <p><strong>Elemento buscado: </strong><?php echo $buscado; ?></p>
        <h1>Titulos</h1>
        <section class="contenedor_productos">
            <?php for($i = 0; $i < count($array); $i++){
                ?>
                <div>
                    <form action="">
                        <div><img src="../img/<?php echo $array[$i]["imgProducto"]; ?>" alt=""></div>
                        <div>ID: <input type="text" value="<?php echo $array[$i]["idProducto"];?>" readonly></div>
                        <h2><?php echo $array[$i]["nombreProducto"]; ?></h2>
                        <div>
                            <span><?php echo $array[$i]["precioProducto"]; ?></span>
                            <span><?php echo $array[$i]["stockProducto"]>0?"disponible":"agotado"; ?></span>     
                        </div>
                        <input type="submit" value="comprar">   
                    </form>
                </div>
                <?php
            } ?>
        </section>
        <?php Footer::obtenerInstancia(); ?>
    </body>
    </html>
    <?php
    }
}


?>