<?php

//include_once("../shared/header.php");
//include_once("../shared/footer.php");

class FormHistorialCompras
{
    public function showFormHistorialCompras(/*$arrayOrdenesCompra*/)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../view/footerHeader.css">
            <title>Historial de compras</title>
        </head>

        <body>
            <div class="contenedor_body">
                <div class="orden_compra">
                    <h1>Historial ordenes de compra</h1>
                    <section class="contenedor_ordenes">
                        <?php for ($i = 0; $i < 4; $i++) {
                        ?>
                            <div class="orden_compra_individual">
                                <form class="formulario" id="miFormulario" name="form1" action="controller/getOrdenCompra.php" method="POST">
                                    <div>
                                        ID: <?php /*echo $arrayOrdenesCompra[$i]["idOrdenCompra"]*/; ?>
                                    </div>
                                    <div>
                                        Fecha de solicitud: <?php /*echo $arrayOrdenesCompra[$i]["fecha_compra"]*/; ?>
                                    </div>
                                    <div>
                                        Estado: <?php /*echo $arrayOrdenesCompra[$i]["estado"]*/; ?>
                                    </div>
                                    <div>
                                    </div>
                                    <input class="btnCancelar" autocomplete="off" type="submit" name="btnCancelar" id="btnCancelar" value="Cancelar">
                                </form>
                            </div>
                        <?php
                        } ?>
                    </section>
                </div>
            </div>
        </body>

        </html>
<?php
    }
}

?>