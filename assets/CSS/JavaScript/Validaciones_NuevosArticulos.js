//Autor: Marco Antonio Salazar Mejia
let estado = false;
let titulo = document.getElementById("titulo");
let introduccion = document.getElementById("introduccion");
let descripcion = document.getElementById("descripcion");
let conclusion = document.getElementById("conclusion");
let categoria = document.getElementById("categoria");
let autores = document.getElementById("autores");
let referencias = document.getElementById("referencias");
let portada = document.getElementById("portada");
let parrafo = document.getElementById("warnings");

let form = document.getElementById("formulario");
form.addEventListener("submit", (e) => {
  e.preventDefault();
  let warnings = "";
  parrafo.innerHTML = "";
  estado = false; // Reiniciar estado de validación

  if (titulo.value.trim() === "") {
    warnings += "El título del artículo es obligatorio <br>";
    estado = true;
  }
  if (introduccion.value.trim() === "") {
    warnings += "La introducción es obligatoria <br>";
    estado = true;
  }
  if (descripcion.value.trim() === "") {
    warnings += "El desarrollo es obligatorio <br>";
    estado = true;
  }
  if (conclusion.value.trim() === "") {
    warnings += "La conclusión es obligatoria <br>";
    estado = true;
  }
  if (categoria.value.trim() === "") {
    warnings += "Debe seleccionar una categoría <br>";
    estado = true;
  }
  if (autores.value.trim() === "") {
    warnings += "Debe ingresar al menos un autor <br>";
    estado = true;
  }
  if (referencias.value.trim() === "") {
    warnings += "Debe ingresar al menos una referencia <br>";
    estado = true;
  }

  // Validar que el usuario suba una nueva imagen
  if (portada.files.length === 0) {
    warnings += "Debe ingresar una imagen <br>";
    estado = true;
  } else {
    // Validar la imagen subida
    let archivo = portada.files[0];
    let formatosPermitidos = ["image/jpeg", "image/png"];
    let tamañoMaximo = 5 * 1024 * 1024; // 5MB

    if (!formatosPermitidos.includes(archivo.type)) {
      warnings += "Solo se permiten imágenes en formato JPG o PNG <br>";
      estado = true;
    } else if (archivo.size > tamañoMaximo) {
      warnings += "El tamaño máximo permitido es de 5MB <br>";
      estado = true;
    }
  }

  if (estado) {
    parrafo.innerHTML = warnings;
  } else {
    parrafo.innerHTML = "Actualizado correctamente";
    form.submit(); // Permitir el envío del formulario si no hay errores
  }
});
