<?php
class ComentariosController {
    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
    }
    
    public function index() {
        require_once SUB_HEADER;
        require_once COMENTARIOS_VIEW;
        require_once FOOTER;
    }
}
?>