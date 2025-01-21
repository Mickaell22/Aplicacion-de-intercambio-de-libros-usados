<?php
require_once 'model/dao/UsuarioDAO.php';
require_once 'model/dto/UsuarioDTO.php';

class RegisterController {
    private $usuarioDAO;
    
    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }
    
    public function index() {
        require_once SUB_HEADER;
        require_once 'view/HTML/Comentarios/Register.php';
        require_once FOOTER;
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validar campos requeridos
            $camposRequeridos = ['nombre', 'apellido', 'nombre_usuario', 'correo_electronico', 'contrasena'];
            foreach ($camposRequeridos as $campo) {
                if (empty($_POST[$campo])) {
                    $_SESSION["mensaje"] = "Por favor complete todos los campos requeridos";
                    $_SESSION["tipo"] = "error";
                    header('Location: ' . URL_BASE . 'index.php?c=register&f=index');
                    exit;
                }
            }

            try {
                // Verificar si el correo ya existe
                if($this->usuarioDAO->correoExiste($_POST['correo_electronico'])) {
                    $_SESSION["mensaje"] = "El correo electrónico ya está registrado";
                    $_SESSION["tipo"] = "error";
                    header('Location: ' . URL_BASE . 'index.php?c=register&f=index');
                    exit;
                }


                $usuario = $this->populate();
                $resultado = $this->usuarioDAO->insert($usuario);

                if($resultado) {
                    $_SESSION["mensaje"] = "Usuario registrado exitosamente";
                    $_SESSION["tipo"] = "success";
                    header('Location: ' . URL_BASE . 'index.php?c=Login&f=login');
                    exit;
                } else {
                    $_SESSION["mensaje"] = "Error al registrar el usuario";
                    $_SESSION["tipo"] = "error";
                    header('Location: ' . URL_BASE . 'index.php?c=register&f=index');
                    exit;
                }
            } catch(Exception $e) {
                $_SESSION["mensaje"] = "Error en el sistema";
                $_SESSION["tipo"] = "error";
                error_log("Error en RegisterController::registrar: " . $e->getMessage());
                header('Location: ' . URL_BASE . 'index.php?c=register&f=index');
            }
            exit;
        }

        // Si no es POST, mostrar el formulario
        require_once SUB_HEADER;
        require_once 'view/HTML/Comentarios/Register.php';
        require_once FOOTER;
    }

    private function populate() {
        $usuario = new UsuarioDTO();
        
        // Limpiar y asignar datos básicos
        $usuario->setNombre(strip_tags(htmlspecialchars_decode($_POST['nombre'])));
        $usuario->setApellido(strip_tags(htmlspecialchars_decode($_POST['apellido'])));
        $usuario->setNombreUsuario(strip_tags(htmlspecialchars_decode($_POST['nombre_usuario'])));
        $usuario->setCorreoElectronico(filter_var($_POST['correo_electronico'], FILTER_SANITIZE_EMAIL));
        $usuario->setContrasena(password_hash($_POST['contrasena'], PASSWORD_DEFAULT));
        
        // Asignar datos opcionales
        if (!empty($_POST['numero_celular'])) {
            $usuario->setNumeroCelular(strip_tags(htmlspecialchars_decode($_POST['numero_celular'])));
        }
        if (!empty($_POST['pais'])) {
            $usuario->setPais(strip_tags(htmlspecialchars_decode($_POST['pais'])));
        }
        if (!empty($_POST['ubicacion'])) {
            $usuario->setUbicacion(strip_tags(htmlspecialchars_decode($_POST['ubicacion'])));
        }
        if (!empty($_POST['fecha_nacimiento'])) {
            $usuario->setFechaNacimiento($_POST['fecha_nacimiento']);
        }
        if (!empty($_POST['genero'])) {
            $usuario->setGenero(strip_tags(htmlspecialchars_decode($_POST['genero'])));
        }
        
        // Rol por defecto
        $usuario->setRol('usuario');

        return $usuario;
    }
}
?>