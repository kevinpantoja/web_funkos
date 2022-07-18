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
        <link rel="stylesheet" href="../view/footerHeader.css">
        <link rel="stylesheet" href="../view/formProducto.css">
    </head>
    <body>    
        <?php Header::obtenerInstancia(); ?>
        <div class="buscador">
            <form method="POST" action="getProductos.php">
                <input type="text" name="buscador">
                <input type="submit" value="buscar" name="buscar">
                <p><strong>Elemento buscado: </strong><?php echo $buscado; ?></p>
            </form>
        </div>
        <h1>Titulos</h1>
        <div class="contenedor_body">
            <nav class="barra_filtros">
                <form action="">
                    <div class="lista_filtros">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>    
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <input type="submit" value="Filtrar" name="filtrar">
                </form>
            </nav>
            <section class="contenedor_productos">
                <?php for($i = 0; $i < count($array); $i++){
                    ?>
                    <div class="producto_individual">
                        <form action="">
                            <div><img src="../img/<?php echo $array[$i]["imgProducto"]; ?>" alt=""></div>
                            <div>ID: <input type="text" value="<?php echo $array[$i]["idProducto"];?>" readonly></div>
                            <h2><?php echo $array[$i]["nombreProducto"]; ?></h2>
                            <div>
                                <span>S/. <?php echo $array[$i]["precioProducto"]; ?></span>
                                <span> - Estado: <?php echo $array[$i]["stockProducto"]>0?"disponible":"agotado"; ?></span>     
                            </div>
                            <input type="submit" value="comprar">   
                        </form>
                    </div>
                    <?php
                } ?>
            </section>    
        </div>
        <?php Footer::obtenerInstancia(); ?>
    </body>
    </html>
    <?php
    }
}


?>