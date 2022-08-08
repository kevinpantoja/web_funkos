<?php

if(isset($_POST['monto'])){
    $id=$_POST['cuenta'];

    if(preg_match("/^[0-9]{12}$/",$id)){
        $pass=$_POST['clave'];
        if(preg_match("/^[0-9]{6}$/",$pass)){
            $propietario=$_POST['nombre']." ".$_POST["apaterno"]." ".$_POST["amaterno"];
            $monto=$_POST['monto']; 
            $nProd = $_POST["nProd"];   
            if(!empty($propietario)&&!empty($monto)){
                include_once("./controllerMetodoPago.php");
                $obj=new controllerMetodoPago();
                $obj->realizarPago($id,$pass,$propietario,$nProd,$monto);
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