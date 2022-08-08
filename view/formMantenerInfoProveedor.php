<?php 

if(isset($_POST["btnProceso"])){
    $form = new FormMantenerInfoProveedor();
    $form->showForm();
}else{
    if(isset($_POST["btnProveedor"])){
        $form = new FormMantenerInfoProveedor();
        $form->showFormInsertar();
    }
}


class FormMantenerInfoProveedor{
    function showForm(){
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>formPrincipal</title>

            <link rel="stylesheet" href="../assets/style.css">
        </head>
        <body>
            <section class="contenedor">
            <h2 class="titulo_principal"style="background-color: white;">Modificar Proveedor:</h2>
            <form class="botones_admin_form" name="fom1" method="post" action="" method="POST">
                <input type="submit" class="botones_admin" name="btnProveedor" value="Registrar" >
            </form>
            <br>
            <form class="botones_admin_form" name="fom1" method="post" action="../controller/" method="POST">
                <input type="submit" class="botones_admin" name="btnProveedorModificar" value="Modificar" >
            </form>
            <br>
            <form class="botones_admin_form" name="fom1" method="post" action="./formPrincipal.php" method="POST">
                <input type="submit" class="botones_admin" name="btnPrincipal" value="Regresar" >
            </form>
            </section>
        </body>
        </html>
        
    <?php
    }

    function showFormInsertar(){
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>formPrincipal</title>

            <link rel="stylesheet" href="../assets/style.css">
        </head>
        <body>
            <section class="contenedor">
            
            <h2 class="titulo_principal"style="background-color: white;">Modificar Proveedor:</h2>
            <form class="botones_admin_form proveedor_form1" name="fom1" method="post" action="../controller/getMantenerInforProveedor.php" method="POST">
                <article class="proveedor_form">
                    <div class="proveedor_insertar_form"><label>RUC</label><input type="text" name="ruc"></input></div>
                    <div class="proveedor_insertar_form"><label>Nombre de la Empresa</label><input type="text" name="nombre"></input></div>
                    <div class="proveedor_insertar_form"><label>Correo</label><input type="text" name="correo"></input></div>
                    <div class="proveedor_insertar_form"><label>Telefono</label><input type="text" name="telefono"></input></div>    
                </article>
                
                <input type="submit" class="botones_admin" name="btnProveedor" value="Registrar" >
            </form>
            <br>
            <form class="botones_admin_form" name="fom1" method="post" action="./formPrincipal.php" method="POST">
                <input type="submit" class="botones_admin" name="btnPrincipal" value="Cancelar" >
            </form>
            </section>
        </body>
        </html>
        
    <?php
    }
}

?>