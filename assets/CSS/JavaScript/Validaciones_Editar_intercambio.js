//Autor: Troya Garzón Geancarlos
function validarFormulario() {
    let esValido = true;
    
    document.querySelectorAll('.error-message').forEach(function (msg) {
        msg.style.display = 'none';
    });


    const fechaintercambio = document.getElementById('fechaintercambio').value;
    if (!fechaintercambio) {
        document.getElementById('fechaintercambio-error').innerText = 'La fecha de intercambio es obligatoria';
        document.getElementById('fechaintercambio-error').style.display = 'block';
        esValido = false;
    }

    const fecharegistro = document.getElementById('fecharegistro').value;
    if (!fecharegistro) {
        document.getElementById('fecharegistro-error').innerText = 'La fecha de registro es obligatoria';
        document.getElementById('fecharegistro-error').style.display = 'block';
        esValido = false;
    }

    const ubicacion = document.getElementById('ubicacion').value;
    if (!ubicacion) {
        document.getElementById('ubicacion-error').innerText = 'La ubicación es obligatoria';
        document.getElementById('ubicacion-error').style.display = 'block';
        esValido = false;
    }

    const calificacion = document.getElementById('calificacion').value;
    if (calificacion < 1 || calificacion > 10) {
        document.getElementById('calificacion-error').innerText = 'La calificación debe estar entre 1 y 10';
        document.getElementById('calificacion-error').style.display = 'block';
        esValido = false;
    }

    const estado = document.getElementById('estado').value;
    if (!estado) {
        document.getElementById('estado-error').innerText = 'Debe seleccionar un estado';
        document.getElementById('estado-error').style.display = 'block';
        esValido = false;
    }

    const metodo = document.getElementById('metodo').value;
    if (!metodo) {
        document.getElementById('metodo-error').innerText = 'Debe seleccionar un método de entrega';
        document.getElementById('metodo-error').style.display = 'block';
        esValido = false;
    }

    return esValido;
}