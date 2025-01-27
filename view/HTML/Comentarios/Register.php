<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Autor -->
    <meta name="author" content="Aguilar Quinto Alejandro Alberto">

    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo 5">
    <meta name="keywords" content="Libro, intercambio, busqueda, filtrado, foro, inicio, libros, chat, charla">

    <!-- Open Graph -->
    <meta name="OG::title" content="Proyecto">

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/estilos-comunes-2.css">

    <!-- Favicon -->
    <!-- <link rel="icon" href="../Image/icon.png" type="image/png"> -->

    <!-- JavaScipt -->


    <!-- Titulo de Pagina -->
    <title>Intercambios de libros usados</title>




</head>

<main class="main">
    <div class="frase">
        <h3 class="frase-principal">¡Únete a nuestra comunidad de lectores!</h3>
        <p class="frase-secundaria">Registrarse es gratis. Comienza a compartir y descubrir libros hoy mismo.</p>
        <img src="" alt="Imagen de registro">
    </div>

    <div class="form-container">
        <form class="form-upload" id="formulario" method="POST" action="index.php?c=register&f=registrar">
            <h2 class="form-titulo">Registro de Usuario</h2>

            <div class="form-input">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-input">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>

            <div class="form-input">
                <label for="nombre_usuario">Nombre de Usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            </div>

            <div class="form-input">
                <label for="numero_celular">Número de Celular</label>
                <input type="tel" id="numero_celular" name="numero_celular">
            </div>

            <div class="form-input">
                <label for="pais">País</label>
                <input type="text" id="pais" name="pais" required>
            </div>

            <div class="form-input">
                <label for="ubicacion">Ubicación</label>
                <input type="text" id="ubicacion" name="ubicacion" required>
            </div>

            <div class="form-input">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="form-input">
                <label for="genero">Género</label>
                <select id="genero" name="genero" required>
                    <option value="">Seleccione un género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div class="form-input">
                <label for="correo_electronico">Correo Electrónico</label>
                <input type="email" id="correo_electronico" name="correo_electronico" required>
            </div>

            <div class="form-input">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>

            <div class="form-input">
                <label for="confirmar_contrasena">Confirmar Contraseña</label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Registrarse</button>
                <p class="login-link">¿Ya tienes una cuenta? <a href="index.php">Iniciar Sesión</a></p>
            </div>
        </form>
    </div>
</main>

<script src="assets/JavaScript/Validaciones_Register.js"></script>

</html>

<style>
    .box-titulo {
        height: 320px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
        background-image: url(https://img.freepik.com/fotos-premium/grupo-personas-estan-sonriendo-formando-circulo-escena-es-feliz-amistosa_1053268-24758.jpg);
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
    }

    .header {
        grid-column: 1/7;
        grid-row: 1/2;
        background-color: rgb(217, 139, 72);
    }

    .sidebar {
        grid-column: 1/2;
        grid-row: 3/7;
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
        grid-column: 1/7;
        grid-row: 3/5;
        background-color: rgb(242, 242, 242);
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* 4 columnas iguales */
        gap: 20px;
        padding-top: 30px;
    }

    .pie {
        grid-column: 1/7;
        grid-row: 6/7;
        background-color: rgb(217, 139, 72);
    }

    .section {
        grid-column: 1/7;
        grid-row: 5/6;
    }

    .frase {
        grid-column: 1/3;
        grid-row: 3/5;
        margin-left: 70px;
        padding: 30px;
        background: linear-gradient(#f5f7fa 0%, #c3cfe2 100%);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        max-width: 600px;
    }

    .frase-principal {
        font-size: 3rem;
        color: #2c3e50;
        margin-bottom: 20px;
        font-weight: bold;
        line-height: 1.2;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .frase-secundaria {
        font-size: 1.5rem;
        color: #546e7a;
        line-height: 1.6;
        margin: 0;
        font-weight: 400;
    }

    .frase img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        margin-top: 20px;
    }


    /* form registrar */
    .form-container {
        grid-column: 3/7;
        grid-row: 3/6;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        text-align: left;
    }

    .form-register {
        border: 2px solid #333333;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 15px 10px rgba(0, 0, 0, 0.7);
    }

    .form-titulo {
        text-align: center;
        color: #333333;
        margin-bottom: 20px;
    }

    .form-input {
        margin-bottom: 20px;
    }

    .form-input label {
        display: block;
        margin-bottom: 5px;
        color: #333333;

    }

    .form-input input,
    .form-input select {
        width: 90%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .radio-group {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .radio-group input[type="radio"] {
        width: auto;
    }

    .radio-group label {
        display: inline;
        margin: 0;
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-submit:hover {
        background-color: #45a049;
    }


    /* UN PIE!!! */
    .footer-content {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        padding: 20px 20px;
        color: #fff;
        background: url(https://img.freepik.com/fotos-premium/grupo-personas-estan-sonriendo-formando-circulo-escena-es-feliz-amistosa_1053268-24758.jpg);
        background-position: bottom;
        box-sizing: border-box;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }


    .error-border {
        border: 5px solid red;
    }

    .form-mensajes ul {
        list-style-type: none;
        padding: 0;
    }

    .form-mensajes ul li {
        margin: 5px 0;
    }

    .error {
        color: red;
        display: block;
    }
</style>