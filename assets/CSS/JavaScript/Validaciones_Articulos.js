function validarFormulario() {
    eliminarMensaje();
    let estado = true;

    // Validar título del artículo
    let titulo = document.getElementById("titulo");
    if (titulo.value.trim() === "") {
        cargarMensaje("El título del artículo es obligatorio", titulo);
        estado = false;
    }

    // Validar introducción
    let introduccion = document.getElementById("introduccion");
    if (introduccion.value.trim() === "") {
        cargarMensaje("La introducción es obligatoria", introduccion);
        estado = false;
    }

    // Validar desarrollo
    let descripcion = document.getElementById("descripcion");
    if (descripcion.value.trim() === "") {
        cargarMensaje("El desarrollo es obligatorio", descripcion);
        estado = false;
    }

    // Validar conclusión
    let conclusion = document.getElementById("conclusion");
    if (conclusion.value.trim() === "") {
        cargarMensaje("La conclusión es obligatoria", conclusion);
        estado = false;
    }

    // Validar categoría seleccionada
    let categoria = document.getElementById("categoria");
    if (categoria.value.trim() === "") {
        cargarMensaje("Debe seleccionar una categoría", categoria);
        estado = false;
    }

    // Validar autor/es
    let autores = document.getElementById("autores");
    if (autores.value.trim() === "") {
        cargarMensaje("Debe ingresar al menos un autor", autores);
        estado = false;
    }

    // Validar referencias
    let referencias = document.getElementById("referencias");
    if (referencias.value.trim() === "") {
        cargarMensaje("Debe ingresar al menos una referencia", referencias);
        estado = false;
    }

    // Validar el tamaño y formato de la imagen (si se sube una nueva)
    let portada = document.getElementById("portada");
    if (portada.files.length > 0) {
        let archivo = portada.files[0];
        let formatosPermitidos = ["image/jpeg", "image/png"];
        let tamañoMaximo = 5 * 1024 * 1024; // 5MB

        if (!formatosPermitidos.includes(archivo.type)) {
            cargarMensaje("Solo se permiten imágenes en formato JPG o PNG", portada);
            estado = false;
        } else if (archivo.size > tamañoMaximo) {
            cargarMensaje("El tamaño máximo permitido es de 5MB", portada);
            estado = false;
        }
    }

    document.getElementById("formulario").onsubmit = function () {
        if (!confirm('¿Está seguro de modificar el artículo?')) {
            return false;
        }
        return validarFormulario();
    };

    return estado;
}

function cargarMensaje(mensaje, elemento) {
    let error = document.createElement("span");
    error.classList.add("error");
    error.textContent = mensaje;
    elemento.parentNode.appendChild(error);
}

function eliminarMensaje() {
    let errores = document.querySelectorAll(".error");
    errores.forEach(error => error.remove());
}
