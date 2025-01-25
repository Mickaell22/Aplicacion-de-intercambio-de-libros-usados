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
    <meta name="OG::title" content="Proyecto">

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/estilos-comunes-2.css">

    <!-- Favicon -->
    <link rel="icon" href="../Image/icon.png" type="image/png">

    <!-- Titulo de pagiona -->
    <title>Intercambios de libros usados</title>
</head>

<body class="grid-container">
    <div class="section">
        <h2>Lista de categorias</h2>
        <div class="">
            <form action="index.php?c=categoria&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="buscar por nombre..." />
                <button type="submit" class="Buscar button"><i></i>Buscar</button>
            </form>
        </div>
        <div class="">
            <a href="index.php?c=categoria&f=view_new">
                <button type="button" class="Info button">
                    <i class=""></i>
                    Nuevo</button>
            </a>
        </div>
    </div>
    <main class="main">
        <table class="admin-table">
            <thead class="">
                <th>Titulo </th>
                <th>Descripcion </th>
                <th>Estado </th>
                <th>Acciones </th>
            </thead>
            <tbody class="">
                <?php
                foreach ($resultados as $fila) { ?>
                    <tr>
                        <td><?php echo $fila['cat_nombre']; ?></td>
                        <td><?php echo $fila['cat_descripcion']; ?></td>
                        <td><?php echo $fila['cat_estado']; ?></td>
                        <td>
                            <button class="Editar button"
                                onclick="window.location.href='index.php?c=categoria&f=edit_view&id=<?php echo $fila['cat_id']; ?>'">
                                Editar
                            </button>
                            <button class="Comprar button"
                                onclick="window.location.href='index.php?c=categoria&f=delete&id=<?php echo $fila['cat_id']; ?>'">
                                Eliminar
                            </button>

                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </main>
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
        background: #2196F3;
        color: #fffe;
    }

    .Editar.button {
        background: linear-gradient(#2196F3, #4CAF50);
        color: #fffe;
    }

    .Comprar.button {
        background: linear-gradient(#FF4081, #FF9800);
        color: white;
    }

    .Buscar.button {
        background: #4CAF50;
        color: #fffe;
    }

    .button:hover {
        font-weight: bold;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
    }

    input {
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

    table {
        border: 1px solid;
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 7px;
        border-bottom: 1px solid #000;
    }

    /* Estilos generales de la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Sombra para destacar la tabla */
        border: 2px solid #D98B48;
        /* Borde exterior */
        border-radius: 10px;
        /* Bordes redondeados */
        overflow: hidden;
        /* Asegura que los bordes redondeados se apliquen */
    }

    /* Estilo para las celdas de encabezado */
    th {
        background-color: #D98B48;
        /* Color naranja */
        color: white;
        /* Texto blanco */
        font-size: 18px;
        padding: 15px;
        text-align: center;
        border-bottom: 3px solid #c1763e;
        /* Línea separadora más oscura */
    }

    /* Estilo para las filas de la tabla */
    td {
        padding: 12px;
        border-bottom: 1px solid #D98B48;
        /* Línea divisoria naranja */
        font-size: 16px;
        color: #333;
        /* Color del texto */
    }

    /* Estilo para filas impares */
    tbody tr:nth-child(odd) {
        background-color: #f9f3ef;
        /* Color de fondo alternativo */
    }

    /* Efecto hover en filas */
    tbody tr:hover {
        background-color: #f1e0d1;
        /* Color de fondo al pasar el mouse */
        transition: background 0.3s ease-in-out;
    }

    /* Estilo para los botones dentro de la tabla */
    td button {
        background-color: #D98B48;
        color: white;
        border: none;
        padding: 10px 20px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    td button:hover {
        background-color: #c1763e;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>