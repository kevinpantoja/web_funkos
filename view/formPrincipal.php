<?php
	class formPrincipal
	{
		public function formPrincipalShow($listaPrivilegios)
		{
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
                    <h2 style="background-color: white;">El usuario tiene Acceso a:</h2>
                    <?php
                        $maximo = count($listaPrivilegios);
                        for($i = 0; $i < $maximo; $i++)
                        {
                            ?>
                            <form name="fom1" method="post" action="<?php echo $listaPrivilegios[$i]['pathPrivilegio']?>">
                                <img src="../assets/imgenes/<?php echo $listaPrivilegios[$i]['iconPrivilegio']?>" width="25" height="25">
                                <input type="submit" name="bntProceso" value="<?php echo $listaPrivilegios[$i]['labelPrivilegio']?>" >
                            </form>
                            <br>
                            <?php	
                        }				
                    ?>
                    <br>
                    </section>
                </body>
                </html>
                
            <?php	
		}	
	}

?>
