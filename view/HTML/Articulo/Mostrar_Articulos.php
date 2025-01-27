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
    <!-- <link rel="icon" href="../Image/icon.png" type="image/png"> -->

    <!-- Titulo de pagiona -->
    <title>Intercambios de libros usados</title>
</head>

<body class="grid-container">
    <div class="section">
        <div class="">
            <a href="index.php?c=articulo&f=view_new">
                <button type="button" class="Info button">
                    <i class=""></i>Nuevo articulo</button>
            </a>
            <form action="index.php?c=articulo&f=search" method="POST">
                <input class="input-buscar" type="text" name="b" id="busqueda" placeholder="buscar por nombre..." />
                <button type="submit" class="button-buscar"><i></i>Buscar</button>
            </form>
        </div>
    </div>
    <main class="main">
        <div class="contenedor">
            <label for="nombre">Recientes</label>
            <div class="articulos-container">
                <?php foreach ($articulos as $art) { ?>
                    <div class="articulo">
                        <img src="<?php echo $art->art_imagen; ?>" alt="Imagen de <?php echo $art->art_titulo; ?>">
                        <h2 class="info"><?php echo $art->art_titulo; ?></h2>
                        <h3 class="info"><?php echo $art->art_autores; ?></h3>
                        <a href="index.php?c=articulo&f=details&id= <?php echo $art->art_id; ?> ">Ver más...</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>

<style>
    
    .input-buscar {
        width: 100%;
        /* Ocupa todo el ancho disponible */
        max-width: 400px;
        /* Establece un ancho máximo */
        padding: 15px;
        /* Mayor espacio interno para mejor visibilidad */
        font-size: 18px;
        /* Texto más grande */
        border: 2px solid #D98B48;
        /* Borde con color */
        border-radius: 25px;
        /* Bordes redondeados */
        outline: none;
        /* Elimina borde de enfoque predeterminado */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Sombra para mejor visibilidad */
    }

    .button-buscar{
        background:  #D98B48;
        margin-top: 20px;
        padding: 10px 25px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        color: #fffe;
    }

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
        grid-row: 4/6;
        display: flexbox;
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
        grid-row: 3/4;
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

    .articulos-container {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        gap: 24px;
        padding: 30px;
        margin: 10px auto;
        overflow-x: auto;
        scroll-behavior: smooth;
        background-color: #F2D7B6;
        border: 2px solid #333;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        justify-content: flex-start;
        align-items: flex-start;
        align-content: center;
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        color: #333;
        scrollbar-width: thin;
        scrollbar-color: #8c8c8c #f2d7b6;
    }

    .articulos-container::-webkit-scrollbar {
        height: 8px;
    }

    .articulos-container::-webkit-scrollbar-track {
        background: #f2d7b6;
        border-radius: 10px;
    }

    .articulos-container::-webkit-scrollbar-thumb {
        background: #8c8c8c;
        border-radius: 10px;
    }

    .articulos-container::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .articulo {
        background-color: #fffe;
        width: 430px;
        height: 350px;
    }

    .articulo>img {
        width: 230px;
        height: 150px;
        border-radius: 15px;
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

    .articulo {
        background-color: #fffe;
        width: 430px;
        height: 350px;
        border: 2px solid #333;
        /* Borde de 2px, puedes ajustar el grosor */
        border-radius: 15px;
        /* Borde redondeado */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        /* Sombra ligera */
    }
</style>