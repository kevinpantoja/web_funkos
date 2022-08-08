<?php 

class FormEfectuar{
    public function showForm($datos,$total){
        var_dump($datos);
        echo $total;
    }



    public function showFormComprar($datos,$total){
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Comprar</title>
            <link rel="stylesheet" href="../assets/style.css">
        </head>
        <body>
            <section class="contenedor contenedor__proforma">
                <div class="contenedor__elementos">
                    <div class="contenedor_imagen_proforma">
                        <div class="proforma_compra">
                            <table class="tabla_proforma">
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio SubTotal</th>
                                </tr>
                                <?php 
                                for($i = 0; $i < sizeof($datos) ;$i++){
                                    $cantidad = 0;
                                    ?>
                                <tr>
                                    <td><?php echo  $i+1; ?></td>
                                    <td><?php echo  $datos[$i]["nombre"]; ?></td>
                                    <td><?php echo  $datos[$i]["cantidad"]; ?></td>
                                    <td><?php echo  $datos[$i]["precio_prod"]; ?></td>
                                    <td><?php echo  $datos[$i]["precio_prod"]*$datos[$i]["cantidad"]; ?></td>
                                </tr>
                                    <?php
                                    $cantidad = $cantidad + $datos[$i]["cantidad"];
                                }
                                ?>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td colspan="3"><?php echo $total; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                
                    <form class="formulario" name="" id="miFormulario" method="POST" action="../controller/getMetodoPago.php" enctype="multipart/form-data">
                        <div class="mensaje__error">
                            
                        </div>
                        <!--comentario-->
                        <h1 class="formulario_titulo input_texto"><strong>Datos Personales</strong></h1>
                        <div class="formulario_input _50">
                            <label class="formulario_label" for="nombres">Nombre:</label>
                            <input placeholder="Ingrese su nombre" autocomplete="off"  class="input_text" name="nombre" type="text" id="nombre" value = "">
                        </div>
                        <div class="formulario_input _50">
                            <label class="formulario_label" for="apaterno">Apellido paterno</label>
                            <input placeholder="Apellido Paterno" autocomplete="off"  class="input_text" name="apaterno" type="text" id="apaterno" value = "">
                        </div>
                        <div class="formulario_input _50">
                            <label class="formulario_label" for="amaterno">Apellido materno</label>
                            <input placeholder="Apellido Materno" autocomplete="off"  class="input_text" name="amaterno" type="text" id="amaterno" value="">
                        </div>
                        <div class="formulario_input _50">
                            <label class="formulario_label" for="email">Email</label>
                            <input placeholder="Correo Electrónico" autocomplete="off"  class="input_text" name="email" type="text" id="email" value="">
                        </div>
                        <div class="formulario_input _50">
                            <label class="formulario_label" for="telefono">Nmo Cuenta</label>
                            <input placeholder="Número de Celular" autocomplete="off"  class="input_text" name="cuenta" type="text" id="cuenta" value="">
                        </div>
                        <div class="formulario_input _50">
                            <label class="formulario_label" for="telefono">Clave Cuenta</label>
                            <input placeholder="Número de Celular" autocomplete="off"  class="input_text" name="clave" type="text" id="clave" value="">
                        </div>
                        <div class="formulario_input _100">
                            <label class="formulario_label" for="direccion">Dirección</label>
                            <input placeholder="Dirección" autocomplete="off"  class="input_text" name="direccion" type="text" id="direccion" value="">
                        </div>
                        
                        <div class="formulario_input _100">
                            <input class="boton_enviar" autocomplete="off"  type="submit" name="btnPagar" id="actualizar" value="Comprar" >
                        </div>
                        <input style="display:none" type="text" name="monto" value="<?php echo $total; ?>">
                        <input style="display:none" type="text" name="nProd" value="<?php echo $cantidad; ?>">

                    </form>
                    <form action="../index.php" method="POST">
                        <div class="formulario_input _100">
                            <input class="boton_enviar" autocomplete="off"  type="submit" name="regresar" id="actualizar" value="Regresar" >
                        </div>    
                    </form>
                    
                    <script src="../assets/script1.js"></script>
                </div>
            </section>      
        </body>
        </html>
    
    <?php    
    }
}


?>