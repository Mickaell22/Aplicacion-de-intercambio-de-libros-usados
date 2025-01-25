<?php
//Autor: Troya Garzón Geancarlos
require_once 'model/dao/LogisticaDAO.php';
require_once 'model/dto/LogisticaDTO.php';


class LogisticaController {
    private $LogisticaDAO;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
        $this->LogisticaDAO = new LogisticaDAO();
    }

    

    public function index() {
        require_once SUB_HEADER;
        require_once 'view/HTML/Logistica/Buscar_intercambio.php';
        require_once FOOTER;
    }

    
    public function search()
    {
        //recibe parametros de la peticion
        $parametro = htmlentities($_POST["q"]??"");
        //comunicarme con el modelo
        $intercambio = $this->LogisticaDAO->selectOne($parametro);
        //comunicamos con la vista
        require_once SUB_HEADER;
        require_once BUSCAR_LOGISTICA_VIEW;
        require_once FOOTER;
    }

    
    public function delete() {

        if($_SESSION["rol"] != 'admin'){
            
            header('Location: ' . URL_BASE . 'index.php');
        }
        // Verificar si el id es válido
        $id = htmlentities($_GET['id']);
        if (isset($id) && is_numeric($id)) {
            // Eliminar el intercambio
            $result = $this->LogisticaDAO->delete($id);
            
            if ($result) {
                // Redirigir al usuario a una página de confirmación o la lista de intercambios
                header('Location: index.php?c=logistica&f=index');
                exit;
            } else {
                // Manejar el caso donde no se pudo eliminar el intercambio
                echo "Error al eliminar el intercambio.";
            }
        } else {
            echo "ID no válido.";
        }
    }

}




?>
