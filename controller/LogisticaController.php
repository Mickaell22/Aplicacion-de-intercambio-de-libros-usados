<!-- Autor: Troya Garzon Geancarlos -->
<?php

class LogisticaController {

    public function index() {
        require_once SUB_HEADER;
        require_once 'view/HTML/Logistica/Buscar_intercambio.php';
        require_once FOOTER;
    }

    public function buscar() {
        // Verificar que se haya recibido la búsqueda
        $query = isset($_GET['q']) ? $_GET['q'] : '';
    
        // Verificar los filtros de búsqueda
        $filtros = [
            'fecha' => isset($_GET['fecha']),
            'metodo' => isset($_GET['metodo']),
            'id' => isset($_GET['idinter']),
        ];
    
        // Instanciar el DAO y buscar los intercambios según los filtros
        require_once 'model/LogisticaDAO.php';
        $logisticaDAO = new LogisticaDAO();
        $intercambios = $logisticaDAO->buscarIntercambios($query, $filtros);
    
        // Pasar los resultados a la vista
        require_once SUB_HEADER;
        require_once 'view/HTML/Logistica/Buscar_intercambio.php';
        require_once FOOTER;
    }
}




?>
