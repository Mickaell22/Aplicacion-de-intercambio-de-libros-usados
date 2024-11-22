function validarFormulario() {
    let estado = true; 
    eliminarMensaje();

    // Validar el campo "Nombre"
    let nombre = document.getElementById("nombre");
    if (nombre.value.trim() === "") {
        cargarMensaje("El nombre es obligatorio.", nombre);
        estado = false;
    } else if (nombre.value.length < 3) {
        cargarMensaje("El nombre debe tener al menos 3 caracteres.", nombre);
        estado = false;
    }

    // Validar el campo "Libro"
    let libro = document.getElementById("libro");
    if (libro.value === "") {
        cargarMensaje("Debe seleccionar un libro.", libro);
        estado = false;
    }

    // Validar el campo "Comentario"
    let comentario = document.getElementById("comentario");
    if (comentario.value.trim() === "") {
        cargarMensaje("El comentario no puede estar vacío.", comentario);
        estado = false;
    } else if (comentario.value.length < 10) {
        cargarMensaje("El comentario debe tener al menos 10 caracteres.", comentario);
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
  


