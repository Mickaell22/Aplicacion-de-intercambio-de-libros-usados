// Definir los datos de los libros con sus propiedades
const libros = [
    // Libros Académicos
    {
        id: 1,
        titulo: "Fundamentos de programacion",
        area: "Tecnologia",
        categoria: "Academicos",
        condicion: "Usado",
        idioma: "Español",
        imagen: "../Image/portadas/academicos/alg.jpg"
    },
    {
        id: 2,
        titulo: "Arquitectura moderna",
        area: "Tecnologia",
        categoria: "Academicos",
        condicion: "Nuevo",
        idioma: "Español",
        imagen: "../Image/portadas/academicos/arq.jpg"
    },
    {
        id: 3,
        titulo: "Lenguaje de programación C",
        area: "Tecnologia",
        categoria: "Academicos",
        condicion: "Usado",
        idioma: "Español",
        imagen: "../Image/portadas/academicos/c.jpg"
    },
    {
        id: 4,
        titulo: "Las vidas dentro de tu cabeza",
        area: "Ciencias",
        categoria: "Academicos",
        condicion: "Nuevo",
        idioma: "Español",
        imagen: "../Image/portadas/academicos/cabeza.jpg"
    },
    {
        id: 5,
        titulo: "Apuntes de dibujo técnico II",
        area: "Tecnologia",
        categoria: "Academicos",
        condicion: "Usado",
        idioma: "Español",
        imagen: "../Image/portadas/academicos/dibujo.jpg"
    },
    {
        id: 6,
        titulo: "Cuaderno de historia",
        area: "Historia",
        categoria: "Academicos",
        condicion: "Usado",
        idioma: "Español",
        imagen: "../Image/portadas/academicos/historia.jpg"
    },
    {
        id: 7,
        titulo: "Fundamentos de programación",
        area: "Tecnologia",
        categoria: "Academicos",
        condicion: "Nuevo",
        idioma: "Español",
        imagen: "../Image/portadas/academicos/prog.jpg"
    },

    // Libros de Amor
    {
        id: 8,
        titulo: "Como si fuera ayer",
        area: "Literatura",
        categoria: "Amor",
        condicion: "Nuevo",
        idioma: "Español",
        imagen: "../Image/portadas/Amor/Como_Si_Fuera_Ayer.png"
    },
    {
        id: 9,
        titulo: "Cuando te conocí",
        area: "Literatura",
        categoria: "Amor",
        condicion: "Usado",
        idioma: "Español",
        imagen: "../Image/portadas/Amor/Cuando_Te_Conoci.png"
    },
    {
        id: 10,
        titulo: "El beso que no te di",
        area: "Literatura",
        categoria: "Amor",
        condicion: "Nuevo",
        idioma: "Español",
        imagen: "../Image/portadas/Amor/EL_Beso_q_No_TeDi.png"
    },
    {
        id: 11,
        titulo: "El mejor día de mi vida",
        area: "Literatura",
        categoria: "Amor",
        condicion: "Usado",
        idioma: "Español",
        imagen: "../Image/portadas/Amor/El_Mejor_Dia_De_Mi_Vida.png"
    },
    {
        id: 12,
        titulo: "Puñales al corazón",
        area: "Literatura",
        categoria: "Amor",
        condicion: "Nuevo",
        idioma: "Español",
        imagen: "../Image/portadas/Amor/Punales_Al_Corazon.png"
    },

    // Despues eliminar todito esto 💀 y solos irve de presentacion

    // Libros de Aventura
    {
        id: 13,
        titulo: "El faro del fin del mundo",
        area: "Literatura",
        categoria: "Aventura",
        condicion: "Usado",
        idioma: "Español",
        imagen: "../Image/portadas/aventura/faro.jpg"
    },
    {
        id: 14,
        titulo: "Veinte mil leguas de viaje submarino",
        area: "Literatura",
        categoria: "Aventura",
        condicion: "Nuevo",
        idioma: "Español",
        imagen: "../Image/portadas/aventura/leguas.jpg"
    },
    {
        id: 15,
        titulo: "De la tierra a la luna",
        area: "Literatura",
        categoria: "Aventura",
        condicion: "Usado",
        idioma: "Español",
        imagen: "../Image/portadas/aventura/luna.jpg"
    },
    {
        id: 16,
        titulo: "Moby Dick",
        area: "Literatura",
        categoria: "Aventura",
        condicion: "Nuevo",
        idioma: "Español",
        imagen: "../Image/portadas/aventura/moby.jpg"
    },

];

// Función para filtrar los libros
function filtrarLibros() {
    // Obtener todos los filtros seleccionados
    const filtrosSeleccionados = {
        area: Array.from(document.querySelectorAll('input[name="area"]:checked')).map(cb => cb.value),
        categoria: Array.from(document.querySelectorAll('input[name="categoria"]:checked')).map(cb => cb.value),
        condicion: Array.from(document.querySelectorAll('input[name="condicion"]:checked')).map(cb => cb.value),
        idioma: Array.from(document.querySelectorAll('input[name="idioma"]:checked')).map(cb => cb.value)
    };

    // Filtrar los libros
    const librosFiltrados = libros.filter(libro => {
        const cumpleArea = filtrosSeleccionados.area.length === 0 || filtrosSeleccionados.area.includes(libro.area);
        const cumpleCategoria = filtrosSeleccionados.categoria.length === 0 || filtrosSeleccionados.categoria.includes(libro.categoria);
        const cumpleCondicion = filtrosSeleccionados.condicion.length === 0 || filtrosSeleccionados.condicion.includes(libro.condicion);
        const cumpleIdioma = filtrosSeleccionados.idioma.length === 0 || filtrosSeleccionados.idioma.includes(libro.idioma);

        return cumpleArea && cumpleCategoria && cumpleCondicion && cumpleIdioma;
    });

    mostrarLibros(librosFiltrados);
}

// Función para mostrar los libros filtrados
function mostrarLibros(librosFiltrados) {
    const mainContainer = document.querySelector('.main');
    // Mantener el div de búsqueda
    const searchDiv = document.querySelector('.search');
    
    // Limpiar los libros actuales
    mainContainer.innerHTML = '';
    mainContainer.appendChild(searchDiv);

    librosFiltrados.forEach(libro => {
        const elemento = document.createElement('div');
        elemento.className = 'elemento';
        elemento.innerHTML = `
            <a href="Libro_info.html">
                <img src="${libro.imagen}" alt="${libro.titulo}">
            </a>
            <h3>${libro.titulo}</h3>
            <input type="button" class="Info button" value="Información">
            <input type="button" class="Comprar button" value="Pedir">
        `;
        mainContainer.appendChild(elemento);
    });
}

// Agregar event listeners a todos los checkboxes
document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', filtrarLibros);
});

const searchInput = document.querySelector('.search-input');
const searchButton = document.querySelector('.search-button');

function buscarLibros() {
    const terminoBusqueda = searchInput.value.toLowerCase();
    const librosFiltrados = libros.filter(libro => 
        libro.titulo.toLowerCase().includes(terminoBusqueda)
    );
    mostrarLibros(librosFiltrados);
}

searchButton.addEventListener('click', buscarLibros);
searchInput.addEventListener('keyup', (e) => {
    if (e.key === 'Enter') {
        buscarLibros();
    }
});