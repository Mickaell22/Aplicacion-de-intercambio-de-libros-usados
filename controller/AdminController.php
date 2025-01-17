<?php
class AdminController {
    public function __construct() {
        // Verificar si está logueado y es admin
        if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
    }
    
}
?>