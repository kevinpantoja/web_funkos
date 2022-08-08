<?php

if(isset($_POST['btnPagar'])){
    $id=$_POST['txtId'];

    if(preg_match("/^[0-9]*$/",$id)){
        $pass=$_POST['txtPassword'];
        if(preg_match("/^[A-Za-z0-9]*$/",$pass)){
            $propietario=$_POST['txtPropietario'];
            $monto=$_POST['txtMonto'];    
            if(!empty($propietario)&&!empty($monto)){
                include_once("./controllerMetodoPago.php");
                $obj=new controllerMetodoPago();
                $obj->realizarPago($id,$pass,$propietario,$monto);
            }
        }else{
            echo "no2";
        }
    }else{
        echo "no";
    }
}


if(isset($_POST['btnRegresar'])){
    
}

?>