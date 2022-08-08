<?php
    class FormRegistroUsuario
    {   
        public function formRegistroUsuarioShow(){

       
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar nueva cuenta</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <section class="contenedor">
        <div class="contenedor__elementos">
            <div class="contenedor__banner">
                <img src="../assets/img/logoS.png" alt=""> 
            </div>
        
            <form class="formulario" name="" id="miFormulario" method="POST" action="../controller/getAutenticarRegistroUsuario.php" enctype="multipart/form-data">
                <div class="mensaje__error">
                    
                </div>
                <!--comentario-->
                <h1 class="formulario_titulo input_texto"><strong>Registro de persona</strong></h1>
                <div class="formulario_input _100">
                    <label class="formulario_label" for="username">Nombre de usuario: </label>
                    <input placeholder="Username" autocomplete="off"  class="input_text" name="username" type="text" id="username" required>
                </div>
                <div class="formulario_input _100">
                    <label class="formulario_label" for="password">Contraseña: </label>
                    <input placeholder="Contraseña" autocomplete="off"  class="input_text" name="password" type="password" id="password" required>
                </div>
                <div class="formulario_input _50">
                    <label class="formulario_label" for="nombres">Nombre:</label>
                    <input placeholder="Ingrese su nombre" autocomplete="off"  class="input_text" name="nombre" type="text" id="nombre" required>
                </div>
                <div class="formulario_input _50">
                    <label class="formulario_label" for="apaterno">Apellido paterno</label>
                    <input placeholder="Apellido Paterno" autocomplete="off"  class="input_text" name="apaterno" type="text" id="apaterno" required>
                </div>
                <div class="formulario_input _50">
                    <label class="formulario_label" for="amaterno">Apellido materno</label>
                    <input placeholder="Apellido Materno" autocomplete="off"  class="input_text" name="amaterno" type="text" id="amaterno" required>
                </div>
                <div class="formulario_input _100">
                    <label class="formulario_label" >Genero</label>
                    <div class="input_radio">
                        <input autocomplete="off" class="input_genero" name="genero" type="radio" id="genero_0" value="masculino" checked >
                        <label class="label_genero" for="genero_0">Masculino</label>
                    </div>
                    <div class="input_radio">
                        <input autocomplete="off" class="input_genero" name="genero" type="radio" id="genero_1" value="femenino">
                        <label class="label_genero" for="genero_1">Femenino</label>  
                    </div>
                    
                </div>
                <div class="formulario_input _50">
                    <label class="formulario_label" for="email">Email</label>
                    <input placeholder="Correo Electrónico" autocomplete="off"  class="input_text" name="email" type="text" id="email" required>
                </div>
                <div class="formulario_input _50">
                    <label class="formulario_label" for="telefono">Telefono</label>
                    <input placeholder="Número de Celular" autocomplete="off"  class="input_text" name="telefono" type="text" id="telefono" required>
                </div>
                <div class="formulario_input _100">
                    <label class="formulario_label" for="direccion">Dirección</label>
                    <input placeholder="Dirección" autocomplete="off"  class="input_text" name="direccion" type="text" id="direccion" required>
                </div>
                <div class="formulario_input _100">
                    <input class="boton_enviar" autocomplete="off"  type="submit" name="enviar" id="aceptar" value="Registrar" required>
                </div>

            </form>
        </div>
    </section>      
    
    <script src="../assets/script.js"></script>
</body>
</html>
        <?php
        
        }
    }

    $objFormRegistroUsuario = new FormRegistroUsuario;
    $objFormRegistroUsuario -> formRegistroUsuarioShow();
?>