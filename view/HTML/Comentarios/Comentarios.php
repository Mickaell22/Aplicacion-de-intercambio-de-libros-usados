<aside class="sidebar">
    <h2>Filtros de búsqueda</h2>
    <!-- Filtros -->
    <h3>Calificación</h3>
    <label for="5_Estrella" class="opcion">
        <input type="checkbox" name="area" id="5_Estrella" value="5_Estrella">
        5 Estrella
    </label>
    <label for="4_Estrella" class="opcion">
        <input type="checkbox" name="area" id="4_Estrella" value="4_Estrella">
        4 Estrella
    </label>
    <label for="3_Estrella" class="opcion">
        <input type="checkbox" name="area" id="3_Estrella" value="3_Estrella">
        3 Estrella
    </label>
    <label for="2_Estrella" class="opcion">
        <input type="checkbox" name="area" id="2_Estrella" value="2_Estrella">
        2 Estrella
    </label>
    <label for="1_Estrella" class="opcion">
        <input type="checkbox" name="area" id="1_Estrella" value="1_Estrella">
        1 Estrella
    </label>

    <h3>Fecha</h3>
    <label for="reciente" class="opcion">
        <input type="checkbox" name="area" id="reciente" value="reciente">
        Más recientes
    </label>
    <label for="antiguos" class="opcion">
        <input type="checkbox" name="area" id="antiguos" value="antiguos">
        Más antiguos
    </label>

    <h3>Idioma</h3>
    <label for="Español" class="opcion">
        <input type="checkbox" name="area" id="Español" value="Español">
        Español
    </label>
    <label for="Ingles" class="opcion">
        <input type="checkbox" name="area" id="Ingles" value="Ingles">
        Inglés
    </label>
    <label for="Frances" class="opcion">
        <input type="checkbox" name="area" id="Frances" value="Frances">
        Francés
    </label>
    <label for="Otro" class="opcion">
        <input type="checkbox" name="area" id="Otro" value="Otro">
        Otro
    </label>
</aside>

<main class="main">
    <section class="section">
        <div class="search">
            <h3>Buscar</h3>
            <input type="text" class="search-input" placeholder="Busca tus libros...">
            <button class="search-button">Buscar</button>
        </div>
    </section>

    <div class="comentario-form">
        <h3>Deja tu comentario</h3>
        <form id="formulario" method="POST" onsubmit="return validarFormulario()">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
            </div>

            <div class="form-group">
                <label for="libro">Libro</label>
                <select id="libro" name="libro">
                    <option value="">Selecciona un libro</option>
                    <option value="algebra">Álgebra</option>
                    <option value="calculo">Cálculo</option>
                </select>
            </div>

            <div class="form-group">
                <label>Calificación</label>
                <div class="star-rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                </div>
            </div>

            <div class="form-group">
                <label for="comentario">Tu comentario</label>
                <textarea id="comentario" name="comentario" placeholder="Escribe tu comentario aquí..."></textarea>
            </div>

            <button type="submit" class="submit-btn">Publicar comentario</button>
        </form>
    </div>

    <div class="comentarios-lista">
        <h3>Comentarios</h3>

        <div class="comentario-card">
            <div class="comentario-header">
                <div class="usuario-info">
                    <div class="usuario-avatar">AA</div>
                    <div>
                        <h4>Alejandro Alberto</h4>
                        <div class="calificacion">★★★★★</div>
                    </div>
                </div>
                <span class="comentario-fecha">17 Ene 2024</span>
            </div>
            <p class="comentario-texto">
                Me gustó el libro, refleja mi vida
            </p>
        </div>
    </div>
</main>


<style>
        .box-titulo {
            height: 320px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
            background-image: url(https://gabs.one/wp-content/uploads/2020/09/brainstorming-t.jpg);
            background-position: center;
            box-sizing: border-box;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        .box-titulo-opaco {
            height: 295px;
            width: 100%;
            background: radial-gradient(ellipse at 50% 30%, transparent 0%, rgba(0, 0, 0, 0.5) 50%, #000 100%);
        }

        .titulo {
            display: inline-block;
            border-bottom: 7px solid #D98B48;
            color: #FFFB;
            margin: 10% 0 45px;
            border-radius: 20px;
            width: auto;
            height: auto;
            font-size: 3em;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            /* sombra en la parte inferior */
            text-shadow: 0 0 5px #d94;
        }

        .grid-container>* {
            text-align: center;
            font-weight: 500;
        }

        .grid-container {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: repeat(6, auto);
        }

        .navbar {
            grid-column: 1/7;
            grid-row: 1/3;
            padding: 0;
            margin-bottom: 40px;
        }

        .header {
            grid-column: 1/7;
            grid-row: 1/2;
            background-color: rgb(217, 139, 72);
        }

        .sidebar {
            grid-column: 1/2;
            grid-row: 3/4;
            background-color: rgb(242, 242, 242);
            /* background-color: rgb(166, 87, 41); */
            margin-left: 20px;

            border-right: 7px solid #D98b48;
            border-top: 7px solid #D98b48;
            border-left: 3px solid #D98B48;

            border-radius: 8px;
            box-shadow: 0 20px 20px rgba(0, 0, 0)
        }

        .main {
            grid-template-rows: auto auto;
            grid-column: 2/7;
            grid-row: 3/5;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* 4 columnas iguales */
            gap: 20px;
            padding-top: 50px;
        }

        .pie {
            grid-column: 1/7;
            grid-row: 6/7;
            background-color: rgb(217, 139, 72);
        }

        .section {
            grid-column: 1/7;
            grid-row: 1/2;
            margin: 20px;

        }

        h2 {
            margin-top: 25px;
            font-size: 1em;
            border-top: 7px solid #A65729;
            border-radius: 25px;
            background-color: #f2d7b6;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            text-shadow: 0px 0px 15px #fffa;
        }

        h3 {
            margin-top: 10px;
            text-align: left;
            margin-left: 15px;
            border-left: 7px solid #000A;
            padding-left: 5px;
            margin-bottom: 20px;
        }

        .opcion {
            margin-top: 10px;
            margin-left: 40px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .comentario-form {
            grid-column: 2/4;
            grid-row: 2/5;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .comentarios-lista {
            grid-column: 2/4;
            grid-row: 6/7;
            margin-bottom: 30px;
        }

        .comentario-card {
            margin-top: 20px;
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .comentario-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .usuario-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .usuario-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #D98B48;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }


        .calificacion {
            color: #ffd700;
            font-size: 1.2em;
        }

        .comentario-fecha {
            color: #666;
            font-size: 0.9em;
        }

        .comentario-texto {
            color: #333;
            line-height: 1.6;
            text-align: left;
        }



        .form-group {
            margin-bottom: 15px;
            margin-right: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1em;

        }

        .form-group textarea {
            height: 120px;
            resize: vertical;
            min-height: 100px;
            max-height: 200px;
            /* form-sizing: content; */
        }

        .star-rating {
            display: flex;
            gap: 5px;
            color: #ddd;
            font-size: 1.5em;
        }

        .star-rating span {
            cursor: pointer;
        }

        .star-rating span:hover,
        .star-rating span.active {
            color: #ffd700;
        }

        .submit-btn {
            background-color: #D98B48;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background-color: #c17a37;
        }

        .search {
            grid-column: 1 / -1;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
            padding: 20px;
        }

        /* Estilos para el input de búsqueda */
        .search-input {
            width: 75%;
            padding: 12px 20px;
            border: 2px solid #ddda;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
        }

        .search-input:focus {
            border-color: #2196F3;
            box-shadow: 0 0 8px rgba(33, 150, 243, 0.2);
        }

        /* Estilos para el botón de búsqueda */
        .search-button {
            padding: 12px 25px;
            background-color: #2196F3;
            color: #fffe;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .search-button:hover {
            background-color: #1976D2;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 20px 20px;
            color: #fff;
            background: url(https://gabs.one/wp-content/uploads/2020/09/brainstorming-t.jpg);
            background-position: bottom;
            box-sizing: border-box;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        .error {
            color: red;
            display: block;
        }
    </style>