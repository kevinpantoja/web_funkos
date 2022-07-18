<?php 

include_once("../shared/header.php");
include_once("../shared/footer.php");

class FormListaProductos{
    public function showForm($array,$tipos, $categorias, $series,$buscado){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../view/footerHeader.css">
        <link rel="stylesheet" href="../view/formProducto.css">
        <title>Producto</title>
    </head>
    <body>    
        <?php Header::obtenerInstancia(); ?>
        <div class="buscador">
            <form method="POST" action="getProductos.php" autocomplete="off">
                <input type="text" name="buscador">
                <input type="submit" value="buscar" name="buscar">
                <p><strong>Elemento buscado: </strong><?php echo $buscado; ?></p>
            </form>
        </div>
        <div class="contenedor_body">
        <nav class="barra_filtros">
                <form class="filtros" method="POST" action="../controller/getProductos.php">
                    <h2>Filtros</h2>

                    <h3>Tipo de producto</h3>
                    <select name="tipo_producto" id="tipo_producto" class="input_select">
                        <option value="0">Tipo de Producto</option>
                        <?php
                            foreach($tipos as $tipo){
                                ?>
                        <option value="<?php echo $tipo['idTipo'] ?>"><?php echo $tipo['nombreTipo'] ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <br>
                    <h3>Categoría</h3>
                    <select name="categoria_producto" id="categoria_producto" class="input_select">
                        <option value="0">Categoria</option>
                        <?php
                            foreach($categorias as $categoria){
                                ?>
                        <option value="<?php echo $categoria['idCategoria'] ?>">
                            <?php echo $categoria['nombreCategoria'] ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <br>
                    <h3>Serie</h3>
                    <select name="serie_producto" id="serie_producto" class="input_select">
                        <option value="0">Serie</option>
                        <?php
                            foreach($series as $serie){
                                ?>
                        <option value="<?php echo $serie['idSerie'] ?>"><?php echo $serie['nombreSerie'] ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                    <br>

                    <input type="submit" value="Aplicar filtros" name="filtrar">
                </form>
            </nav>
            <div class="productos">
                <h1>Productos Buscados</h1>
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
        </div>
        
        <?php Footer::obtenerInstancia(); ?>
    </body>
    </html>
    <?php
    }
}

?>