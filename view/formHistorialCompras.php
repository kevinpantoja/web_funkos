<?php

include_once("shared/header.php");
include_once("shared/footer.php");

class FormHistorialCompras
{
    public function showFormHistorialCompras($arrOrdenesDeCompra)
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
            <?php Header::obtenerInstancia(); ?>
            <div class="contenedor_body">
                <div class="orden_compra">
                    <h>Historial ordenes de compra</h1>
                        <section class="contenedor_ordenes">
                            <?php for ($i = 0; $i < count($arrOrdenesDeCompra); $i++) {
                            ?>
                                <div class="orden_compra_individual">
                                    <form class="formulario" id="miFormulario" name="form1" action="controller/getOrdenCompra.php" method="POST">
                                        <div>
                                            ID: <input type="text" id="txtIdOrdenCompra" name="txtIdOrdenCompra" value="<?php echo $arrOrdenesDeCompra[$i]["idOrdenCompra"]; ?>" readonly>
                                        </div>
                                        <div>
                                            Fecha de solicitud: <?php echo $arrOrdenesDeCompra[$i]["fechaDePedido"]; ?>
                                        </div>
                                        <div>
                                            Estado: <?php echo $arrOrdenesDeCompra[$i]["estado"]; ?>
                                        </div>
                                        <div>
                                            <input class="btnCancelar" autocomplete="off" type="submit" name="btnCancelar" id="btnCancelar" value="Cancelar">
                                        </div>
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