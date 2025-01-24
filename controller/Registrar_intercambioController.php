<?php
require_once __DIR__ . '/../model/dao/LogisticaDAO.php';
require_once __DIR__ . '/../model/dto/LogisticaDTO.php';

class Registrar_intercambioController {

    private $logisticaDAO;

    public function __construct() {
        $this->logisticaDAO = new LogisticaDAO();
    }

    public function index() {
        require_once SUB_HEADER;
        require_once 'view/HTML/Logistica/subir_intercambio.php';
        require_once FOOTER;
    }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                // Agregar log para ver los datos recibidos
                error_log("Datos del formulario: " . print_r($_POST, true));  // Esto te permitirá ver los datos enviados
    
                // Crear el objeto LogisticaDTO
                $logisticaDTO = new LogisticaDTO();
                $logisticaDTO->setFechaintercambio($_POST['fechaintercambio']);
                $logisticaDTO->setFecharegistro($_POST['fecharegistro']);
                $logisticaDTO->setUsuarioId($_SESSION['usuario_id']);
                $logisticaDTO->setUbicacion($_POST['ubicacion']);
                $logisticaDTO->setCalificacion($_POST['calificacion']);
                $logisticaDTO->setEstado($_POST['estado']);
                $logisticaDTO->setMetodo($_POST['metodo']);
    
                // Agregar log para verificar los valores del objeto LogisticaDTO
                error_log("LogisticaDTO: " . print_r($logisticaDTO, true));  // Verificar si el objeto tiene los valores correctos
    
                // Llamar al DAO para insertar el intercambio en la base de datos
                if ($this->logisticaDAO->insert($logisticaDTO)) {
                    $_SESSION['mensaje'] = "Intercambio registrado exitosamente";
                    $_SESSION['tipo'] = "success";
                } else {
                    $_SESSION['mensaje'] = "Error al registrar el intercambio";
                    $_SESSION['tipo'] = "error";
                }
    
                // Redirigir a una página de éxito o donde se considere apropiado
                header('Location: ' . URL_BASE . 'index.php?c=Intercambio_info&f=index');
                exit;
            } catch (Exception $e) {
                $_SESSION['mensaje'] = "Error al procesar el intercambio";
                $_SESSION['tipo'] = "error";
                error_log("Error en crear intercambio: " . $e->getMessage());
                header('Location: ' . URL_BASE . 'index.php?c=Intercambio_info&f=index');
                exit;
            }
        }
    }
    
    
}

?>
