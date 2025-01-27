<!-- Autor: Marco Antonio Salazar Mejia-->
<!DOCTYPE html>
<html lang="es">

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
    <link rel="stylesheet" href="<?php echo ESTILOS2; ?>">

    <!-- Favicon -->
    <!-- <link rel="icon" href="../Image/icon.png" type="image/png"> -->

    <!-- Titulo de pagiona -->
    <title>Intercambios de libros usados</title>
</head>

<body class="grid-container">
    <main class="main">
        <div class="articulo">
            <h3><?php echo $article["art_titulo"]; ?></h3>
            <h5>Dia de publicacion: <?php echo $article["art_fecha"]; ?></h5>
            <h7>Autor: <?php echo $article["art_autores"]; ?></h7>
            <p><?php echo $article["art_introduccion"]; ?></p>
            <img src="<?php echo $article["art_imagen"]; ?>" alt="Imagen de <?php echo $article["art_titulo"]; ?>">
            <p><?php echo $article["art_descripcion"]; ?></p>
            <p><?php echo $article["art_conclusion"]; ?></p>
            <p>Etiqueta: <?php echo $categoria["cat_nombre"]; ?></p>
            <p>Referencias: <?php echo $article["art_ref"]; ?></p>
        </div>
    </main>
    <?php
    if ($_SESSION['usuario_id'] == $article["art_usuarioId"]) { ?>
        <section class="section">
            <a class="Info button" href="index.php?c=articulo&f=view_edit&id= 
            <?php echo $article["art_id"]; ?> ">Editar</a>
            <a class="Comprar button" onclick="if (!confirm('Esta seguro de eliminar el articulo?')) return false;"
                href="index.php?c=articulo&f=delete&id= <?php echo $article["art_id"]; ?> ">Eliminar</a>
        </section>
    <?php } else if ($_SESSION['rol'] == 'admin') { ?>
            <section class="section">
                <a class="Comprar button" onclick="if (!confirm('Esta seguro de eliminar el articulo?')) return false;"
                    href="index.php?c=articulo&f=delete&id= <?php echo $article["art_id"]; ?> ">Eliminar</a>
            </section>
    <?php }
    ?>

</body>

<style>
    /* Titulo */
    .box-titulo {
        height: 320px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
        background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsz4iwe51QtmN1L7nrDy9mSksHuKCfDoNEeg&s);
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

    /* grtib */

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
        display: block;
        gap: 20px;
        margin-bottom: 50px;
        padding: 20px;
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

    /* bOTONES */
    .button,
    input {
        margin-top: 20px;
        padding: 10px 25px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        display: inline-block;
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


    /*  */
    .info h2 {
        margin: 0;
        margin-left: 15px;
        font-size: 2em;
        color: #333;
    }

    .info h3 {
        margin: 5px 0;
        font-size: 1.5em;
        color: #666;
        margin-left: 30px;
    }

    .info p {
        margin: 5px 0;
        color: #888;
        margin-left: 20px;
    }

    /* Contenedor de botones */
    .Botones {
        grid-column: 3/4;
        grid-row: 4/5;
        display: flex;
        gap: 10px;
        justify-content: center;
        padding: 10px 0;
        margin-top: auto;
    }

    /* Footer */
    .footer-content {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        padding: 40px 20px;
        color: #fff;
        background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsz4iwe51QtmN1L7nrDy9mSksHuKCfDoNEeg&s);
        background-position: center;
        box-sizing: border-box;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    .contenedor label {
        background-color: #D98B48;
        border-radius: 10px;
        color: white;
        box-sizing: border-box;
        padding: 5px;
        display: block;
    }

    .articulo {
        background-color: #fffe;
        width: 100%;
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .articulo>img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .articulo p {
        margin-bottom: 10px;
        line-height: 1.6;
        font-size: 1.1em;
    }

    .articulo a {
        padding: 8px 16px;
        border-radius: 4px;
        background: transparent;
        color: #007BFF;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .articulo button:hover {
        background: #0056b3;
    }
</style>