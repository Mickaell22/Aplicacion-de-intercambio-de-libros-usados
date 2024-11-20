function validarFormulario(){
    eliminarMensaje();
    let estado = true;

    // Validar título del libro
let titulo = document.getElementById("titulo");
if (titulo.value.trim() === "") {
    cargarMensaje("El título del libro es obligatorio", titulo);
    estado = false;
}

// Validar autor
let autor = document.getElementById("autor");
if (autor.value.trim() === "") {
    cargarMensaje("El autor es obligatorio", autor);
    estado = false;
}

// Validar género literario
let genero = document.getElementById("genero");
if (genero.value === "") {
    cargarMensaje("Debe seleccionar un género literario", genero);
    estado = false;
}

// Validar año de publicación
let anio = document.getElementById("anio");
let anioActual = new Date().getFullYear();
if (anio.value === "") {
    cargarMensaje("El año de publicación es obligatorio", anio);
    estado = false;
} else if (anio.value < 1000 || anio.value > anioActual) {
    cargarMensaje(`El año de publicación debe estar entre 1000 y ${anioActual}`, anio);
    estado = false;
}

// Validar editorial
let editorial = document.getElementById("editorial");
if (editorial.value.trim() === "") {
    cargarMensaje("La editorial es obligatoria", editorial);
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

// Validar portada del libro
let portada = document.getElementById("portada");
if (portada.files.length === 0) {
    cargarMensaje("Debe subir una imagen de portada del libro", portada);
    estado = false;
} else {
    let portadaFile = portada.files[0];
    if (!["image/jpeg", "image/png"].includes(portadaFile.type)) {
        cargarMensaje("La portada debe estar en formato JPG o PNG", portada);
        estado = false;
    } else if (portadaFile.size > 5 * 1024 * 1024) { // 5 MB
        cargarMensaje("El archivo de portada no debe superar los 5MB", portada);
        estado = false;
    }
}

// Validar archivo del libro
let archivo = document.getElementById("archivo");
if (archivo.files.length === 0) {
    cargarMensaje("Debe subir un archivo del libro en formato PDF", archivo);
    estado = false;
} else {
    let archivoFile = archivo.files[0];
    if (archivoFile.type !== "application/pdf") {
        cargarMensaje("El archivo del libro debe estar en formato PDF", archivo);
        estado = false;
    } else if (archivoFile.size > 50 * 1024 * 1024) { // 50 MB
        cargarMensaje("El archivo del libro no debe superar los 50MB", archivo);
        estado = false;
    }
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