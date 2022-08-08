<?php
    include_once("../shared/header.php");
    include_once("../shared/footer.php");
    class formMetodoPago{

        public function  showForm(){

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarjeta</title>

        <link rel="stylesheet" href="../assets/style.css">
        <link rel="stylesheet" href="./footerHeader.css">
    </head>
    <body>

                        <section class="contenedor">
                            <div class="contenedor__elementos">
                                <div class="contenedor__tarjeta">
                                    <img src="../assets/img//tarjeta.jpg" alt=""> 
                                </div>
        
                                <form class="formulario" id="miFormulario"  name="form1" action="../controller/getMetodoPago.php" method="POST">
                                    <div class="mensaje__error"></div>
                                    <h1 class="formulario_titulo input_texto"><strong>PAGO POR TAJETA</strong></h1>
                                    <div class="formulario_input _100">
                                        <label class="formulario_label" for="nombre">ID Tarjeta</label>
                                        <input placeholder="Usuario" autocomplete="off"  class="input_text" name="txtId" type="text" id="nombre">
                                    </div>
                                    <div class="formulario_input _100">
                                        <label class="formulario_label" for="apaterno">Password</label>
                                        <input placeholder="Clave" autocomplete="off"  class="input_text" name="txtPassword" type="password" id="apaterno">
                                    </div>
                                    <div class="formulario_input _100">
                                        <label class="formulario_label" for="apaterno">propietario</label>
                                        <input placeholder="Propietario" autocomplete="off"  class="input_text" name="txtPropietario" type="text" id="apaterno">
                                    </div>
                                    <div class="formulario_input _100">
                                        <label class="formulario_label" for="apaterno">Monto Total</label>
                                        <input placeholder="Monto a pagar" autocomplete="off"  class="input_text" name="txtMonto" type="text" id="apaterno">
                                    </div>
                                    <div class="formulario_input _50">
                                        <input class="boton_enviar"autocomplete="off"  type="submit" name="btnPagar" id="aceptar" value="Pagar" >
                                    </div>

                                </form>
                                <form>
                                    <div class="formulario_input _50">
                                        <input class="boton_enviar"autocomplete="off"  type="submit" name="btnRegresar" id="btnRegresar" value="Regresar" >    
                                    </div>
                                </form>
 
                            </div>
                        </section>

    </body>
    </html>
<?php
        }

    }

    $obj=new formMetodoPago();
    $obj->showForm();

?>