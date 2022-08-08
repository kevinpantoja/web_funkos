/*elementos html*/

const 
$input_nombre = document.getElementById("nombre"),
$input_apaterno = document.getElementById("apaterno"),
$input_amaterno = document.getElementById("amaterno"),
$input_email = document.getElementById("email"),
$input_direccion = document.getElementById("direccion"),
$input_cuenta = document.getElementById("cuenta"),
$input_clave = document.getElementById("clave"),
$mensaje__error = document.querySelector(".mensaje__error"),
$enviar = document.querySelector(".boton_enviar"),
$form = document.querySelector(".formulario");


const validar_password = (texto)=>{
    let exp_reg = /^([a-z0-9\.\-\+]+(\s)*)+$/i;
    if(exp_reg.test(texto) && texto.length >= 4){
        return true;
    }
    return false;
}

const validar_cuenta = (texto)=>{
    let exp_reg = /^([0-9]{12})+$/i;
    if(exp_reg.test(texto)){
        return true;
    }
    return false;
}

const validar_clave = (texto)=>{
    let exp_reg = /^([0-9]{6})+$/i;
    if(exp_reg.test(texto)){
        return true;
    }
    return false;
}

const validar_nombre = (texto)=>{
    let exp_reg = /^[a-záéíóúáäëïöü\s]*$/i;
    if(exp_reg.test(texto) && texto.length >= 2){
        return true;
    }
    return false;
}

const validar_correo = (texto)=>{
    let exp_reg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
    if(exp_reg.test(texto)){
        return true;
    }
    return false;
}
const validar_direccion = (texto)=>{
    let exp_reg = /^([a-z0-9\.\-\+]+(\s)*)+$/i;
    if(exp_reg.test(texto) && texto.length > 8){
        return true;
    }
    return false;
}



/*asignacion de eventos*/
const analizar_input = ($elemento,funcion)=>{
    if(funcion($elemento.value.trim())){
        if($elemento.classList.contains("error_input")){
            $elemento.classList.remove("error_input")
        }
        return true;
    }else{
        if(!$elemento.classList.contains("error_input")){
            $elemento.classList.add("error_input")
        }
        return false;
    }
}
const mostrar_error = (mensaje)=>{
    $mensaje__error.innerText = mensaje;
    if(!$mensaje__error.classList.contains("error__visible")){
        $mensaje__error.classList.add("error__visible");
    }
}
const ocultar_error = ()=>{
    if($mensaje__error.classList.contains("error__visible")){
        $mensaje__error.classList.remove("error__visible");
    }
}


/*funciones dentro de los eventos*/

const evento_nombre = ($elemento)=>{
    let solo_letras = /^[a-záéíóúáäëïöü\s]*$/
    if(analizar_input($elemento,validar_nombre)){
        ocultar_error();
    }else{
        if(!solo_letras.test($elemento.value)){
            mostrar_error("El nombre solo debe tener letras");
            return;
        }
        if($elemento.value.length < 2){
            mostrar_error("El nombre debe tener como mínimo 2 caracteres");
            return;
        }
    };
}
const evento_apellido = ($elemento)=>{
    let solo_letras = /^[a-záéíóúáäëïöü\s]*$/
    if(analizar_input($elemento,validar_nombre)){
        ocultar_error();
    }else{
        if(!solo_letras.test($elemento.value)){
            mostrar_error("El apellido solo debe tener letras");
            return;
        }
        if($elemento.value.length < 2){
            mostrar_error("El apellido debe tener como mínimo 2 caracteres");
            return;
        }
    };
}
const evento_direccion = ($elemento)=>{
    let solo_letras = /^[a-z0-9\.\-\s]*$/
    if(analizar_input($elemento,validar_direccion)){
        ocultar_error();
    }else{
        if(!solo_letras.test($elemento.value)){
            mostrar_error("La dirección debe contener solo letras,números . y -");
            return;
        }
        if($elemento.value.length < 8){
            mostrar_error("La dirección debe tener 8 caracters como mínimo");
            return;
        }
    };
}
const evento_cuenta = ($elemento)=>{
    if(analizar_input($elemento,validar_cuenta)){
        ocultar_error();
    }else{
        mostrar_error("La cuenta debe contener 12 números");
        return;
    };
}
const evento_clave = ($elemento)=>{
    if(analizar_input($elemento,validar_clave)){
        ocultar_error();
    }else{
        mostrar_error("La clave debe contener 6 números");
        return;
    };
}
const evento_correo = ($elemento)=>{
    if(analizar_input($elemento,validar_correo)){
        ocultar_error();
    }else{
        mostrar_error("Ingrese un e-mail válido");
    };
}



inputs = [$input_nombre,$input_apaterno,$input_amaterno,$input_direccion,$input_email,$input_cuenta,$input_clave];
input_verificacion = [evento_nombre,evento_apellido,evento_apellido,evento_direccion,evento_correo,evento_cuenta,evento_clave];

window.addEventListener("load", (m)=>{
    for(let i = 0; i < inputs.length;i++){
        inputs[i].addEventListener("input",(e)=>{
            const $elemento = e.target;
            input_verificacion[i]($elemento);
        });
        inputs[i].addEventListener("click",(e)=>{
            const $elemento = e.target;
            input_verificacion[i]($elemento);
        });
    }
});



/*validar antes de enviar*/
const verificando_casillas = (elementos,funciones)=>{
    let verificador = true;
    for(let i = 0; i < elementos.length; i++){
        if(!analizar_input(elementos[i],funciones[i])){
            console.log(elementos[i].value+"  "+i);
            if(verificador)
                verificador = false;
        }
    }
    return verificador;
}


$enviar.addEventListener("click",(e)=>{
    e.preventDefault();
    if(verificando_casillas(
        [$input_nombre,$input_apaterno,$input_amaterno,$input_direccion,$input_email,$input_cuenta,$input_clave],
        [validar_nombre,validar_nombre,validar_nombre,validar_direccion,validar_correo,validar_cuenta,validar_clave]
    )){
        $form.submit();
    }else{
        mostrar_error("no se puede enviar por datos inválidos");
    }
})
