<?php 
    include_once('../controller/controllerAutenticarRegistroUsuario.php');
    
    if(isset($_POST['enviar'])){
        $usuario=trim($_POST['username']);
        $password = md5(trim($_POST['password']));
        $nombre=trim($_POST['nombre']);
        $ap_paterno=trim($_POST['apaterno']);
        $ap_materno=trim($_POST['amaterno']);
        $genero=trim($_POST['genero']);
        $email=trim($_POST['email']);
        $direccion=trim($_POST['direccion']);
        $telefono=trim($_POST['telefono']);
        
        $objController = new controllerAutenticarRegistroUsuario;
        $objController -> validarRegistroUsuario($usuario,$password,$nombre,$ap_paterno, $ap_materno, $genero, $email, $direccion, $telefono);
        
    }else{
        include_once('../shared/formMensaje.php');
		$objformMensaje = new formMensaje;
		$objformMensaje -> formMensajeShow("error.png","Error, Se ha detectado un acceso no permitidos","<a href='../index.php'>Ir al inicio </a>");
    }    
?>