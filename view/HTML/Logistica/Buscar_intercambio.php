<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Autor -->
    <meta name="author" content="Troya Garzon Geancarlos">
    <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo 5">
    <meta name="keywords" content="Libro, intercambio, busqueda, filtrado, foro">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos-comunes-2.css">
    <link rel="icon" href="../Image/icon.png" type="image/png">
    <title>Intercambios de libros usados</title>
</head>

<div class="container">
<h1 class="text-center mt-5" style="margin-left: 200px;">Registro de Logística de Intercambios</h1>
<div class="">
            <form action="index.php?c=logistica&f=search" method="POST">
                <input type="text" name="q" id="busqueda" placeholder="buscar por ID..." />
                <button type="submit" class="search-button"><i></i>Buscar</button>
            </form>
</div>


    <!-- Tabla de Datos del Intercambio -->
    <table class="table table-bordered">
        <thead class="header-table">
            <tr>
                <th>Id de Intercambio</th>
                <th>Fecha del Intercambio</th>
                <th>Fecha de Registro</th>
                <th>Ubicación de Intercambio</th>
                <th>Calificación del Servicio</th>
                <th>Estado</th>
                <th>Método de Entrega</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($intercambio)): ?>
               <tr>
                        <td><?php echo $intercambio['id']; ?></td>
                        <td><?php echo $intercambio['fechaintercambio']; ?></td>
                        <td><?php echo $intercambio['fecharegistro']; ?></td>
                        <td><?php echo $intercambio['ubicacion']; ?></td>
                        <td><?php echo $intercambio['calificacion']; ?></td>
                        <td><?php echo $intercambio['estado']; ?></td>
                        <td><?php echo $intercambio['metodo']; ?></td>
                        <td class="action-buttons">
                            <button type="button" class="btn btn-danger" onclick="location.href='index.php?c=Editar_intercambio&f=index&id=<?php echo $intercambio['id']; ?>'">Editar</button>
                            <button class="btn btn-eliminar">Eliminar</button>
                        </td>
                    </tr>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No hay intercambios registrados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Botones de Acción -->
    <div class="text-center">
        <button type="button" class="btn btn-registrar" onclick="location.href='index.php?c=Registrar_intercambio&f=index'">Registrar Intercambio</button>
        <?php
                        if ($_SESSION['rol'] == 'admin') { ?>
                            <button type="button" class="btn btn-registrar" onclick="location.href='index.php?c=Intercambio_info&f=index'">Gestionar Logistica de Intercambio</button>
                        <?php }
        ?>
        
    </div>
   
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>


        

<style>
      /* Eliminar subrayado de los enlaces */
    a {
    text-decoration: none;
    }

    /* Si necesitas hacerlo solo para los enlaces de acción, puedes ser más específico */
    a.btn {
    text-decoration: none;
    }

     /* Estilo personalizado para los botones */
     .btn {
        border-radius: 25px; /* Bordes redondeados */
        padding: 10px 25px; /* Tamaño del padding para hacerlo más grande */
        font-weight: bold; /* Texto en negrita */
        transition: background-color 0.3s ease, transform 0.3s ease; /* Animación al pasar el cursor */
    }

    /* Botón de Editar */
    .btn-eliminar {
        background-color: red;
        color: white;
        border: none;
    }

    .btn-eliminar:hover {
        background-color: green;
        transform: scale(1.05); /* Efecto de ampliación */
    }

    /* Botón de Editar */
    .btn-danger {
        background-color: #00BFFF;
        color: white;
        border: none;
    }
    .btn-registrar {
        background: linear-gradient(#2196F3, #4CAF50);
        color: #fffe;
    }

    .btn-registrar:hover {
        background-color: green;
        transform: scale(1.05); /* Efecto de ampliación */
    }

    .btn-danger:hover {
        background-color: green;
        transform: scale(1.05); /* Efecto de ampliación */
    }

    /* Botón de Registrar Nuevo Intercambio */
    .btn-success {
        background-color: #28a745;
        color: white;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
        transform: scale(1.05); /* Efecto de ampliación */
    }

    /* Estilo para los botones cuando estén deshabilitados */
    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    /* Sombra en los botones */
    .btn:hover {
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    .table {
            margin-top: 30px;
            margin-bottom: 50px;
            margin-left: 250px;
            border: 2px solid black; /* Borde negro */
            border-collapse: collapse; 
        }

        .header-table th, .table td {
            border: 1px solid black; /* Borde entre las celdas */
        }

        .header-table {
            background-color: #f8f9fa;
            text-align: center;
        }

        .header-table th {
            background-color: #d98b48;
            color: white;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
    
    .box-titulo {
        height: 320px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
        background-image: url(https://cdn.zendalibros.com/wp-content/uploads/2019/03/2-los-editores-e1552065773865.jpg);
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
        background: url(https://cdn.zendalibros.com/wp-content/uploads/2019/03/2-los-editores-e1552065773865.jpg);
        background-position: center;
        box-sizing: border-box;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>