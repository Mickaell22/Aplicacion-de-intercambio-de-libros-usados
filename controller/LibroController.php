<?php
require_once 'model/dao/LibroDAO.php';
require_once 'model/dto/LibroDTO.php';

class LibroController {
    private $libroDAO;
    
    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
        $this->libroDAO = new LibroDAO();
    }
    
    public function info() {
        // Obtener el ID del libro
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if ($id <= 0) {
            header('Location: ' . URL_BASE . 'index.php?c=busqueda&f=index');
            exit;
        }
        
        // Obtener la información del libro
        $libro = $this->libroDAO->getLibroById($id);
        
        if (!$libro) {
            header('Location: ' . URL_BASE . 'index.php?c=busqueda&f=index');
            exit;
        }

        // Añadir campos adicionales si no existen
        if (!isset($libro['valoracion'])) {
            $libro['valoracion'] = "4.1"; // Valor por defecto
        }
        if (!isset($libro['resena'])) {
            $libro['resena'] = $libro['descripcion']; // Usar la descripción como reseña si no hay una específica
        }
        
        require_once SUB_HEADER;
        require_once 'view/HTML/Libro/Libro_Info.php';
        require_once FOOTER;
    }

    public function publicar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validar campos requeridos
            if(empty($_POST["titulo"]) || empty($_POST["autor"]) || empty($_POST["genero"])) {
                $_SESSION["mensaje"] = "Por favor complete todos los campos requeridos";
                $_SESSION["tipo"] = "error";
                header('Location: ' . URL_BASE . 'index.php?c=libro&f=publicar');
                exit;
            }

            try {
                $libro = $this->populate();
                $exito = $this->libroDAO->insert($libro);

                if($exito) {
                    $_SESSION["mensaje"] = "Libro publicado exitosamente";
                    $_SESSION["tipo"] = "success";
                    header('Location: ' . URL_BASE . 'index.php?c=busqueda&f=index');
                } else {
                    $_SESSION["mensaje"] = "Error al publicar el libro";
                    $_SESSION["tipo"] = "error";
                    header('Location: ' . URL_BASE . 'index.php?c=libro&f=publicar');
                }
            } catch(Exception $e) {
                $_SESSION["mensaje"] = "Error en el sistema";
                $_SESSION["tipo"] = "error";
                error_log("Error en LibroController::publicar: " . $e->getMessage());
                header('Location: ' . URL_BASE . 'index.php?c=libro&f=publicar');
            }
            exit;
        }

        require_once SUB_HEADER;
        require_once 'view/HTML/Libro/Subir_Libro.php';
        require_once FOOTER;
    }

    private function populate() {
        $libro = new LibroDTO();
        
        // Usar strip_tags para remover HTML y htmlspecialchars_decode para decodificar entidades HTML
        $libro->setTitulo(strip_tags(htmlspecialchars_decode($_POST['titulo'])));
        $libro->setAutor(strip_tags(htmlspecialchars_decode($_POST['autor'])));
        $libro->setGenero(strip_tags(htmlspecialchars_decode($_POST['genero'])));
        $libro->setAnio(!empty($_POST['anio']) ? (int)$_POST['anio'] : null);
        $libro->setEditorial(!empty($_POST['editorial']) ? strip_tags(htmlspecialchars_decode($_POST['editorial'])) : null);
        $libro->setDescripcion(!empty($_POST['descripcion']) ? strip_tags(htmlspecialchars_decode($_POST['descripcion'])) : null);
        $libro->setEstado('pendiente');
        $libro->setUsuarioId($_SESSION['usuario_id']);
        $libro->setFechaRegistro(date('Y-m-d H:i:s'));

        // Manejo de la imagen
        if(isset($_FILES['portada']) && $_FILES['portada']['error'] == 0) {
            $imagen = $this->procesarImagen($_FILES['portada']);
            if ($imagen) {
                $libro->setImagen($imagen);
            }
        }

        return $libro;
    }

    private function procesarImagen($file) {
        // Validar el tipo de archivo
        $permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($file['type'], $permitidos)) {
            throw new Exception("Tipo de archivo no permitido");
        }

        // Validar tamaño (5MB máximo)
        if ($file['size'] > 5 * 1024 * 1024) {
            throw new Exception("El archivo es demasiado grande");
        }

        $targetDir = "assets/CSS/Image/portadas/";
        
        // Crear el directorio si no existe
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Generar nombre único para el archivo
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '_' . date('Ymd_His') . '.' . $extension;
        $targetFile = $targetDir . $fileName;
        
        // Mover el archivo
        if(move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $targetFile;
        }
        
        return null;
    }

    private function mostrarMensaje($exito, $mensajeExito, $mensajeError, $redireccion) {
        if($exito) {
            $_SESSION["mensaje"] = $mensajeExito;
            $_SESSION["tipo"] = "success";
        } else {
            $_SESSION["mensaje"] = $mensajeError;
            $_SESSION["tipo"] = "error";
        }
        header("Location: " . $redireccion);
        exit;
    }
}
?>