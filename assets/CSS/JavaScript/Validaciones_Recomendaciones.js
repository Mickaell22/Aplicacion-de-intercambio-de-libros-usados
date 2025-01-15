function validarFormulario(){
    clearMsj();
    let esValido = true;
    let expresionRegular = /^[a-zA-Z]+$/;
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    let nombre = document.getElementById("nombres");
    if(nombre.value === ""){
        cargarMsj("El nombre es requerido", nombre);
        esValido = false;
    }else if(nombre.value.length < 3 ){
        cargarMsj("El minimo de caracteres es 3", nombre);//ana es un nombre corto
        esValido = false;
    }else if(!expresionRegular.test(nombre.value)){
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
    }else if(!expresionRegular.test(apellidos.value)){
        cargarMsj("Un nombre solo usa letras", apellidos);
        esValido = false;
    }
    //validar correo
    let correo = document.getElementById("correo");
    if(!regexEmail.test(correo.value)){
        cargarMsj("El correo no es valido", correo);
        esValido = false;
    }
    //validar titulo
    let titulo = document.getElementById("titulo");
    if(titulo.value === ""){
        cargarMsj("El titulo es requerido", titulo);
        esValido = false;
    }else if(titulo.value.length < 2){
        cargarMsj("El minimo de caracteres es 2", titulo);
        esValido = false;
    }
    //validar select (combo)
    let estado = document.querySelector(".categorias");
    if(estado.value===""){
        cargarMsj("El genero del libro no ha sido escogido", estado);
        esValido = false;
    }
    //validar sinopsis
    let desc = document.getElementById("resumen");
        if(desc.value === ""){
            cargarMsj("La sinopsis es requerida", desc);
            esValido = false;
        }else if(desc.value.length < 30){
            cargarMsj("El minimo de caracteres es 30", desc);
            esValido = false;
        }
        
    if(esValido === true){
        alert("El formulario ha sido enviado correctamente");
    }
    return esValido;
}
function cargarMsj(mensaje, elemento){
    elemento.focus();
    let span = document.createElement("span")
    span.textContent = mensaje;
    span.style.fontSize = "9pt";
    span.classList.add("error");
    elemento.parentNode.appendChild(span);
}

function clearMsj(){
    let arrSpan = document.querySelectorAll(".error");
    for(let i=0; i<arrSpan.length; i++){
        arrSpan[i].remove(); 
    }
}