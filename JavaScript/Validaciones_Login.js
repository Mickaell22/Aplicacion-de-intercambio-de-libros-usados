// ??? supongo que por ahora poner una validacion de vacio para despues hacerlas con php?
// por ahora unicamente comprobar si es vacio o algo asi supongo

function validarFormulario() {
    let estado = true;
  
    // Obtener los campos
    const email = document.getElementById("email");
    const password = document.getElementById("password");
  
    // Validar email
  if (email.value.trim() === "") {
    cargarMensaje("El campo de email no puede estar vacío.", email);
    estado = false;
}
    // Validar si existe el correo

  // Validar contraseña
  if (password.value.trim() === "") {
    cargarMensaje("El campo de contraseña no puede estar vacío.", password);
    estado = false;
  }
    // Validar si el correo es igual al de la contraseña se dera poner una encryptacion? .-. espero que no sea tantno

    // php ...
  
    return estado;
  }



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