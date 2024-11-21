function validarFormulario() {
    eliminarMensaje();
    let estado = true;
  
    // Validar tipo de denuncia
    let tipo = document.getElementById("tipo");
    if (tipo.value === "") {
      cargarMensaje("Debe seleccionar un tipo de denuncia", tipo);
      estado = false;
    }
  
    // Validar descripción
    let descripcion = document.getElementById("descripcion");
    if (descripcion.value.trim() === "") {
      cargarMensaje("La descripción es obligatoria", descripcion);
      estado = false;
    } else if (descripcion.value.trim().length < 10) {
      cargarMensaje("La descripción debe tener al menos 10 caracteres", descripcion);
      estado = false;
    }
  
    // Validar evidencia
    let evidencia = document.getElementById("evidencia").files[0];
    if (evidencia) {
        // ¿? SI es opcional que puedo poner?
    }
  
    // Validar fecha del incidente
    let fecha = document.getElementById("fecha");
    if (fecha.value === "") {
      cargarMensaje("Debe seleccionar una fecha del incidente", fecha);
      estado = false;
    } else {
      let fechaIncidente = new Date(fecha.value);
      let hoy = new Date();
      if (fechaIncidente > hoy) {
        cargarMensaje("La fecha del incidente no puede ser otro dia que no sea pasado de hoy", fecha);
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