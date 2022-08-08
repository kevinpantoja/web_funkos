<?php
    include_once("../shared/header.php");
    include_once("../shared/footer.php");
    class formCarrito{

        public function showForm(){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrito</title>
        <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../view/footerHeader.css">
        <link rel="stylesheet" href="../view/formProducto.css">
        <link rel="stylesheet" href="../view/formCarrito.css">
    </head>
    <body></body>
        <?php Header::obtenerInstancia(); ?>
        
        <section class="show-products">
            <h1 class="title">Productos añadidos</h1>
            <div class="box-container">
    <?php
        $total=0;
        include_once("../model/modelCarrito.php");
        $obj=new modelCarrito();
        $listaProductos=$obj->listarProductos();

        if($listaProductos>0){
            foreach($listaProductos as $producto){
                // var_dump($producto);
    ?>  
            <div class="box">
                <a href="../controller/getCarrito.php?delete=<?php echo $producto['id_producto'] ?>" class="fas fa-times" onclick="return confirm('Borraste el producto')"></a>
                <div class="price">s/.<?php echo $producto['precio_prod']; ?></div>
                <img class="" src="../img/<?php echo $producto['imagen']; ?>" alt="" width="80" height="100">
                <div class="name"><?php echo $producto['nombre']; ?></div>
                <form action="../controller/getCarrito.php" method="POST">
                     <input type="hidden" name="carrito_id" value="<?php echo $producto['id_producto']; ?>" >
                     <input type="number" name="carrito_cantidad" min="1" value="<?php echo $producto['cantidad'];  ?>" class="cantidad">
                     <input type="submit" name="update_carrito" value="Actualizar" class="option-btn">
                </form>
                <div class="sub-total">Sub total: s/.<span><?php echo $sub_total = ($producto['cantidad'] * $producto["precio_prod"]) ?></span></div>
            </div>
    <?php
            $total += $sub_total;
        }
    }else{
        echo "<p class='empty'>Tu carrito está vacío</p>";
    }
    ?>
            </div>
            
            <div style="margin-top: 2rem; text-align: center;">
                <a href="../controller/getCarrito.php?delete_all" class="delete-btn <?php echo ($total > 1) ? '' : 'disabled' ?>" onclick="return confirm('Borraste todo el carrito')">Borrar todo</a>
            </div>

            <div class="carrito_total">
            <p>Total generado: <span>s/.<?php echo $total; ?></span> </p>
            <div class="flex">
                <?php

                ?>
                <form method="POST" action="../controller/getCarrito.php">
                    <input type="submit" name="btnContinuarComprando" class="option-btn" value="Continuar comprando">
                    <input type="submit" name="btnEfectuarPago" class="btn <?php echo ($total > 1) ? '' : 'disabled' ?>" value="Efectuar Pago">
                </form>
            </div>
        </div>

        </section>

        <?php footer::obtenerInstancia(); ?>
    </body>
    </html>
    <?php
        }
    }


    include_once("../view/formCarrito.php");
    $obj=new formCarrito();
    $obj->showForm();
?>