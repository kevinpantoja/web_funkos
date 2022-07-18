<?php
	class formMensaje
	{
		public function formMensajeShow($icono,$mensaje,$enlace)
		{
			?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Mensaje</title>

                    <link rel="stylesheet" href="../assets/style.css">
                </head>
                <body>
                    <section class="contenedor">
                        <div class="mensaje">
                        <table width="285" border="0" align="center">
                                <tr>
                                    <td width="103" rowspan="2" align="center"><img src="../assets/imgenes/<?php echo $icono?>" width="100" height="100"></td>
                                    <td width="172" class="title"> <strong>MENSAJE:</strong></td>
                                </tr>
                                <tr>
                                    <td><table class="contenido" width="200" border="0" align="center">
                                    <tr>
                                        <td align="center" valign="middle"><?php echo strtoupper($mensaje); ?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="middle"><?php echo $enlace; ?></td>
                                    </tr>
                                    </table></td>
                                </tr>
                        </table>
                        </div>
                    </section>
                </body>
                </html>
            <?php	
		}	
	}

?>
