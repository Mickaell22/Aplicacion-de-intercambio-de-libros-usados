<!-- Autor: Moran Vera Mickaell -->


<?php
class IndexController {
    public function __construct() {
        // Constructor
    }
    
    public function index() {
        session_start();
        
        // Verificar si hay mensajes de error
        $error = isset($_GET['error']) ? $_GET['error'] : null;
        $mensaje = '';
        
        switch($error) {
            case 'campos_vacios':
                $mensaje = 'Por favor complete todos los campos';
                break;
            case 'credenciales_invalidas':
                $mensaje = 'Email o contraseña incorrectos';
                break;
        }
        
        // Incluir la vista principal
        include_once HEADER;
        
        // Si el usuario está logueado, mostrar contenido personalizado
        if (isset($_SESSION['usuario_id'])) {
            ?>
            <main class="main">
                <div class="container mt-4">
                    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Últimas actualizaciones</h3>
                            
                        </div>
                        <div class="col-md-6">
                            <h3>Acciones rápidas</h3>
                            <ul>
                                <li><a href="index.php?c=busqueda&f=index">Buscar libros</a></li>
                                <li><a href="index.php?c=perfil&f=index">Mi perfil</a></li>
                                <li><a href="index.php?c=login&f=logout">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
            <?php
        } else {
            // Si no está logueado, mostrar el formulario de login
            if ($mensaje) {
                echo '<div class="alert alert-danger">' . htmlspecialchars($mensaje) . '</div>';
            }
            require_once LOGIN;
        }
        
        include_once FOOTER;
    }
}
?>