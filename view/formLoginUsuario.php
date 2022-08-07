<?php
	class formLoginUsuario
	{
		public function formLoginUsuarioShow()
		{
			?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Form Login Usuario</title>

                    <link rel="stylesheet" href="assets/style.css">
                </head>
                    <body>
                        <section class="contenedor">
                            <div class="contenedor__elementos">
                                <div class="contenedor__banner">
                                    <img src="assets/img/logoS.png" alt=""> 
                                </div>
        
                                <form class="formulario" id="miFormulario"  name="form1" action="controller/getLoginUsuario.php" method="POST">
                                    <div class="mensaje__error"></div>
                                    <h1 class="formulario_titulo input_texto"><strong>Iniciar Sesión</strong></h1>
                                    <div class="formulario_input _100">
                                        <label class="formulario_label" for="nombre">Usuario</label>
                                        <input placeholder="Usuario" autocomplete="off"  class="input_text" name="txtLogin" type="text" id="nombre">
                                    </div>
                                    <div class="formulario_input _100">
                                        <label class="formulario_label" for="apaterno">Password</label>
                                        <input placeholder="Password" autocomplete="off"  class="input_text" name="txtPassword" type="password" id="apaterno">
                                    </div>
                                    <div class="formulario_input _50"> 
                                        <label class="formulario_label_registro" for="registrar">¿No tienes cuenta?  <a name = "registrar" href="view/formRegistroUsuario.php">Regístrate</a></label>
                                       
                                    </div>
                                    <div class="formulario_input _50">
                                        <input class="boton_enviar"autocomplete="off"  type="submit" name="bntAceptar" id="aceptar" value="Ingresar" >
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


