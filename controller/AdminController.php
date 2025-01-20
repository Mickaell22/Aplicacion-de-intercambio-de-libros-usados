<!-- Autor: Moran Vera Mickaell -->

<!-- Aunq creo que otros compañeñors tambien usaran esta clase -->

<?php
class AdminController {
    private $libroDAO;
    
    public function __construct() {
        if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }

        try {
            require_once 'model/dao/LibroDAO.php';
            $this->libroDAO = new LibroDAO();
        } catch (Exception $e) {
            error_log("Error en constructor de AdminController: " . $e->getMessage());
            header('Location: ' . URL_BASE . 'index.php?error=error_sistema');
            exit;
        }
    }
    


    // Libros
    public function libros() {
        $mostrarPendientes = isset($_GET['mostrar_pendientes']);
        $libros = $this->libroDAO->getAllLibros($mostrarPendientes);
        require_once SUB_HEADER;
        require_once LIBROS_VIEW;
        require_once FOOTER;
    }

    public function aprobar() {
        try {
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            if ($id > 0) {
                if ($this->libroDAO->cambiarEstado($id, 'aprobado')) {
                    $_SESSION['mensaje'] = "Libro aprobado exitosamente";
                    $_SESSION['tipo_mensaje'] = "success";
                } else {
                    $_SESSION['mensaje'] = "Error al aprobar el libro";
                    $_SESSION['tipo_mensaje'] = "error";
                }
            }
        } catch (Exception $e) {
            error_log("Error en aprobar: " . $e->getMessage());
            $_SESSION['mensaje'] = "Error al aprobar el libro";
            $_SESSION['tipo_mensaje'] = "error";
        }
        header('Location: ' . URL_BASE . 'index.php?c=admin&f=libros');
        exit;
    }

    public function rechazar() {
        try {
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            if ($id > 0) {
                if ($this->libroDAO->cambiarEstado($id, 'rechazado')) {
                    $_SESSION['mensaje'] = "Libro rechazado";
                    $_SESSION['tipo_mensaje'] = "success";
                } else {
                    $_SESSION['mensaje'] = "Error al rechazar el libro";
                    $_SESSION['tipo_mensaje'] = "error";
                }
            }
        } catch (Exception $e) {
            error_log("Error en rechazar: " . $e->getMessage());
            $_SESSION['mensaje'] = "Error al rechazar el libro";
            $_SESSION['tipo_mensaje'] = "error";
        }
        header('Location: ' . URL_BASE . 'index.php?c=admin&f=libros');
        exit;
    }
    
    public function eliminar() {
        try {
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            if ($id > 0) {
                if ($this->libroDAO->eliminarLibro($id)) {
                    $_SESSION['mensaje'] = "Libro eliminado exitosamente";
                    $_SESSION['tipo_mensaje'] = "success";
                } else {
                    $_SESSION['mensaje'] = "Error al eliminar el libro";
                    $_SESSION['tipo_mensaje'] = "error";
                }
            }
        } catch (Exception $e) {
            error_log("Error en eliminar: " . $e->getMessage());
            $_SESSION['mensaje'] = "Error al eliminar el libro";
            $_SESSION['tipo_mensaje'] = "error";
        }
        header('Location: ' . URL_BASE . 'index.php?c=admin&f=libros');
        exit;
    }


}
?>