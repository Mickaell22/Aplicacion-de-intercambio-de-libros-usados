<!-- Autor: Moran Vera Mickaell -->

<?php
class BaseController {
    protected function verificarSesion() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
    }
    
    protected function esUsuarioLogueado() {
        return isset($_SESSION['usuario_id']);
    }
}
?>