<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="author" content="Moran Vera Mickaell Adrian">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo 5">
    <meta name="keywords" content="Libro, intercambio, busqueda, filtrado, foro, inicio, libros, chat, charla">
    <meta name="OG::title" content="Proyecto">
    FIBICON
    <link rel="stylesheet" href="<?php echo ESTILOS2; ?>">
    <link rel="icon" href="<?php echo FIBICON; ?>" type="image/png">

    <title>Intercambios de libros usados</title>

    <style>
        .fondo {
            width: 100%;
            min-height: 100vh;
            background-image: url(https://www.ecuavisa.com/binrepository/1200x600/0c0/0d0/none/11705/BTEC/imagen-2024-04-23t122913-290_1491058_20240423123341.png);
            background-size: cover;
            /* Cambiado de 'contain' a 'cover' */
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .fondo_opaco {
            grid-column: 1/7;
            grid-row: 6/7;
            width: 90%;
            height: 90%;
            padding: 40px;
            background: #F5F5F5aa;
            border-radius: 30px;
            position: relative;
            overflow: hidden;
        }

        /* :( */
        .grid-container>* {
            text-align: center;
            font-weight: 500;
        }

        .grid-container {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: repeat(7, auto);
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
            grid-column: 1/7;
            grid-row: 6/7;
            min-height: 100vh;
            width: 100%;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pie {
            grid-column: 1/7;
            grid-row: 7/8;
            background-color: rgb(217, 139, 72);
        }

        .section {
            grid-column: 1/7;
            grid-row: 5/6;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 20px 20px;
            color: #fff;
            background: url(https://www.comunidadbaratz.com/wp-content/uploads/El-personal-de-biblioteca-es-pieza-clave-para-acercar-la-cultura-la-educacion-y-la-informacion.jpg);
            background-position: bottom;
            box-sizing: border-box;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }


        /* Form */
        .form-container {
            width: 100%;
            max-width: 450px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #F5F5F5;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .form-input {
            margin-bottom: 1.5rem;
        }

        .form-input label {
            display: block;
            color: #555;
            margin-bottom: 0.5rem;
            font-weight: 500;
            text-align: left;
            font-weight: bold;
        }

        .form-input input {
            width: 90%;
            padding: 0.8rem;
            border: 1px solid #ddd5;
            border-radius: 6px;
            font-size: 1rem;
        }

        .form-input input:focus {
            outline: none;
            border-color: #4A90E2;
            box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
        }

        .button-uno,
        .button-dos {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
        }

        .button-uno {
            background-color: #4A90E2;
            color: white;
        }

        .button-uno:hover {
            background-color: #357ABD;
        }

        .register-section {
            margin-top: 1rem;
            padding-top: 0.5rem;
            border-top: 1px solid #eee;
            text-align: center;
        }

        .register-text {
            color: #666;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .button-dos {
            background-color: #e8f0fe;
            color: #4A90E2;
            border: 1px solid #4A90E2;
        }

        .button-dos:hover {
            background-color: #d3e3fd;
        }

        .error {
            text-align: left;
            color: red;
            display: block;
        }

        @media screen and (max-width: 600px) {
            .grid-container {
                grid-template-columns: 1fr;
            }

            .navbar,
            .main,
            .pie {
                grid-column: 1 / -1;
            }

            .box_presentacion {
                height: auto;
            }

            .Secciones ul {
                flex-direction: column;
            }

            .Secciones ul li {
                margin-bottom: 5px;
            }

            .form-container {
                width: 95%;
                /* Nearly full width */
                padding: 1rem;
                margin: 1rem auto;
            }

            .form-input input {
                width: 100%;
            }

            .titulo {
                font-size: 2em;
                margin: 10% 0 20px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 15px;
                padding: 10px;
            }
        }
    </style>
    
</head>

<body class="grid-container">
    <?php require_once HEADER; ?>

    <main class="main">
        <div class="fondo">
            <div class="fondo_opaco">
                <?php
                if (!isset($_SESSION['usuario_id'])) {
                    require_once LOGIN;
                } else {
                    ?>
                    <div class="welcome-container">
                        <h2>¡Hola <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h2>
                        <p>Bienvenido de nuevo</p>
                        <a href="index.php?c=login&f=logout" class="logout-btn">Cerrar sesión</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </main>

    <?php require_once FOOTER; ?>

    <script src="assets/JavaScript/Validaciones_Login.js"></script>
</body>

</html>