function validarFormulario() {
  eliminarMensaje();
  let estado = true;

  // Validar nombre
  let nombre = document.getElementById("nombre");
  let nombreRegex = /^[a-zA-Z]+$/;
  if (nombre.value === "") {
    cargarMensaje("El nombre esta vacio", nombre);
    estado = false;
  } else if (nombre.value.length < 3) {
    cargarMensaje("El nombre es corto", nombre);
    estado = false;
  } else if (!nombreRegex.test(nombre.value)) {
    cargarMensaje("El nombre es solo letras", nombre);
    estado = false;
  }

  // Validar apellido
  let apellido = document.getElementById("apellido");
  if (nombre.value === "") {
    cargarMensaje("El apellido esta vacio", apellido);
    estado = false;
  } else if (apellido.value.length < 3) {
    cargarMensaje("El apellido es corto", apellido);
    estado = false;
  } else if (!nombreRegex.test(apellido.value)) {
    cargarMensaje("El apellido es solo letras", apellido);
    estado = false;
  }

  // Validar nombre de usuario
  let usser = document.getElementById("usuario");
  if (usser.value === "") {
    cargarMensaje("El nombre de usuario esta vacio", usser);
    estado = false;
  } else if (usser.value.length < 3) {
    cargarMensaje("El nombre de usuario es corto", usser);
    estado = false;
  }

  // Validar numero de celular
  let celular = document.getElementById("celular");
  let celularRegex = /^[0-9]{10}$/;

  if (celular.value === "") {
    cargarMensaje("El número de celular está vacío", celular);
    estado = false;
  } else if (!celularRegex.test(celular.value)) {
    cargarMensaje(
      "El número de celular debe tener exactamente 10 dígitos y solo números",
      celular
    );
    estado = false;
  }

  // Validar país
  let ubicacion = document.getElementById("ubicacion");

  if (ubicacion.value === "") {
    cargarMensaje("Debe seleccionar un país", ubicacion);
    estado = false;
  }

  // Validar fecha de nacimiento
  let fechaNacimiento = document.getElementById("fecha_nac");
  if (fechaNacimiento.value === "") {
    cargarMensaje("La fecha de nacimiento es requerida", fechaNacimiento);
    estado = false;
  } else {
    let fechaIngresada = new Date(fechaNacimiento.value);
    let hoy = new Date();

    // Calcular edad
    let edad = hoy.getFullYear() - fechaIngresada.getFullYear();

    if (edad < 18) {
      cargarMensaje("Debe ser mayor de 18 años", fechaNacimiento);
      estado = false;
    }
  }

  // Validar genero
  let genero = document.querySelector('input[name="genero"]:checked');
  if (!genero) {
    cargarMensaje(
      "Debe seleccionar un género",
      document.querySelector(".radio-group")
    );
    estado = false;
  }

  // Validar correo?
  let correo = document.getElementById("correo");
  let correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (correo.value === "") {
    cargarMensaje("El correo electrónico es obligatorio", correo);
    estado = false;
  } else if (!correoRegex.test(correo.value)) {
    cargarMensaje("El formato del correo electrónico es inválido", correo);
    estado = false;
  }

  // Validar contraseña
  let contrasenia = document.getElementById("contrasenia");
  if (contrasenia.value === "") {
    cargarMensaje("La contraseña es obligatoria", contrasenia);
    estado = false;
  } else if (contrasenia.value.length < 6) {
    cargarMensaje(
      "La contraseña debe tener al menos 6 caracteres",
      contrasenia
    );
    estado = false;
  }

  // Validar confirmar contraseña
  let confirmarContrasenia = document.getElementById("confirmar_contrasenia");
  if (confirmarContrasenia.value === "") {
    cargarMensaje("Debe confirmar su contraseña", confirmarContrasenia);
    estado = false;
  } else if (confirmarContrasenia.value !== contrasenia.value) {
    cargarMensaje("Las contraseñas no coinciden", confirmarContrasenia);
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
