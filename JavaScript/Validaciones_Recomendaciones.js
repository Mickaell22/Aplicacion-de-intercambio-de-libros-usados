function validarFormulario(){
    clearMsj();
    let esValido = true;
    let expresionRegular = /^[a-zA-Z]+&/;
    let nombre = document.getElementById("nombres");
    if(nombre.value === ""){
        cargarMsj("El nombre es requerido", nombre);
        esValido = false;
    }else if(nombre.value.length < 3 ){
        cargarMsj("El minimo de caracteres es 3", nombre);//ana es un nombre corto
        esValido = false;
    }else if(expresionRegular.test(nombre.value)){
        cargarMsj("Un nombre solo usa letras", nombre);
        esValido = false;
    }
    //validar apellidos
    let apellidos = document.getElementById("apellidos");
    if(apellidos.value === ""){
        cargarMsj("El apellido es requerido", apellidos);
        esValido = false;
    }else if(apellidos.value.length < 3 ){
        cargarMsj("El minimo de caracteres es 3", apellidos); //zea es un apellido corto
        esValido = false;
    }else if(expresionRegular.test(apellidos.value)){
        cargarMsj("Un nombre solo usa letras", apellidos);
        esValido = false;
    }
    //validar correo
    let correo = document.getElementById("correo");


    //validar select (combo)
    let estado = document.querySelector(".estados");
    if(estado.value===""){
        //alert("Estado civil no ha sido escogido");
        // mensaje+="</br>Estado civil no ha sido escogido";
        esValido = false;
    }
    // let div = document.querySelector("#mensaje");
    //div.textContent = mensaje; //agregar solo texto
    //div.innerHTML = mensaje; //agregar cuailquier elemento hmtl
    return esValido;
}
function cargarMsj(mensaje, elemento){
    elemento.focus();
    let span = document.createElement("span")
    span.textContent = mensaje;
    span.style.color = "red";
    span.style.fontSize = "9pt";
    span.classList.add("error");
    elemento.parentNode.appendChild(span);
}

function clearMsj(){
    let arrSpan = document.querySelectorAll(".error");
    for(let i=0; i<arrSpan.length; i++){
        arrSpan[i].remove(); //elimina elemento
    }
}