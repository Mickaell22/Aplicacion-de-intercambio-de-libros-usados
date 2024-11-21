function validarFormulario(){
    clearMsj();
    let esValido = true;
    let expresionRegular = /^[a-zA-Z]+&/;
    let nombre = document.getElementById("nombre");
    let msj ="";
    if(nombre.value === ""){
        //siempre se evalua el valor
        //alert("El nombre es requerido");
        mensaje+="</br>El nombre es requerido";
        cargarMsj("El nombre es requerido", nombre);
        esValido = false;
    }else if(nombre.value.length < 3 ){
        //alert("El minimo de caracteres es 3");
        mensaje+="</br>El minimo de caracteres es 3";
        cargarMsj("El minimo de caracteres es 3", nombre);
        esValido = false;
    }else if(expresionRegular.test(nombre.value)){
        //alert("Un nombre solo usa letras");
        mensaje+="</br>Un nombre solo usa letras";
        cargarMsj("Un nombre solo usa letras", nombre);
        esValido = false;
    }
    //validar fecha
    let elementoFecha= document.getElementById("fecha");
    let fechaMin = new Date("2000-01-01");
    let fechaAct = new Date();
    if(elementoFecha.value === ""){
        //alert("Fecha es requerida");
        mensaje+="</br>Fecha es requerida";
        cargarMsj("Fecha es requerida", elementoFecha);
        esValido = false;
    }else{
        let fechaSeleccionada = new Date(elementoFecha.value);
        if(fechaSeleccionada <= fechaAct){
            //alert("Fecha debe ser posterior a la actual");
            mensaje+="</br>Fecha debe ser posterior a la actual";
            cargarMsj("Fecha debe ser posterior a la actual", elementoFecha);
            esValido = false;
        }
    }
    //validar select (combo)
    let estado = document.querySelector(".estados");
    if(estado.value===""){
        //alert("Estado civil no ha sido escogido");
        mensaje+="</br>Estado civil no ha sido escogido";
        esValido = false;
    }
    //validar radios
    let genero = document.querySelector('input[name="genero"]:checked')
    if(!genero){
        //alert("el genero es requerido");
        mensaje+="</br>el genero es requerido";
        esValido = false;
    }else{
        //alert(genero.value);
        if(genero.value == "femenino"){
            alert("eres una chica");
        }
    }
    //checkbox
    let intereses = document.querySelectorAll('input[name="intereses"]:checked');
    //retorna arreglo de objeto
    if(intereses.length===0){
        //alert("elija al menos 1 interes");
        mensaje+="</br>elija al menos 1 interes";
        esValido = false; 
    }
    let div = document.querySelector("#mensaje");
    //div.textContent = mensaje; //agregar solo texto
    div.innerHTML = mensaje; //agregar cuailquier elemento hmtl
    
    
    return esValido;
}