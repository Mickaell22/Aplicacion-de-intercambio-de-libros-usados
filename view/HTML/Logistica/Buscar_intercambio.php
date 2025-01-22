<!-- Autor: TROYA -->
 <!-- Autor: Moran Vera Mickaell -->
<div class="admin-container">
    <div class="admin-header">
        <h1>Gestión de Libros</h1>
        <div class="admin-actions">
            <a href="<?php echo URL_BASE; ?>index.php?c=libro&f=publicar" class="btn-crear">Nuevo Libro</a>
            <form method="GET" action="" class="filter-form">
                <input type="hidden" name="c" value="admin">
                <input type="hidden" name="f" value="libros">
                <label class="checkbox-label">
    <input type="checkbox" name="mostrar_pendientes" value="1" 
        <?php echo isset($_GET['mostrar_pendientes']) ? 'checked' : ''; ?> 
        onchange="this.form.submit()">
    Mostrar Pendientes y Rechazados
</label>
            </form>
        </div>
    </div>