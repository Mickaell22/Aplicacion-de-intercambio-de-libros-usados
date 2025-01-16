<?php
// Obtener valores de las cookies o usar valores predeterminados
$headerTitle = isset($_COOKIE['header_title']) ? $_COOKIE['header_title'] : 'Búsqueda';
$headerImage = isset($_COOKIE['header_image']) ? $_COOKIE['header_image'] : 'https://png.pngtree.com/thumb_back/fw800/background/20220504/pngtree-woman-in-bookstore-looking-for-book-bookstore-person-woman-photo-image_36345226.jpg';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="author" content="Moran Vera Mickaell Adrian">
    <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo 5">
    <meta name="keywords" content="Libro, intercambio, busqueda, filtrado, foro">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="OG::title" content="Proyecto">
    
    <link rel="stylesheet" href="<?php echo ESTILOS2; ?>">
    <link rel="icon" href="assets/Image/icon.png" type="image/png">
    <title>Intercambios de libros usados</title>

    <style>
        /* ... tus estilos ... */
    </style>
</head>
<body class="grid-container">
    <header class="navbar">
        <div class="box-titulo">
            <div class="box-titulo-opaco">
                <h1 class="titulo"><?php echo htmlspecialchars($headerTitle); ?></h1>
                <div class="Secciones">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="index.php?c=busqueda&f=index">Búsqueda</a></li>
                        <li><a href="index.php?c=mensajeria&f=index">Mensajeria directa</a></li>
                        <li><a href="index.php?c=logistica&f=index">Logística de Intercambio</a></li>
                        <li><a href="index.php?c=recomendaciones&f=index">Recomendaciones de Libros</a></li>
                        <li><a href="index.php?c=comentarios&f=index">Comentarios de Usuarios</a></li>
                        <?php if (isset($_SESSION['usuario_id'])): ?>
                            <li style="float:right"><a href="index.php?c=login&f=logout">Cerrar Sesión</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>