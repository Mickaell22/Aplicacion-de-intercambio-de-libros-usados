//Autor: Troya Garzón Geancarlos

function validarFormulario() {
    let esValido = true;
    
    
    document.querySelectorAll('.error-message').forEach(function (msg) {
        msg.style.display = 'none';
    });

    
    const fechaintercambio = document.getElementById('fechaintercambio').value;
    if (!fechaintercambio) {
        mostrarError('fechaintercambio', 'La fecha de intercambio es obligatoria');
        esValido = false;
    } else {
        
        const fecharegistro = document.getElementById('fecharegistro').value;
        if (fechaintercambio < fecharegistro) {
            mostrarError('fechaintercambio', 'La fecha de intercambio no puede ser anterior a la fecha de registro');
            esValido = false;
        }
    }

    
    const fecharegistro = document.getElementById('fecharegistro').value;
    if (!fecharegistro) {
        mostrarError('fecharegistro', 'La fecha de registro es obligatoria');
        esValido = false;
    }

    
    const ubicacion = document.getElementById('ubicacion').value;
    if (!ubicacion) {
        mostrarError('ubicacion', 'La ubicación es obligatoria');
        esValido = false;
    }

    
    const calificacion = document.getElementById('calificacion').value;
    if (calificacion < 1 || calificacion > 10) {
        mostrarError('calificacion', 'La calificación debe estar entre 1 y 10');
        esValido = false;
    }

    
    const estado = document.getElementById('estado').value;
    if (!estado) {
        mostrarError('estado', 'Debe seleccionar un estado');
        esValido = false;
    }

    
    const metodo = document.getElementById('metodo').value;
    if (!metodo) {
        mostrarError('metodo', 'Debe seleccionar un método de entrega');
        esValido = false;
    }

    return esValido;
}


function mostrarError(campo, mensaje) {
    const errorElement = document.getElementById(`${campo}-error`);
    if (errorElement) {
        errorElement.innerText = mensaje;
        errorElement.style.display = 'block';
    }
}