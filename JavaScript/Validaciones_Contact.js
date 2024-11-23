function validarFormulario(){
    eliminarMensaje();
    let estado = true;

    // Validar nombre del usuario
let nombre = document.getElementById("nombre");
if (nombre.value.trim() === "") {
    cargarMensaje("El Nombre del usuario es obligatorio",nombre);
    estado = false;
}

// Validar correo
let correo = document.getElementById("correo");
if (correo.value.trim() === "") {
    cargarMensaje("El correo es obligatorio", correo);
    estado = false;
}

// Validar asunto
let asunto = document.getElementById("asunto");
if (asunto.value.trim() === "") {
    cargarMensaje("El asunto es obligatorio", asunto);
    estado = false;
}

// Validar Teléfono
let telefono = document.getElementById("telefono");
if (telefono.value.trim() === "") {
    cargarMensaje("El teléfono es obligatorio", telefono);
    estado = false;
}

// Validar categoria del problema
let categoria = document.getElementById("categoria");
if (categoria.value === "") {
    cargarMensaje("Debe seleccionar una categoria", categoria);
    estado = false;
}

// Validar prioridad del mensaje
let mensaje = document.getElementById("mensaje");
if (mensaje.value === "") {
    cargarMensaje("Debe seleccionar una opción", mensaje);
    estado = false;
}




// Validar descripción
let descripcion = document.getElementById("descripcion");
if (descripcion.value.trim() === "") {
    cargarMensaje("La descripción es obligatoria", descripcion);
    estado = false;
} else if (descripcion.value.length < 20) {
    cargarMensaje("La descripción debe tener al menos 20 caracteres", descripcion);
    estado = false;
}

// Validar captura
let captura = document.getElementById("captura");
if (captura.files.length === 0) {
    cargarMensaje("Debe subir una imagen relacionada a su sugerencia o problema", captura);
    estado = false;
} else {
    let capturaFile = portada.files[0];
    if (!["image/jpeg", "image/png"].includes(capturaFile.type)) {
        cargarMensaje("La captura debe estar en formato JPG o PNG", captura);
        estado = false;
    } else if (capturaFile.size > 5 * 1024 * 1024) { // 5 MB
        cargarMensaje("La captura no debe superar los 5MB", captura);
        estado = false;
    }
}
// Validar cantidad de sugerencias o problemas
let cantidad = document.getElementById("cantidad");
if (cantidad.value.trim() === "" || cantidad.value <= 0) {
  cargarMensaje("Seleccionar la cantidad de sugerencias o problemas(Máximo 5)", cantidad);
  estado = false;
}
 

    return estado;

}








// Para cargar mensaje de error
function cargarMensaje(mensaje, elemento) {
    // Enfocar la atención del mouse
    let spanExistente = elemento.parentNode.querySelector(".error");
    if (!spanExistente) {
      let span = document.createElement("span");
      span.classList.add("error");
      span.textContent = mensaje;
      elemento.parentNode.appendChild(span);
    }
    elemento.focus();
  }
  
  // Para eliminar mensajes de error
  function eliminarMensaje() {
    let arrSpan = document.querySelectorAll(".error");
    for (let i = 0; i < arrSpan.length; i++) {
      arrSpan[i].remove();
    }
  }