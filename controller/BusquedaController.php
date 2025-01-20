<!-- Autor: Moran Vera Mickaell -->

<?php
require_once 'model/dao/LibroDAO.php';

class BusquedaController {
    private $libroDAO;
    
    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
        $this->libroDAO = new LibroDAO();
    }
    
    public function index() {
        $termino = isset($_GET['q']) ? trim($_GET['q']) : '';
        $filtros = [
            'genero' => isset($_GET['genero']) ? $_GET['genero'] : '',
        ];

        if (!empty($termino) || !empty($filtros['genero'])) {
            $libros = $this->libroDAO->buscarLibros($termino, $filtros);
        } else {
            $libros = $this->libroDAO->getAllLibros();
        }

        require_once SUB_HEADER;
        require_once BCATEGORIA;
        require_once FOOTER;
    }
}
?>