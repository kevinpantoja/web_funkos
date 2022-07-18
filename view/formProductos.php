<?php


class formProducto{

    public function showProductos($productos, $tipos, $categorias, $series){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Funkos</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <div class="container">
        <nav class="nav-main">
            <ul class="nav-menu">
                <li>
                    <a href="../index.php">INICIO</a>
                </li>
                <li>
                    <a href="../controller/getProductos.php">PRODUCTOS</a>
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="container-filtros">
            <form class="filtros" method="POST" action="../controller/getProductosFiltrados.php">
                <h2>FILTROS</h2>

                <h3>TIPO DE PRODUCTO</h3>
                <select name="tipo_producto" id="tipo_producto">
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
                <h3>CATEGORÍA</h3>
                <select name="categoria_producto" id="categoria_producto">
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
                <h3>SERIE</h3>
                <select name="serie_producto" id="serie_producto">
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

        </div>
        <section class="section-productos">
            <h2>
                Resultados (<?php echo sizeof($productos)?>)
            </h2>


            <div class="container-productos">

                <?php
    
        foreach($productos as $row){ ?>

                <div class="card">

                    <img src="../assets/img/funkos/<?php echo $row['imgProducto']; ?>"
                        alt="<?php echo $row['imgProducto']; ?>" height="250px">
                    <p><?php echo $row['nombreTipo']; ?></p>
                    <div class="nombre-producto">
                        <h3><?php echo $row['nombreProducto']; ?></h1>
                    </div>

                    <p class="price">$<?php echo $row['precioProducto']; ?></p>

                    <p><button>Add to Cart</button></p>
                </div>
                <?php }
    ?>
            </div>
        </section>
    </div>

</body>

</html>

<?php

        }

    }
?>