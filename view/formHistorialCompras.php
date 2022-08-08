<?php
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
            <title>Historial de compras</title>
            <link rel="stylesheet" href="../view/formHistorial.css">
        </head>

        <body>
            <section class="contenedor">
                <div class="contenedor__elementos">
                    <h1 class="formulario_titulo input_texto" align="center">
                        <strong>Historial de ordenes de compra</strong>
                    </h1>
                    <?php for ($i = 0; $i < count($arrOrdenesDeCompra); $i++) { ?>
                        <div class="dividsor">
                            <form class="formulario" id="miFormulario" name="form1" action="../controller/getOrdenCompra.php" method="POST">
                                <div class="formulario_input _50">
                                    <label class="formulario_label" for="nombres">ID</label>
                                    <input class="input_text" type="text" id="txtIdOrdenCompra" name="txtIdOrdenCompra" value="<?php echo $arrOrdenesDeCompra[$i]["idOrdenCompra"]; ?>" readonly>
                                </div>
                                <div class="formulario_input _50">
                                    <label class="formulario_label" for="nombres">Productos</label>
                                    <input class="input_text" type="text" value="<?php echo $arrOrdenesDeCompra[$i]["productos"]; ?>" readonly>
                                </div>
                                <div class="formulario_input _50">
                                    <label class="formulario_label" for="nombres">Estado</label>
                                    <input class="input_text" type="text" value="<?php echo $arrOrdenesDeCompra[$i]["estado"]; ?>" readonly>
                                </div>
                                <div class="formulario_input _50">
                                    <label class="formulario_label" for="nombres">Fecha de solicitud</label>
                                    <input class="input_text" type="text" value="<?php echo $arrOrdenesDeCompra[$i]["fechaDePedido"]; ?>" readonly>
                                </div>
                                <div class="formulario_input _100">
                                    <input class="boton_cancelar" autocomplete="off" type="submit" name="btnCancelar" id="btnCancelar" value="Cancelar">
                                </div>
                            </form>
                        </div>
                    <?php

                    } ?>
                    <form action="../index.php" method="POST">
                        <div class="formulario_input _100">
                            <input class="boton_enviar" autocomplete="off" type="submit" name="regresar" id="actualizar" value="Regresar">
                        </div>
                    </form>
                </div>
            </section>

        </body>

        </html>
<?php
    }
}

?>