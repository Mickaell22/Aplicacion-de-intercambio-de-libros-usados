let estado = false;
let fechaintercambio = document.getElementById("fechaintercambio");
let fecharegistro = document.getElementById("fecharegistro");
let ubicacion = document.getElementById("ubicacion");
let calificacion = document.getElementById("calificacion");
let estadoSelect = document.getElementById("estado");
let metodo = document.getElementById("metodo");
let parrafo = document.getElementById("warnings");

let form = document.getElementById("formulario");
form.addEventListener("submit", e => {
    e.preventDefault();
    let warnings = "";
    parrafo.innerHTML = "";
    estado = false; // Reiniciar estado de validación

    if (fechaintercambio.value.trim() === "") {
        warnings += "La fecha de intercambio es obligatoria <br>";
        estado = true;
    }
    if (fecharegistro.value.trim() === "") {
        warnings += "La fecha de registro es obligatoria <br>";
        estado = true;
    }
    if (ubicacion.value.trim() === "") {
        warnings += "La ubicación de intercambio es obligatoria <br>";
        estado = true;
    }
    if (calificacion.value.trim() === "" || calificacion.value < 1 || calificacion.value > 10) {
        warnings += "La calificación debe ser un número entre 1 y 10 <br>";
        estado = true;
    }
    if (estadoSelect.value.trim() === "") {
        warnings += "Debe seleccionar un estado <br>";
        estado = true;
    }
    if (metodo.value.trim() === "") {
        warnings += "Debe seleccionar un método de entrega <br>";
        estado = true;
    }

    if (estado) {
        parrafo.innerHTML = warnings;
    } else {
        parrafo.innerHTML = "Actualizado correctamente";
        form.submit(); // Permitir el envío del formulario si no hay errores
    }
});
