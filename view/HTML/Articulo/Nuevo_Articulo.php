<!-- Autor: Marco Antonio Salazar Mejia-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Autor -->
    <meta name="author" content=" Marco Antonio Salazar Mejia">

    <!-- Metadatos -->
    <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo 5">
    <meta name="keywords" content="categorias, busqueda, filtrado">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph -->
    <meta name="OG:title" content="Proyecto">

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/estilos-comunes-2.css">

    <!-- Favicon -->
    <link rel="icon" href="../Image/icon.png" type="image/png">

    <!-- Titulo de pagiona -->
    <title>Intercambios de libros usados</title>
</head>

<body class="grid-container">
    <div class="form-container">
        <form class="form-upload" id="formulario" method="POST" action="index.php?c=articulo&f=save"
            enctype="multipart/form-data">
            <h2 class="form-titulo">Nuevo Articulo</h2>

            <!-- Título del libro -->
            <div class="form-input">
                <label for="titulo">Título del articulo</label>
                <input type="text" id="titulo" name="titulo">
            </div>

            <!-- Introduccion -->
            <div class="form-input">
                <label for="introduccion">Introduccion</label>
                <textarea id="introduccion" name="introduccion" rows="4"></textarea>
            </div>

            <!-- Cuerpo -->
            <div class="form-input">
                <label for="descripcion">Desarrollo</label>
                <textarea id="descripcion" name="descripcion" rows="4"></textarea>
            </div>

            <!-- Conclusion -->
            <div class="form-input">
                <label for="conclusion">Conclusion</label>
                <textarea id="conclusion" name="conclusion" rows="4"></textarea>
            </div>

            <div class="form-input">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" class="form-control">
                    <?php
                    foreach ($categorias as $cat) { ?>
                        <option value=" <?php echo $cat['cat_id'] ?> ">
                            <?php echo $cat['cat_nombre'] ?>
                        </option>
                    <?php }
                    ?>
                </select>
            </div>

            <!-- Portada del libro -->
            <div class="form-input">
                <label for="portada">Portada de su articulo</label>
                <input type="file" id="portada" name="portada" accept="image/*">
                <small class="file-info">Formatos aceptados: JPG, PNG. Máximo 5MB</small>
            </div>

            <!-- Autores -->
            <div class="form-input">
                <label for="autor">Autor/es:</label>
                <input type="text" id="autores" name="autores">
            </div>

            <!-- Referencias -->
            <div class="form-input">
                <label for="referencias">Referencias:</label>
                <input type="text" id="referencias" name="referencias">
            </div>

            <!-- Botón de envío -->
            <div class="form-input">
                <button type="submit" class="Info button">Publicar articulo</button>
                <button class="Comprar button" type="button"
                    onclick="window.location.href='index.php?c=articulo&f=index'">Cancelar</button>
            </div>
            <p class="warnings" id="warnings"></p>

        </form>
        <script src="assets/CSS/JavaScript/Validaciones_NuevosArticulos.js"></script>
    </div>
</body>

<style>
    .button {
        margin-top: 20px;
        padding: 10px 25px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
    }

    .box-titulo {
        height: 320px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
        background-image: url(https://png.pngtree.com/background/20230519/original/pngtree-stack-of-old-books-sitting-on-a-table-picture-image_2662639.jpg);
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

    .main {
        grid-template-rows: auto auto;
        grid-column: 1/7;
        grid-row: 3/5;
        background-color: rgb(242, 242, 242);
        display: flex;
        gap: 20px;
        padding-top: 50px;
    }

    .pie {
        grid-column: 1/7;
        grid-row: 6/7;
        background-color: rgb(217, 139, 72);
    }


    .frase {
        grid-column: 1/4;
        grid-row: 1/5;
        margin-left: 100px;
        padding: 40px;
        background: linear-gradient(#f5f7fa 0%, #a3dfb2 100%);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        width: 500px;
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
        /* También más grande */
        color: #546e7a;
        line-height: 1.6;
        margin: 0;
        font-weight: 400;
    }

    .frase img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        margin-top: 20px;
    }


    /* Registra tu librop :) ... Tengo hambre :( */
    .form-container {
        grid-column: 1/8;
        grid-row: 3/5;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        text-align: left;
    }

    .form-upload {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .form-titulo {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 2em;
    }

    .form-input {
        margin-bottom: 20px;
        width: 90%;
    }

    .form-input label {
        display: block;
        margin-bottom: 8px;
        color: #34495e;
        font-weight: 500;
    }

    .form-input input,
    .form-input select,
    .form-input textarea {
        width: 100%;
        /* Mantén esto para asegurar que los inputs ocupen todo el espacio disponible */
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .form-input textarea {
        resize: vertical;
        min-height: 150px;
        /* Aumenté la altura mínima */
    }

    .form-input input:focus,
    .form-input select:focus,
    .form-input textarea:focus {
        border-color: #3498db;
        outline: none;
    }

    .file-info {
        display: block;
        margin-top: 5px;
        color: #7f8c8d;
        font-size: 0.9em;
    }

    input[type="file"] {
        border: 1px dashed #3498db;
        padding: 20px;
        background-color: #f7f9fc;
        cursor: pointer;
    }

    .btn-submit {
        width: 100%;
        padding: 15px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #2980b9;
    }


    .footer-content {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        padding: 20px 20px;
        color: #fff;
        background: url(https://png.pngtree.com/background/20230519/original/pngtree-stack-of-old-books-sitting-on-a-table-picture-image_2662639.jpg);
        background-position: bottom;
        box-sizing: border-box;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    .warnings {
        color: red;
        display: block;
    }

    textarea {
        min-height: 100px;
        max-height: 200px;
    }

    .admin-actions {
        margin-top: 20px;
        padding: 15px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .admin-button {
        display: inline-block;
        padding: 12px 25px;
        background: linear-gradient(#FF4081, #FF9800);
        color: white;
        text-decoration: none;
        border-radius: 25px;
        font-weight: bold;
        cursor: pointer;
    }

    .Info.button {
        background: linear-gradient(#2196F3, #4CAF50);
        color: #fffe;
    }

    .Comprar.button {
        background: linear-gradient(#FF4081, #FF9800);
        color: white;
    }

    .button:hover {
        font-weight: bold;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
    }
</style>