<?php
require_once 'model/dto/DenunciaDTO.php';
require_once 'model/dao/DenunciaDAO.php';
require_once 'model/dao/LibroDAO.php';

class DenunciaController
{
    private $denunciaDAO;
    private $libroDAO;

    public function __construct()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
        $this->denunciaDAO = new DenunciaDAO();
        $this->libroDAO = new LibroDAO();
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $denunciaDTO = new DenunciaDTO();
                $denunciaDTO->setLibroId($_POST['libro_id']);
                $denunciaDTO->setUsuarioId($_SESSION['usuario_id']);
                $denunciaDTO->setTipo($_POST['tipo']);
                $denunciaDTO->setDescripcion($_POST['descripcion']);
                $denunciaDTO->setFechaIncidente($_POST['fecha']);

                // Procesar evidencia si existe
                if (isset($_FILES['evidencia']) && $_FILES['evidencia']['error'] == 0) {
                    $evidencia = $this->procesarEvidencia($_FILES['evidencia']);
                    if ($evidencia) {
                        $denunciaDTO->setEvidencia($evidencia);
                    }
                }

                if ($this->denunciaDAO->crearDenuncia($denunciaDTO)) {
                    $_SESSION['mensaje'] = "Denuncia enviada exitosamente";
                    $_SESSION['tipo'] = "success";
                } else {
                    $_SESSION['mensaje'] = "Error al enviar la denuncia";
                    $_SESSION['tipo'] = "error";
                }

                header('Location: ' . URL_BASE . 'index.php?c=libro&f=info&id=' . $_POST['libro_id']);
                exit;
            } catch (Exception $e) {
                $_SESSION['mensaje'] = "Error al procesar la denuncia";
                $_SESSION['tipo'] = "error";
                error_log("Error en crear denuncia: " . $e->getMessage());
                header('Location: ' . URL_BASE . 'index.php?c=libro&f=info&id=' . $_POST['libro_id']);
                exit;
            }
        }

        // Para mostrar el formulario
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $libro = $this->libroDAO->getLibroById($id);

        if (!$libro) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }

        require_once SUB_HEADER;
        require_once 'view/HTML/Denuncia/denuncia.php';
        require_once FOOTER;
    }

    private function procesarEvidencia($file)
    {
        try {
            $targetDir = "assets/evidencias/";
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Validar el tipo de archivo
            $permitidos = ['image/jpeg', 'image/png', 'application/pdf'];
            if (!in_array($file['type'], $permitidos)) {
                throw new Exception("Tipo de archivo no permitido");
            }

            // Validar tamaño (10MB máximo)
            if ($file['size'] > 10 * 1024 * 1024) {
                throw new Exception("El archivo es demasiado grande");
            }

            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '_' . date('Ymd_His') . '.' . $extension;
            $targetFile = $targetDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                return $targetFile;
            }
            return null;
        } catch (Exception $e) {
            error_log("Error procesando evidencia: " . $e->getMessage());
            return null;
        }
    }

    public function gestionar()
    {
        // Verificar si es admin
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }

        try {
            $denuncias = $this->denunciaDAO->getAllDenuncias();

            require_once SUB_HEADER;
            require_once 'view/HTML/Denuncia/gestionar.php';
            require_once FOOTER;
        } catch (Exception $e) {
            error_log("Error en gestionar denuncias: " . $e->getMessage());
            $_SESSION['mensaje'] = "Error al cargar las denuncias";
            $_SESSION['tipo'] = "error";
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
    }
    public function ver()
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $denuncia = $this->denunciaDAO->getDenunciaDetalle($id);

        if (!$denuncia) {
            header('Location: ' . URL_BASE . 'index.php?c=denuncia&f=gestionar');
            exit;
        }

        require_once SUB_HEADER;
        require_once 'view/HTML/Denuncia/ver.php';
        require_once FOOTER;
    }

    public function resolver()
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        try {
            if ($this->denunciaDAO->cambiarEstado($id, 'resuelto')) {
                $_SESSION['mensaje'] = "Denuncia marcada como resuelta";
                $_SESSION['tipo'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error al resolver la denuncia";
                $_SESSION['tipo'] = "error";
            }
        } catch (Exception $e) {
            error_log("Error en resolver denuncia: " . $e->getMessage());
            $_SESSION['mensaje'] = "Error al procesar la solicitud";
            $_SESSION['tipo'] = "error";
        }

        // Redirigir de vuelta a la lista o a los detalles
        if (isset($_GET['ret']) && $_GET['ret'] === 'details') {
            header('Location: ' . URL_BASE . 'index.php?c=denuncia&f=ver&id=' . $id);
        } else {
            header('Location: ' . URL_BASE . 'index.php?c=denuncia&f=gestionar');
        }
        exit;
    }

    public function descartar()
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        try {
            if ($this->denunciaDAO->cambiarEstado($id, 'descartado')) {
                $_SESSION['mensaje'] = "Denuncia descartada";
                $_SESSION['tipo'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error al descartar la denuncia";
                $_SESSION['tipo'] = "error";
            }
        } catch (Exception $e) {
            error_log("Error en descartar denuncia: " . $e->getMessage());
            $_SESSION['mensaje'] = "Error al procesar la solicitud";
            $_SESSION['tipo'] = "error";
        }

        // Redirigir de vuelta a la lista o a los detalles
        if (isset($_GET['ret']) && $_GET['ret'] === 'details') {
            header('Location: ' . URL_BASE . 'index.php?c=denuncia&f=ver&id=' . $id);
        } else {
            header('Location: ' . URL_BASE . 'index.php?c=denuncia&f=gestionar');
        }
        exit;
    }

    public function editar() {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
    
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar formulario
            $datos = [
                'tipo' => $_POST['tipo'],
                'estado' => $_POST['estado'],
                'fecha_incidente' => $_POST['fecha_incidente'],
                'descripcion' => $_POST['descripcion']
            ];
    
            try {
                if ($this->denunciaDAO->actualizarDenuncia($id, $datos)) {
                    $_SESSION['mensaje'] = "Denuncia actualizada exitosamente";
                    $_SESSION['tipo'] = "success";
                    header('Location: ' . URL_BASE . 'index.php?c=denuncia&f=ver&id=' . $id);
                    exit;
                } else {
                    $_SESSION['mensaje'] = "Error al actualizar la denuncia";
                    $_SESSION['tipo'] = "error";
                }
            } catch (Exception $e) {
                error_log("Error en editar denuncia: " . $e->getMessage());
                $_SESSION['mensaje'] = "Error al procesar la solicitud";
                $_SESSION['tipo'] = "error";
            }
        }
    
        // Obtener datos actuales de la denuncia
        $denuncia = $this->denunciaDAO->getDenunciaDetalle($id);
        
        if (!$denuncia) {
            header('Location: ' . URL_BASE . 'index.php?c=denuncia&f=gestionar');
            exit;
        }
    
        require_once SUB_HEADER;
        require_once 'view/HTML/Denuncia/editar.php';
        require_once FOOTER;
    }

    public function eliminar()
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($this->denunciaDAO->eliminarDenuncia($id)) {
            $_SESSION['mensaje'] = "Denuncia eliminada exitosamente";
            $_SESSION['tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al eliminar la denuncia";
            $_SESSION['tipo'] = "error";
        }

        header('Location: ' . URL_BASE . 'index.php?c=denuncia&f=gestionar');
        exit;
    }
}
?>