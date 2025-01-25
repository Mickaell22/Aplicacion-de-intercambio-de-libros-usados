let estado = false;
let nombre = document.getElementById("nombre");
let descripcion = document.getElementById("descripcion");
let parrafo = document.getElementById("warnings");
let form = document.getElementById("form");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let warnings = "";
    parrafo.innerHTML = "";
    estado = false;

    // Obtener valores y eliminar espacios en blanco
    let nombreValor = nombre.value.trim();
    let descripcionValor = descripcion.value.trim();

    // Validación del nombre de la categoría
    if (nombreValor === "") {
        warnings += "El nombre de la categoría es obligatorio. <br>";
        estado = true;
    }
    if (nombreValor.length < 3) {
        warnings += "El nombre de la categoría debe tener al menos 3 caracteres. <br>";
        estado = true;
    }

    // Validación de la descripción de la categoría
    if (descripcionValor === "") {
        warnings += "La descripción de la categoría es obligatoria. <br>";
        estado = true;
    } 
    if (descripcionValor.length < 10) {
        warnings += "La descripción debe tener al menos 10 caracteres. <br>";
        estado = true;
    }

    if (estado) {
        parrafo.innerHTML = warnings;
    } else {
        parrafo.innerHTML = "El proceso se realizó correctamente";
        form.submit(); // Permitir el envío del formulario si no hay errores
    }
});