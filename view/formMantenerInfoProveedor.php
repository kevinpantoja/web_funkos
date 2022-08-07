<?php 

if(isset($_POST["btnProceso"])){
    $form = new FormMantenerInfoProveedor();
    $form->showForm();
}else{
    
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
            <form class="botones_admin_form" name="fom1" method="post" action="../controller/" method="POST">
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
}

?>