<?php
        session_start();
        include_once('../model/modeloUsuarioPrivilegio.php');
        $objUsuarioPrivilegio = new UsuarioPrivilegio();
        $listaPrivilegios = $objUsuarioPrivilegio -> obtenerPrivilegios($_SESSION["cuenta"]);
        include_once('../view/formPrincipal.php');
        $objFormPrincipal = new formPrincipal();
        $objFormPrincipal -> formPrincipalShow($listaPrivilegios);
?>