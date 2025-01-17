<!-- Autor: Moran Vera Mickaell -->


<!-- Header -->
<header class="navbar">
    <div class="box_presentacion">
        <div class="box_presentacion_opaco">
            <h1 class="titulo">Intercambios de libros usados</h1>
        </div>
        <div class="Secciones">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?c=busqueda&f=index">Búsqueda</a></li>
                <li><a href="index.php?c=mensajeria&f=index">Mensajería directa</a></li>
                <li><a href="index.php?c=logistica&f=index">Logística de Intercambio</a></li>
                <li><a href="index.php?c=recomendaciones&f=index">Recomendaciones de Libros</a></li>
                <li><a href="index.php?c=comentarios&f=index">Comentarios de Usuarios</a></li>
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <li style="float:right">
                        <a href="index.php?c=login&f=logout">Cerrar Sesión</a>
                    </li>
                <?php else: ?>
                    <li style="float:right">
                        <a href="index.php?c=usuario&f=creditos">Créditos</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>