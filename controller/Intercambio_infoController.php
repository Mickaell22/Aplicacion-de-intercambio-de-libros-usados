<?php
require_once __DIR__ . '/../model/dao/LogisticaDAO.php'; // Asegúrate de incluir el DAO si no lo has hecho

class Intercambio_infoController {

    private $logisticaDAO;

    public function __construct() {
        $this->logisticaDAO = new LogisticaDAO(); // Crear la instancia de DAO
    }

    public function index() {
        if($_SESSION["rol"] != 'admin'){
            
            header('Location: ' . URL_BASE . 'index.php');
        }
        // Obtener todos los intercambios de la base de datos
        $intercambios = $this->logisticaDAO->getAllIntercambios();

        // Pasar los datos a la vista
        require_once SUB_HEADER;
        require_once 'view/HTML/Logistica/Intercambio_info.php';
        require_once FOOTER;
    }
}



// aqui va el metodo eliminar

?>