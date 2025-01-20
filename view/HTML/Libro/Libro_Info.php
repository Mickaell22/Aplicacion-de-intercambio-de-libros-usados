<!-- Autor: Moran Vera Mickaell -->
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Autor -->
    <meta name="author" content="Moran Vera Mickaell Adrian">

    <!-- Metadatos -->
    <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo 5">
    <meta name="keywords" content="Libro, intercambio, busqueda, filtrado, foro">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph -->
    <meta name="OG::title" content="Proyecto">

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/estilos-comunes-2.css">

    <!-- Favicon -->
    <link rel="icon" href="../Image/icon.png" type="image/png">

    <!-- Titulo de pagiona -->
    <title>Intercambios de libros usados</title>
</head>

<body class="grid-container">
    <aside class="sidebar">
        <img src="<?php echo $libro['imagen']; ?>" alt="Portada de <?php echo $libro['titulo']; ?>">
        <h2><?php echo $libro['titulo']; ?></h2>
        <h3><?php echo $libro['autor']; ?></h3>
        <p><?php echo $libro['descripcion']; ?></p>
    </aside>

    <main class="main">
        <div class="info">
            <h2 class="info-libro"><?php echo $libro['titulo']; ?></h2>
            <h3 class="info-autor"><?php echo $libro['autor']; ?></h3>
            <p>Valoracion: <?php echo $libro['valoracion']; ?> Estrellas</p>

            <div class="Botones">
                <button type="button" class="Info button"
                    onclick="location.href='index.php?c=libro&f=comprar&id=<?php echo $libro['id']; ?>'">
                    Comprar
                </button>
                <button type="button" class="Comprar button"
                    onclick="location.href='index.php?c=mensajeria&f=chat&id=<?php echo $libro['id']; ?>'">
                    Chat
                </button>
                <button type="button" class="Info button"
                    onclick="location.href='index.php?c=comentarios&f=ver&id=<?php echo $libro['id']; ?>'">
                    Comentarios
                </button>
                <button type="button" class="Comprar button" onclick="location.href='index.php?c=libro&f=publicar'">
                    Publica tu libro!
                </button>
                <button type="button" class="Info button"
                    onclick="location.href='index.php?c=denuncia&f=crear&id=<?php echo $libro['id']; ?>'">
                    Denunciar
                </button>
            </div>
        </div>

        <div class="resenia">
            <h2>Reseña del libro</h2>
            <p><?php echo $libro['resena']; ?></p>
        </div>
    </main>
</body>

<style>
    /* Totuilo */
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

    .sidebar {
        grid-column: 1/3;
        grid-row: 3/4;
        background-color: rgb(242, 242, 242);
        margin-left: 20px;
        border: 7px solid #D98b48;
        border-radius: 8px;
        box-shadow: 0 20px 20px rgba(0, 0, 0);
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .sidebar img {
        width: 80%;
        /* O un tamaño fijo como 200px */
        height: auto;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        margin-bottom: 10px;
    }

    .sidebar h2 {
        color: #333;
        margin: 0;
        font-size: 1.5em;
        text-align: center;
        border-bottom: 3px solid #D98b48;
        padding-bottom: 5px;
        width: 100%;
    }

    .sidebar h3 {
        color: #666;
        margin: 0;
        font-size: 1.2em;
        font-style: italic;
    }

    .sidebar p {
        color: #444;
        text-align: justify;
        line-height: 1.6;
        margin: 0;
        padding: 10px;
        background-color: #fffa;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 2);
    }

    .main {
        grid-template-rows: auto auto;
        grid-column: 2/7;
        grid-row: 3/5;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* 4 columnas iguales */
        gap: 20px;
        padding-top: 30px;
        margin-bottom: 50px;
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
    .info {
        grid-column: 2/4;
        grid-row: 1/2;
        padding: 10px;
        border-top: 2px solid #D98b48;
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
        border-bottom: 6px solid #D98b48;
        margin-right: 20px;
    }

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

    .resenia {
        grid-column: 2/4;
        grid-row: 2/3;
        margin-right: 20px;
        border-bottom: 2px solid #D98b48;
    }

    .resenia h2 {
        margin: 10px;
        padding-left: 30px;
        border-bottom: 2px solid #D98b48;
        margin-bottom: 10px;
    }

    .resenia p {
        margin: 10px;
        text-align: justify;
        margin: 20px 10%;

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
</style>